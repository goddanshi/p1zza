<template>
     <div v-if="isVisible" class="modal-cart">  <!-- Само модальное окно -->
      <div class="modal-content">
        <h2>Корзина</h2>
            <div v-if="cart.length === 0"><p>Сейчас ваша корзина пуста</p><br><hr><br><p>Добавьте товары в корзину</p></div>
        <ul>
          <li v-for="(item, index) in cart" :key="index">  <!-- Перебираем массив Cart. item=текущий товар index=id товара -->
            {{ item.name }} - {{ item.quantity }} шт.
            <button @click="removeFromCart(index)">Удалить</button>
          </li>
        </ul>
        <button class="checkout" v-if="cart.length >= 1" @click="openCheckout">Оформить заказ</button> <!-- Будет появляться только при наличии товара, не забудь заменить "0 на 1" -->
        <button class="closer" @click="closeCart">✖</button>
      </div>
    </div>
</template>
  
<script>
  export default {
    props: ['isVisible', 'cart'],
    methods: {
      closeCart() {
        this.$emit('close');
      },
      removeFromCart(index) { //Удаляет товар по index(по id)
        this.$emit('remove', index);
      },
      openCheckout() { //Метод "Перейти к оформлению"
        this.$emit('checkout');
      }
    }
  };
</script>
  
<style>
.modal-cart {
    position: fixed;
    top: 0;
    right: 0;
    width: 300px;
    height: 100vh;
    background: #696969;
    box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
    padding: 20px;
    overflow-y: auto;
    text-align: center;
}

.modal-content {
    position: relative;
}
.checkout{
    font-size: 14px;
    width: 80%;
    height: 40px;
    border: none;
    border-radius: 5%;
    color: white;
    background-color:#9a5659;
    cursor: pointer;
    font-family: "EB Garamond", serif;
    text-align: center;
}
.closer {
    position: absolute;
    top: 10px;
    right: 10px;
    border: none;
    background: none;
    font-size: 20px;
    cursor: pointer;
}
.closer:hover {
    color: white;
}
.checkout:hover{
    background-color: red;
}
</style>