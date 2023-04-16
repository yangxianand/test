var app = getApp();
var host = app.globalData.host;
Page({
  data:{
    carts:[],
    selected:false,
    selectedAll:true,
    totalPrice:0,
    num:1,
    goodsId:'',
    host:host
  },
  onLoad:function(){
    this.loadCarts();
  },
  loadCarts:function(){
    var page = this;
    var userId = wx.getStorageSync("userId");
    if (userId == null || userId ==""){
      wx.navigateTo({
        url: '../login/login',
      })
    }else{
      wx.request({
        url: host + '/api/cart/getShoppingCartList',
        method: 'GET',
        data: {
          userId: userId,
          type: 0
        },
        header: {
          'Content-Type': 'application/json'
        },
        success: function (res) {
          var carts = res.data.data;
          console.log(carts);
          page.setData({ carts: carts });
        }
      })
    }
  },
  radioChange:function(e){
    console.log(e);
    var id = e.detail.value;
    this.computePrice(id);
  },
  addGoods: function (e) {
    var id = e.target.id;
    var carts = this.data.carts;
    for (var i = 0; i < carts.length;i++){
      var cart = carts[i];
      if(id == cart.id){
          cart.num = cart.num+1;
          this.updateCartNum(cart.id, cart.num);
          this.computePrice(id);        
          break;
      }
    }
    this.loadCarts();
  },
  minusGoods: function (e) {
    var id = e.target.id;
    var carts = this.data.carts;
    for (var i = 0; i < carts.length; i++) {
      var cart = carts[i];
      if (id == cart.id) {
        if (cart.num > 1){
          cart.num = cart.num - 1;
          this.updateCartNum(cart.id, cart.num);
          this.computePrice(id);
          break;
        }
      }
    }
    this.loadCarts();
  },
  updateCartNum:function(cartId,num){
    wx.request({
      url: host + '/api/cart/updateCartNum',
      method: 'GET',
      data: {
        cartId: cartId,
        num: num
      },
      header: {
        'Content-Type': 'application/json'
      },
      success: function (res) {   }
    })
  },
  buy:function(){
    var goodsId = this.data.goodsId;
    var userId = wx.getStorageSync("userId");
    if (goodsId == '' || goodsId == null) {
      wx.showModal({
        title: '提示',
        content: '请选择结算商品',
        showCancel: false
      })
    } else {
      wx.navigateTo({
        url: '../buy/buy?goodsId=' + goodsId + '&num=' + this.data.num
      })
    }
  },
  computePrice: function (id) {
    //计算商品价格
    var carts = this.data.carts;
    var totalPrice = 0;
    for (var i = 0; i < carts.length; i++) {
      var cart = carts[i];
      if(cart.id==id){
        totalPrice += cart.goodsPrice * cart.num;
        this.setData({ goodsId: cart.goodsId});
        this.setData({ num: cart.num });
        break;
      }
    }
    this.setData({ totalPrice: totalPrice.toFixed(2) });
  }

})