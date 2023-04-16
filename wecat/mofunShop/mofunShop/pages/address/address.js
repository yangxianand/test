var app = getApp();
var host = app.globalData.host;
Page({
  data:{
    flag:0,
    addresses:[],
    goodsId:'',
    num:1
  },
  onLoad:function(e){
    this.setData({ num: e.num });
    this.setData({ goodsId: e.goodsId});
    this.loadAddress();
  },
  switchNav:function(e){
     var index = e.currentTarget.id;
     this.setData({ flag: index});
    var addressId = e.currentTarget.dataset.id
    wx.navigateTo({
      url: '../buy/buy?addressId=' + addressId + '&goodsId=' + this.data.goodsId+'&num='+this.data.num
    })
  },
  newAddress:function(e){
    wx.navigateTo({
      url: '../newAddress/newAddress?goodsId=' + this.data.goodsId + '&num=' + this.data.num
    })
  },
  editAddress: function (e) {
    wx.navigateTo({
      url: '../newAddress/newAddress?addressId=' + e.currentTarget.id + '&goodsId=' + this.data.goodsId + '&num=' + this.data.num
    })
  },
  loadAddress:function(){
    var page = this;
    var userId = wx.getStorageSync("userId");
    if (userId != "") {
        wx.request({
          url: host + '/api/address/selectAddressByUserId',
          method: 'GET',
          data: {
            "userId": userId
          },
          header: {
            'Content-Type': 'application/json'
          },
          success: function (res) {
            var code = res.data.code;
            var addresses = res.data.data;
            if (code = '0000') {
              page.setData({ addresses: addresses });
            }
          }
        })
    } else {
      wx.redirectTo({
        url: '../login/login'
      })
    }
  }

})