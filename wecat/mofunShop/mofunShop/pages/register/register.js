var app = getApp();
var host = app.globalData.host;
Page({
  data: {
    tip: ''
  },
  formSubmit: function (e) {
    var that = this;
    var loginName = e.detail.value.loginName;
    var mobile = e.detail.value.mobile;
    var loginPassword = e.detail.value.loginPassword;
    var confirmPassword = e.detail.value.confirmPassword;
    var nickName = e.detail.value.nickName;
    //验证表单输入
    var ret = that.checkUser(loginName, mobile, loginPassword, confirmPassword, nickName);
    if(ret){
      wx.request({
        url: host + '/api/user/register',
        method: 'GET',
        data: { 'loginName': loginName, 'mobile': mobile, 'loginPassword': loginPassword, 'confirmPassword': confirmPassword, 'nickName': nickName },
        header: {
          'Content-Type': 'application/json'
        },
        success: function (res) {
          var code = res.data.code;
          var msg = res.data.data;
          if (code == '0000') {
            wx.redirectTo({
              url: '../login/login'
            })
          } else {
            that.setData({ tip: msg });
            return false
          }
        }
      })
    }
  },
  checkUser: function(loginName, mobile, loginPassword, confirmPassword, nickName){
      var that = this;
      if (loginName == "") {
        that.setData({ tip: '用户名不能为空！' });
        return false
      }

      if (mobile == '') {
        that.setData({ tip: '手机号不能为空！' });
        return false
      }

      var myreg = /^[1][3,4,5,7,8][0-9]{9}$/;
      if (!myreg.test(mobile)) {
        that.setData({ tip: '手机号不合法！' });
        return false;
      }

      if (loginPassword == '') {
        that.setData({ tip: '密码不能为空！' });
        return false
      }

      if (confirmPassword == '') {
        that.setData({ tip: '确认密码不能为空！' });
        return false
      }

      if (loginPassword != confirmPassword) {
        that.setData({ tip: '两次密码输入不一致！' });
        return false
      }

      if (nickName == '') {
        that.setData({ tip: '昵称不能为空！' });
        return false
      }
    that.setData({ tip: '' });
      return true
  }
})