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
    totalPrice: 0
  },
  onLoad: function (e) {
    console.log(e);
    var that = this;
    this.setData({ goodsId: e.goodsId });
    this.setData({ num: e.num });
    this.setData({ addressId: e.addressId });
    this.loadAddress(e.addressId);
    this.loadGoods(e.goodsId);
  },
  loadAddress: function (id) {//获取用户收货地址
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
  loadGoods: function (goodsId) {//获取购买商品列表
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
  selectAddress: function () {//选择收货地址
    wx.navigateTo({
      url: '../address/address?goodsId=' + this.data.goodsId + "&num=" + this.data.num
    })
  },
  buy: function () {//立即购买
    var userId = wx.getStorageSync("userId");
    var addressId = this.data.addressId;
    var goodsId = this.data.goodsId;
    var num = this.data.num;
    var totalPrice = this.data.totalPrice;
    console.log(addressId + '---' + userId + '---' + goodsId + '---' + num)
    if (addressId != '' && addressId != null) {
      this.getCode();//动态获取code
      //保存订单信息
      wx.request({
        url: host + '/api/order/saveOrder',
        method: 'GET',
        data: {
          "goodsId": goodsId,
          "userId": userId,
          "addressId": addressId,
          "num": num
        },
        header: {
          'Content-Type': 'application/json'
        },
        success: function (res) {
          console.log(res);
          var code = res.data.code;
          var orderId = res.data.data;//订单号
          if (code = '0000') {
            wx.navigateTo({//支付成功后跳转成功页
              url: '../paySuccess/paySuccess?orderId=' + orderId
            })
            //发起支付        
            var param = {
              "fee": totalPrice,
              "userId": wx.getStorageSync("userId"),
              "orderId": orderId,
              "appId": '0',
              "jsCode": wx.getStorageSync('jscode')
            }

            wx.request({
              url: host + '/api/pay/recharge',
              method: 'GET',
              data: { 'data': JSON.stringify(param) },
              header: {
                'Content-Type': 'application/json'
              },
              success: function (res) {
                var code = res.data.code;
                var ret = res.data.data;

                if (code == '0000') {
                  wx.requestPayment({
                    timeStamp: ret.timestamp,
                    nonceStr: ret.noncestr,
                    package: ret.package,
                    signType: ret.signType,
                    paySign: ret.sign,
                    success(res) {
                      wx.navigateTo({//支付成功后跳转成功页
                        url: '../paySuccess/paySuccess?orderId=' + orderId
                      })
                    }
                  })
                } else {
                  return false;
                }
              }
            })
          }
        }
      })

    } else {
      wx.showModal({
        title: '提示',
        content: '请选择收货地址',
        showCancel: false,
        success(res) {
          if (res.confirm) {
            console.log('用户点击确定')
          } else if (res.cancel) {
            console.log('用户点击取消')
          }
        }
      })
    }
  },
  getCode: function () {
    wx.login({
      success: res => {
        var jscode = res.code
        wx.setStorageSync('jscode', jscode)
      }
    })
  }

})
