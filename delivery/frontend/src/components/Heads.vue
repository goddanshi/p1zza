<template>
<div class="header">
    <div class="maincontainer">
      <div class="img" img><img src="https://static.tildacdn.com/tild3030-6638-4639-b630-336538633735/noroot.png" alt=""></div>
      <button class="cart" @click="openCart"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
        </svg>
      </button>
    </div>
    <ModalCart 
      :isVisible="isCartVisible" 
      :cart="cart" 
      @close="closeCart" 
      @remove="removeFromCart"
      @checkout="openCheckout"
    />
</div>
</template>
<script>
import ModalCart from '../components/ModalCart.vue';
export default {
  components: { ModalCart },
  data() {
    return {
      cart: [], // массив пицц в корзине
      isCartVisible: false,
    };
  },
  methods: {
    openCart() {
      this.isCartVisible = true;
    },
    closeCart() {
      this.isCartVisible = false;
    },
    removeFromCart(index) {
      this.cart.splice(index, 1); //Удаляет товар по индексу
    },
    openCheckout() {
      
    }
  }
};
</script>
<style>
.header {
  position: fixed; 
  top: 0;         
  left: 0; 
  width: 100%;    
  color: white;   
  z-index: 1000;   
}
.maincontainer{
  display: flex;
  background-color: #9a5659;
  height: 95px;
  width: 100vw;
  justify-content: space-between;
}
.img img{
  max-width: 170px;
  padding: 10px;
  padding-left: 20px;
}
.cart svg {
  display: flex;
  width: 50px;
  background-color: transparent;
  padding: 15px;
  padding-right: 50px;
  align-items: center;
}
.cart{
  color: black;
  border: none;
  background-color: #9a5659;
  cursor: pointer;
}
.cart:hover {
  color: white;
}
</style>