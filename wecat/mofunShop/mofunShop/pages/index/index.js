var app = getApp();
var host = app.globalData.host;
Page({
  data: {
    indicatorDots: true,
    autoplay: true,
    interval: 5000,
    duration: 1000,
    imgUrls: [
      // "/pages/images/haibao/1.jpg",
      // "/pages/images/haibao/2.jpg",
      // "/pages/images/haibao/3.jpg"
    ],
    hotList: [
      { "id": 1, "listPic": "https://api.mofun365.com:8888/images/goods/1555850845474.jpg", "goodsName": "微信小程序开发图解案例教程", "goodsPrice": 62.8 },
      { "id": 2, "listPic": "https://api.mofun365.com:8888/images/goods/1555851154057.jpg", "goodsName": "微信小程序开发全案精讲", "goodsPrice": 41.88 },
      { "id": 3, "listPic": "https://api.mofun365.com:8888/images/goods/1555851345937.jpg", "goodsName": "第一行代码 Java", "goodsPrice": 57.7 }
    ],
    spikeList: [
      { "id": 4, "listPic": "https://api.mofun365.com:8888/images/goods/1555851497575.jpg", "goodsName": "Android原理解析与开发指南", "goodsPrice": 35.99 },
      { "id": 5, "listPic": "https://api.mofun365.com:8888/images/goods/1555851661073.png", "goodsName": "响应式Web开发项目教程", "goodsPrice": 36.4 },
      { "id": 6, "listPic": "https://api.mofun365.com:8888/images/goods/1555851817322.jpg", "goodsName": "第一行代码 C语言", "goodsPrice": 41.99 }
    ]
    ,
    bestSellerList: [
      { "id": 7, "listPic": "https://api.mofun365.com:8888/images/goods/1555851965264.jpg", "goodsName": "前端HTML+CSS修炼之道", "goodsPrice": 57.7 },
      { "id": 8, "listPic": "https://api.mofun365.com:8888/images/goods/1555850845474.jpg", "goodsName": "微信小程序开发图解案例教程", "goodsPrice": 62.8 },
      { "id": 9, "listPic": "https://api.mofun365.com:8888/images/goods/1555851154057.jpg", "goodsName": "微信小程序开发全案精讲", "goodsPrice": 41.8 }
    ],
    host: host
  },
  onLoad: function () {
    this.getBannerList();
    this.getBookList();
  },
  searchInput: function (e) {
    wx.navigateTo({
      url: '../search/search',
    })
  },
  more: function (e) {
    var id = e.currentTarget.id;
    wx.navigateTo({
      url: '../goods/goods?id=' + id,
    })
  },
  getBannerList: function () {
    var page = this;
    wx.request({
      url: host + '/api/banner/getBannerList?type=0',
      method: 'GET',
      data: {},
      header: {
        'Content-Type': 'application/json'
      },
      success: function (res) {
        console.log(res)
        var code = res.data.code;
        var list = res.data.data;
        if (code == '0000') {
          var code = res.data.code;
          var list = res.data.data;
          if (code == '0000') {
            var imgUrls = new Array();
            for (var i = 0; i < list.length; i++) {
              imgUrls.push(host + "/" + list[i].url);
            }
            page.setData({ imgUrls: imgUrls });
          }
        }
      }
    })
  },
  getBookList: function () {
    var page = this;
    wx.request({
      url: host + '/api/goods/getHomeGoodsList',
      method: 'GET',
      data: {},
      header: {
        'Content-Type': 'application/json'
      },
      success: function (res) {
        var book = res.data.data;
        wx.setStorageSync('book', book);
        wx.getStorage({
          key: 'book',
          success(res) {
            console.log(res)
          }
        })
        var hotList = book.rmjs;
        var spikeList = book.mssk;
        var bestSellerList = book.cxsj;
        page.setData({ hotList: hotList, spikeList: spikeList, bestSellerList: bestSellerList });

      }
    })
  },
  seeDetail:function(e){
    console.log(e)
    var id = e.currentTarget.id;
    wx.navigateTo({
      url: '../goodsDetail/goodsDetail?goodsId='+id
    })
  }
})