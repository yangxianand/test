// pages/index/index.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    message: '你好，微信小程序！',
    flag: false,
    indicatorDots: true,
    autoplay: true,
    interval: 5000,
    duration: 1000,
    imgUrls: [
      "/pages/images/images/haibao/1.jpg",
      "/pages/images/images/haibao/2.jpg",
      "/pages/images/images/haibao/3.jpg"
    ],
    hotList: [
      { "id": 1, "listPic": "https://api.mofun365.com:8888/images/goods/1555850845474.jpg", "goodName": "微信小程序开发图解案例教程", "goodPrice": 62.8 },
      { "id": 2, "listPic": "https://api.mofun365.com:8888/images/goods/1555851154057.jpg", "goodName": "微信小程序开发全案精讲", "goodPrice": 41.88 }, 
      { "id": 3, "listPic": "https://api.mofun365.com:8888/images/goods/1555851345937.jpg", "goodName": "第一行代码 Java", "goodPrice": 57.7 }
     ],
     spikeList:[
      { "id": 4, "listPic": "https://api.mofun365.com:8888/images/goods/1555851497575.jpg", "goodName": "微信小程序开发图解案例教程", "goodPrice": 62.8 },
      { "id": 5, "listPic": "https://api.mofun365.com:8888/images/goods/1555851817322.jpg", "goodName": "微信小程序开发图解案例教程", "goodPrice": 62.8 },
      { "id": 6, "listPic": "https://api.mofun365.com:8888/images/goods/1555851817322.jpg", "goodName": "微信小程序开发图解案例教程", "goodPrice": 62.8 }
      
     ],
     bestSellerList:[
      {"id":7,"listPic":"https://api.mofun365.com:8888/images/goods/1555851965264.jpg","goodName":"微信小程序开发图解案例教程","goodPrice":62.8},
      {"id":8,"listPic":"https://api.mofun365.com:8888/images/goods/1555850845474.jpg","goodName":"微信小程序开发图解案例教程","goodPrice":62.8},
      {"id":9,"listPic":"https://api.mofun365.com:8888/images/goods/1555851154057.jpg","goodName":"微信小程序开发图解案例教程","goodPrice":62.8}
     ]

  },
searchlnput:function(e){
  wx.navigateTo({
    url: '../search/search',
  })
},
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad(options) {

  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady() {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow() {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide() {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload() {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh() {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom() {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage() {

  }
})