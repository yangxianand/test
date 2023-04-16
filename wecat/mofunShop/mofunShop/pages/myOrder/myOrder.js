var app = getApp();
var host = app.globalData.host;
Page({
  data: {
    currentTab: 0,
    orders: []
  },
  onLoad: function (e) {
    var id = e.id;
    var status = e.status;
    console.log(id);
    this.setData({ currentTab: id });
    this.loadOrders(status);
  },
  switchNav: function (e) {
    var page = this;
    var status = e.currentTarget.dataset.status;
    if (this.data.currentTab == e.target.dataset.current) {
      return false;
    } else {
      page.setData({ currentTab: e.target.dataset.current });
    }
    page.loadOrders(status);
  },
  toPay: function (e) {
    wx.redirectTo({
      url: '../orderDetail/orderDetail?orderId=' + e.currentTarget.id
    })
  },
  toBuy: function (e) {
    var goodsId = e.currentTarget.id;
    wx.navigateTo({
      url: '../goodsDetail/goodsDetail?goodsId=' + goodsId,
    })
  },
  toList: function (e) {
    wx.reLaunch({
      url: '../index/index'
    })
  },
  deleteOrder:function(e){
    var page = this;
    var id = e.currentTarget.id;
    var status = e.currentTarget.dataset.status;
    wx.request({
      url: host + '/api/order/deleteOrder',
      method: 'GET',
      data: {
        id: id
      },
      header: {
        'Content-Type': 'application/json'
      },
      success: function (res) {
        var code = res.data.code;
        if(code=='0000'){
           wx.showToast({
             title: '删除成功',
             icon: 'success',
             duration: 1000
           })
          page.loadOrders(status);
        }
      }
    })
  },
  loadOrders: function (orderStatus) {
    var page = this;
    var userId = wx.getStorageSync("userId");
    wx.request({
      url: host + '/api/order/getOrderList',
      method: 'GET',
      data: {
        userId: userId,
        orderStatus, orderStatus
      },
      header: {
        'Content-Type': 'application/json'
      },
      success: function (res) {
        var orders = res.data.data;
        console.log(orders);
        page.setData({
          orders: orders
        });
      }
    })
  }
})