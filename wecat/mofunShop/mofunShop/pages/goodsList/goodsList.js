var app = getApp();
var host = app.globalData.host;
Page({
  data: {
    books: null,
    host: host
  },
  onLoad: function(e) {
    var firstId = e.firstId;
    var secondId = e.secondId;
    this.getBookList(firstId, secondId);
  },
  getBookList: function(firstId, secondId) {
    var page = this;
    wx.request({
      url: host + '/api/goods/getGoodsList',
      method: 'GET',
      data: {
        firstId: firstId,
        secondId: secondId
      },
      header: {
        'Content-Type': 'application/json'
      },
      success: function(res) {
        var books = res.data.data;
        console.log(books);
        page.setData({
          books: books
        });
      }
    })
  },
  seeDetail: function(e) {
    var goodsId = e.currentTarget.id;
    wx.navigateTo({
      url: '../goodsDetail/goodsDetail?goodsId=' + goodsId,
    })
  },
  searchInput: function(e) {
    wx.navigateTo({
      url: '../search/search',
    })
  }
})