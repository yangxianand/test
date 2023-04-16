var app = getApp();
var host = app.globalData.host;
Page({
  data: {
    index: 0,
    tip: '',
    address: '',//显示的地址
    region: ['北京市', '北京市', '大兴区'],
    customItem: '全部',
    addressId:'',
    sex:'',
    phone: '',
    num: '',
    userName: '',
    goodsId:'',
    goodsNum:''
  },
  onLoad: function(e) {
    this.setData({ goodsId:e.goodsId });
    this.setData({ goodsNum: e.num });
    var addressId = e.addressId;
    if (addressId != null && addressId !=''){
      this.setData({ addressId: addressId });
      this.loadAddress(addressId);
    }
  },
  loadAddress:function(addressId){
    var page = this;
    wx.request({
      url: host + '/api/address/getAddressById',
      method: 'GET',
      data: {
        "id": addressId
      },
      header: {
        'Content-Type': 'application/json'
      },
      success: function (res) {
        var code = res.data.code;
        var address = res.data.data;
        if (code = '0000') {
          page.setData({ userName: address.personName});
          page.setData({ sex: address.gender });
          page.setData({ phone: address.contactNumber });
          page.setData({ num: address.houseNumber });
          page.setData({ num: address.houseNumber });
          page.setData({ address: address.address });
         
          var cities = address.city;
          var region = cities.split(',');
          page.setData({ region: region });
        }
      }
    })
  },
  bindPickerChange: function(e) {
    console.log(e)
    this.setData({
      index: e.detail.value
    });
  },
  formSubmit: function(e) {
    var that = this;
    var personName = e.detail.value.userName; //联系人
    var gender = e.detail.value.sex; //性别
    var contactNumber = e.detail.value.phone; //手机号
    var address = e.detail.value.address; //收货地址
    var houseNumber = e.detail.value.num; //门牌号
    var citys = e.detail.value.city; //所在城市

    var city = citys[0];
    if (citys[1] != '全部') {
      city += ',' + citys[1];
    }
    if (citys[2] != '全部') {
      city += ',' + citys[2];
    }
    var ret = that.check(personName, gender, contactNumber, address, houseNumber, city);
    var userId = wx.getStorageSync("userId");
    var addressId = this.data.addressId;
    console.log('addressId=' + addressId);
    if (userId != "") {
      if (ret) {
        if (addressId != null && addressId != '') {
          wx.request({
            url: host + '/api/address/updateAddress',
            method: 'GET',
            data: {
              "userId": userId,
              "personName": personName,
              "gender": gender,
              "contactNumber": contactNumber,
              "address": address,
              "houseNumber": houseNumber,
              "city": city,
              "addressId": addressId
            },
            header: {
              'Content-Type': 'application/json'
            },
            success: function (res) {
              var code = res.data.code;
              if (code = '0000') {
                wx.redirectTo({
                  url: '../address/address?goodsId=' + that.data.goodsId + '&num=' + that.data.goodsNum
                })
              }
            }
          })
        }else{
          wx.request({
            url: host + '/api/address/saveAddress',
            method: 'GET',
            data: {
              "userId": userId,
              "personName": personName,
              "gender": gender,
              "contactNumber": contactNumber,
              "address": address,
              "houseNumber": houseNumber,
              "city": city
            },
            header: {
              'Content-Type': 'application/json'
            },
            success: function (res) {
              var code = res.data.code;
              if (code = '0000') {
                wx.redirectTo({
                  url: '../address/address?goodsId=' + that.data.goodsId + '&num=' + that.data.goodsNum
                })
              }
            }
          })
        }
      }
    } else {
      wx.redirectTo({
        url: '../login/login'
      })
    }
  },
  check: function(personName, gender, contactNumber,  address, houseNumber, city) {
    var that = this;
    if (personName == "") {
      that.setData({
        tip: '联系人不能为空！'
      });
      return false
    }
    if (gender == '') {
      that.setData({
        tip: '性别不能为空！'
      });
      return false
    }

    if (contactNumber == '') {
      that.setData({
        tip: '手机号不能为空！'
      });
      return false
    }

    var myreg = /^[1][3,4,5,7,8][0-9]{9}$/;
    if (!myreg.test(contactNumber)) {
      that.setData({
        tip: '手机号不合法！'
      });
      return false;
    }

    if (address == '') {
      that.setData({
        tip: '收货地址不能为空！'
      });
      return false
    }

    if (houseNumber == '') {
      that.setData({
        tip: '门牌号不能为空！'
      });
      return false
    }

    if (city == '') {
      that.setData({
        tip: '所在城市不能为空！'
      });
      return false
    }

    that.setData({
      tip: ''
    });
    return true
  },
  chooseLocation: function () {
    var page = this;
    wx.chooseLocation({
      type: 'gcj02',
      success: function (res) {
        var address = res.name;
        var lat = res.latitude
        var lon = res.longitude
        page.setData({
          address: address
        })
      }
    })
  },
  bindRegionChange: function (e) {
    console.log('picker发送选择改变，携带值为', e.detail.value)
    this.setData({
      region: e.detail.value
    })
  }
})