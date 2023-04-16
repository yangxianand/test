var app = getApp();
var host = app.globalData.host;
Page({
  data: {
    flag: 0,
    addresses: '',
    goodsId: '',
    goodsDetail: null,
    num: 1,
    addressId: '',
    totalPrice: 0,
    orderDetail:null,
    orderId: null
  },
  onLoad: function (e) {
    var orderId = e.orderId;
    this.setData({ orderId: orderId});
    this.loadOrder(orderId); 
  },
  loadOrder:function(orderId){
    var page = this;
    if (orderId != null && orderId != "") {
      wx.request({
        url: host + '/api/order/getOrderById',
        method: 'GET',
        data: {
          "orderId": orderId
        },
        header: {
          'Content-Type': 'application/json'
        },
        success: function (res) {
          console.log(res);
          var code = res.data.code;
          var orderDetail = res.data.data;
          if (code = '0000') {
            var addressId = orderDetail.addressId;
            page.setData({ orderDetail: orderDetail });
            page.loadAddress(orderDetail.addressId);
            page.loadGoods(orderDetail.goodsId);
            page.setData({ goodsId: orderDetail.goodsId });
            page.setData({ num: orderDetail.num });
            page.setData({ addressId: orderDetail.addressId });
          }
        }
      })
    }
  },
  loadAddress: function (id) {
    var page = this;
    if (id != null && id != "") {
      wx.request({
        url: host + '/api/address/getAddressById',
        method: 'GET',
        data: {
          "id": id
        },
        header: {
          'Content-Type': 'application/json'
        },
        success: function (res) {
          console.log(res);
          var code = res.data.code;
          var addresses = res.data.data;
          if (code = '0000') {
            page.setData({ addresses: addresses });
          }
        }
      })
    }
  },
  loadGoods: function (goodsId) {
    var page = this;
    if (goodsId != null && goodsId != "") {
      wx.request({
        url: host + '/api/goods/getGoodsDetail?goodsId=' + goodsId,
        method: 'GET',
        data: {
          "goodsId": goodsId
        },
        header: {
          'Content-Type': 'application/json'
        },
        success: function (res) {
          console.log(res);
          var code = res.data.code;
          var goodsDetail = res.data.data;
          if (code = '0000') {
            page.setData({ goodsDetail: goodsDetail });
            var num = page.data.num;
            //计算总价格
            var totalPrice = goodsDetail.goodsPrice * num;
            page.setData({ totalPrice: totalPrice.toFixed(2) });
          }
        }
      })
    }
  },
  buy: function () {
    var userId = wx.getStorageSync("userId");
    var orderId = this.data.orderId;
    //支付

    //支付成功后跳转
    wx.redirectTo({
      url: '../paySuccess/paySuccess?orderId=' + orderId
    })
  }
})