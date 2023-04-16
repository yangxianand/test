var app = getApp();
var host = app.globalData.host;
Page({
  data: {
    currentTab: 0,
    books: [
      { "id": 1, "listPic": "https://api.mofun365.com:8888/images/goods/1555850845474.jpg", "goodsName": "微信小程序开发图解案例教程", "goodsPrice": 62.8, "goodsCost": 54.8 },
      { "id": 2, "listPic": "https://api.mofun365.com:8888/images/goods/1555851154057.jpg", "goodsName": "微信小程序开发全案精讲", "goodsPrice": 41.88, "goodsCost": 41.8},
      { "id": 3, "listPic": "https://api.mofun365.com:8888/images/goods/1555851345937.jpg", "goodsName": "第一行代码 Java", "goodsPrice": 57.7, "goodsCost": 54.8}
	],
    host: host
  },
  onLoad:function(e){
    var type = e.id;
    console.log(type);
    this.setData({ currentTab: type });
    this.getBookList(type);  
  },
  getBookList: function (type) {
    var page = this;
    var result = []
    wx.request({
      url: host + '/api/goods/getGoodsListByType',
      method: 'GET',
      data: { type: type},
      header: {
        'Content-Type': 'application/json'
      },
      success: function (res) {
        var books = res.data.data;
        
        for(var i = 0;i<books.length;i++){
            var book = books[i];
            book.listPic = host +"/"+ book.listPic;
            result.push(book)
            console.log(result)
        }
        console.log(books);
        page.setData({ books: result });
      }
    })
  },
  switchNav: function (e) {
    console.log(e)
    var page = this;
    var type = e.target.dataset.current;
    if (this.data.currentTab == type) {
      return false;
    } else {
      page.setData({ currentTab: type });
      this.getBookList(type);
    }
  },
  seeDetail:function(e){
    var goodsId = e.currentTarget.id;
    wx.navigateTo({
      url: '../goodsDetail/goodsDetail?goodsId=' + goodsId,
    })
  }, 
  searchInput: function (e) {
    wx.navigateTo({
      url: '../search/search',
    })
  }
})