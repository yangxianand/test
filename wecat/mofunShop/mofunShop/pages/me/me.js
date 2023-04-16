Page({
  data:{
    nickName:'立即登录'
  },
  onLoad:function(params) {
    this.checkLogin();
  },
  checkLogin: function() {
    var userId = wx.getStorageSync("userId");
    if (userId == null || userId == "") {
      wx.navigateTo({
        url: '../login/login',
      })
    } else {
      this.setData({
        nickName: wx.getStorageSync("nickName")
      });
    }
  },
  updatePwd:function(params) {
    wx.navigateTo({
      url: '../updatePwd/updatePwd',
    })
  },
  opinion:function(){
    wx.navigateTo({
      url: '../opinion/opinion',
    })
  },
  clearStore:function(){
    wx.clearStorage({
      success: (res) => {},
    })
  },
  nav: function(e) {
    var id = e.currentTarget.id;
    var status = e.currentTarget.dataset.status;
    wx.navigateTo({
      url: '../myOrder/myOrder?id=' + id + '&status=' + status
    })
  }

})