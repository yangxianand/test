var app = getApp();
var host = app.globalData.host;
Page({
  data: {
    indicatorDots: true,
    autoplay: true,
    interval: 5000,
    duration: 1000,
    imgUrls: [
      "/pages/images/books/hot-1.jpg"
    ],
    currentTab: 0,
    goodsDetail: null,
    num: 1,
    cartNum: 0,
    host: host,
    goodsId: ''
  },
  onLoad: function (e) {
    var goodsId = e.goodsId;
    this.setData({ goodsId: goodsId })
    this.loadGoodsDetail(goodsId);
    this.loadCart();
  },
  loadGoodsDetail: function (goodsId) {
    if (goodsId != "") {
      var that = this;
      wx.request({
        url: host + '/api/goods/getGoodsDetail',
        method: 'GET',
        data: {
          "goodsId": goodsId
        },
        header: {
          'Content-Type': 'application/json'
        },
        success: function (res) {
          console.log(res)
          var goodsDetail = res.data.data;
          that.setData({
            goodsDetail: goodsDetail
          });
        }
      })
    }
  },
  switchNav: function (e) {
    var index = e.currentTarget.id;
    this.setData({
      currentTab: index
    });
  },
  buy: function (e) {
    var goodsId = e.currentTarget.id;
    var userId = wx.getStorageSync("userId");
    if (userId != '') {
      wx.navigateTo({
        url: '../buy/buy?goodsId=' + goodsId + '&num=' + this.data.num
      })
    } else {
      wx.navigateTo({
        url: '../login/login',
      })
    }
  },
  seeCart: function (e) {
    console.log(e)
    wx.switchTab({
      url: '../shoppingcart/shoppingcart'
    })
  },
  addGoods: function (e) {
    var num = this.data.num;
    this.setData({
      num: num + 1
    });
  },
  minusGoods: function (e) {
    var num = this.data.num;
    if (num > 1) {
      this.setData({
        num: num - 1
      });
    }
  },
  intocart: function (e) {
    var that = this;
    var goodsId = e.currentTarget.id;
    var userId = wx.getStorageSync("userId");
    if (userId != "") {
      wx.request({
        url: host + '/api/cart/saveShoppingCart',
        method: 'GET',
        data: {
          'userId': userId,
          'goodsId': goodsId,
          'type': '0'
        },
        header: {
          'Content-Type': 'application/json'
        },
        success: function (res) {
          var code = res.data.code;
          if (code == '0000') {
            that.loadCart();
          }
        }
      })
    } else {
      wx.redirectTo({
        url: '../login/login'
      })
    }
  },
  loadCart: function () {
    var that = this;
    var userId = wx.getStorageSync("userId");
    if (userId != "") {
      wx.request({
        url: host + '/api/cart/getShoppingCartList',
        method: 'GET',
        data: {
          'userId': userId,
          'type': '0'
        },
        header: {
          'Content-Type': 'application/json'
        },
        success: function (res) {
          console.log(res);
          var code = res.data.code;
          if (code == '0000') {
            var ret = res.data.data;
            that.setData({
              cartNum: ret.length
            });
          }
        }
      })
    } else {
      wx.redirectTo({
        url: '../login/login'
      })
    }

  },
  onShareAppMessage: function (res) {
    if (res.from === 'button') {
      // 来自页面内转发按钮
      console.log(res.target)
    }
    return {
      title: '商品详情',
      path: 'pages/goodsDetail/goodsDetail?goodsId=' + this.data.goodsId
    }
  },
  onShareTimeline: function (res) {
    if (res.from === 'button') {
      // 来自页面内转发按钮
      console.log(res.target)
    }
    return {
      title: '商品详情',
      path: 'pages/goodsDetail/goodsDetail?goodsId=' + this.data.goodsId
    }
  }
})