<template>
  <div class="body1">
    <div class="nadpis"><p>Пицца на любой ваш вкус</p></div>
    <div class="cart-count" v-if="cart.length > 0">{{ totalQuantity }}</div>
    <button class="cart" @click="toggleCart"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
      </svg>
    </button>
    <div class="pizzas-container1">
      <div class="image-container" v-for="(pizza, index) in pizzas" :key="index">
        <img :src="pizza.image" :alt="pizza.name">
        <p class="image-caption">{{ pizza.name }}</p>
        <p class="image-description">{{ pizza.description }}</p>
        <p class="image-price">{{ pizza.price }} р.</p>
        <button class="image-button" @click="addToCart(pizza)">Заказать</button>
      </div>
    </div>
    <!-- Модальное окно корзины -->
    <div v-if="isCartVisible" class="modal-cart">
          <h2 id="korzina">Корзина</h2>
          <div class="knopki">
              <button class="checkout" v-if="cart.length > 0" @click=toggleCheckout()>Оформить заказ</button>
              <button class="deleteAll" v-if="cart.length > 0" @click="removeAll()">Очистить корзину</button>
          </div>
      <div class="modal-content">
        <ul v-if="cart.length > 0">
          <li v-for="(pizza, index) in cart" :key="index">
            {{ pizza.name }} - {{ pizza.quantity }} шт. - {{ pizza.price * pizza.quantity }} р.<br>
            <div class="plusminus">
              <button class="plms" @click=Del(pizza)>-</button>
              <button class="delete" @click="removeFromCart(index)">Удалить</button>
              <button class="plms" @click=Add(pizza)>+</button>
            </div>
          </li>
        </ul>
        <p v-else>Ваша корзина пуста</p><br>
        <p>Сумма: {{ totalPrice }} р.</p>
        <button class="closer" @click="toggleCart">✖</button>
      </div>
    </div>
<!-- Модальное окно формы -->
    <div v-if="isCheckoutVisible" class="modal-checkout">
    <div class="modal-content">
      <h2>Оформление заказа</h2>
      <form @submit.prevent="submitOrder">
        <div class="form-group">
          <label for="fullName">ФИО</label>
          <input type="text" id="fullName" v-model="fullName" placeholder="Введите ФИО" required />
        </div>
        <div class="form-group">
          <label for="address">Адрес доставки</label>
          <input type="text" id="address" v-model="address" placeholder="Введите адрес доставки" required />
        </div>
        <div class="form-group">
          <label for="phone">Телефон</label>
          <input type="text" id="phone" v-model="phone" placeholder="Введите номер телефона" required />
        </div>
        <div class="form-group">
          <label for="comment">Комментарий</label>
          <textarea id="comment" v-model="comment" placeholder="Введите комментарий"></textarea>
        </div>
        <button type="submit">Оформить заказ</button>
        <button class="closer" @click="toggleCheckout">Закрыть</button>
      </form>
    </div>
  </div>
  </div>
</template>

<script>
import vetchinaikurica from "../assets/Vetchinaikurica-280x280.jpg";
import peperoni from "../assets/Peperoni.jpg";
import margharita from "../assets/Margharita.jpg";
import asorti from "../assets/Asorti.jpg";
import greze from "../assets/Greze.jpg";
import tireyaki from "../assets/Tireyaki.jpg";

export default {
  data() {
    return {
      fullName: "",
      address: "",
      phone: "",
      comment: "",
      isCheckoutVisible: false, // Флаг видимости модального окна
      pizzas: [
        { name: "Ветчина и курица", image: vetchinaikurica, description: "Тесто, соус сливочный, сыр моцарелла, куриное филе, ветчина, помидоры.", price: 660 },
        { name: "Пепперони", image: peperoni, description: "Тесто, соус фирменный, сыр моцарелла, салями оригинальная.", price: 600 },
        { name: "Маргарита", image: margharita, description: "Тесто, соус фирменный, сыр моцарелла, помидоры.", price: 590 },
        { name: "Ассорти", image: asorti, description: "Тесто, ветчина, бекон, маслины, помидоры, перец, сыр моцарелла, соус фирменный, филе куриное.", price: 770 },
        { name: "Греческая", image: greze, description: "Тесто, соус фирменный, лук, маслины, помидоры, брынза, пекинская капуста, зелень, перец, сыр моцарелла.", price: 630 },
        { name: "Цыпленок Терияки", image: tireyaki, description: "Тесто, соус ранч, помидоры, сыр моцарелла, куриное филе, огурцы, соус терияки.", price: 680 }
      ],
      cart: [], // Корзина
      isCartVisible: false // Флаг показа корзины
    };
  },
  computed: {
    totalPrice() {
      return this.cart.reduce((sum, pizza) => sum + pizza.price * pizza.quantity, 0);
    },
    totalQuantity(){
      return this.cart.reduce((total, pizza) => total + pizza.quantity, 0);
    },
  },
  methods: {
    toggleCheckout() {
      this.isCheckoutVisible = !this.isCheckoutVisible;
    },
    submitOrder() {
      // Логика для отправки заказа
      alert("Заказ оформлен!");
      this.isCheckoutVisible = false;
      // Здесь можно добавить логику для отправки заказа на сервер
    },
    toggleCart() {
      this.isCartVisible = !this.isCartVisible;
    },
    addToCart(pizza) {
      const addpizza = this.cart.find(item => item.name === pizza.name); //Ищет пиццу по имени
      if (addpizza) { //Если True добавляет 1шт к пицце
          addpizza.quantity++;
      } else { //Если False добавляет пиццу в корзину
        this.cart.push({ ...pizza, quantity: 1 });
      }
    },
    removeFromCart(index) {
      this.cart.splice(index, 1); //Удаляет позицию
    },
    removeAll(){
      this.cart.splice(0) //Чистит корзину
    },
    Add(pizza){
      pizza.quantity++ //Добавляет 1шт
    },
    Del(pizza){
      pizza.quantity-- //Убирает 1шт
          if (pizza.quantity <=0){ //Если пиццы 0 удаляет из корзины
              this.removeFromCart(pizza)
          }
    },
    checkout() {
      console.log("Заказ оформлен")
      this.cart = [];
      this.isCartVisible = false;
    }
  }
};
</script>  
<style>
.modal-checkout {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: white;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 3000;
}
.modal-content {
  background: white;
  padding: 20px;
  border-radius: 10px;
  width: 400px;
}
.form-group {
  margin-bottom: 15px;
}
input,
textarea {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
.modal-cart {
  position: fixed;
  top: 0;
  right: 0;
  width: 400px;
  height: 100%;
  background: white;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 2500;
  font-family: "EB Garamond", serif;
}
.modal-content {
  background: white;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
}
.modal-content ul {
  list-style: none;
}
.image-button {
  background-color: green;
  color: white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
  border-radius: 3px;
}
.closer {
  position: absolute; /* Абсолютное позиционирование внутри родительского элемента */
  top: 10px; /* Расстояние от верхнего края */
  right: 10px; /* Расстояние от правого края */
  background-color: white;
  color: black;
  font-size: 20px;
  padding: 5px 10px;
  cursor: pointer;
  border:none;
}
#korzina{
  position: absolute;
  top: 30px
}
.body1{
  padding-top: 100px;
  font-family: "EB Garamond", serif;
}
.nadpis p{
  padding-top:60px;
  text-align: center;
  font-size: 50px;
}
.pizzas-container1 {
  display: grid;
  grid-template-columns: repeat(3, 30vw); 
  gap: 20px;
  text-align: center;
  padding-bottom: 10px;
  justify-content: center;
}
.image-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  max-width: 100%; /* Ограничиваем ширину контейнера */
}
.image-caption {
margin-top: 10px; 
font-size: 24px; 
color: #333; 
text-align: center; 
font-weight: bold;
}
.image-description{
  width: 300px;
  text-align: center;
  font-size: 20px;
}
.image-price{
  padding-top: 10px;
  text-align: center;
  font-size: 26px;
  padding-bottom: 10px;
}
.image-button{
  font-size: 20px;
  width: 100px;
  height: 40px;
  border: none;
  border-radius: 10%;
  color: white;
  background-color:#9a5659;
  cursor: pointer;
  font-family: "EB Garamond", serif;
}
.image-button:hover{
  background-color: red;
}
#opac{
  opacity: 50%;
  font-size: 20px;
  position: absolute;
  top: 103.3%;
  left: 71%;
  
}
.cart{
  position: fixed;
  color: black;
  border: none;
  background-color:#9a5659;
  top: 10px;
  right: 10px;
  z-index: 1000;
}
.cart:hover {
cursor: pointer;
color: white;
}
.delete{
  font-size: 10px;
  width: 60px;
  height: 20px;
  border: none;
  border-radius: 10%;
  color: white;
  background-color:#9a5659;
  cursor: pointer;
  font-family: "EB Garamond", serif;
  margin: 10px;
}
.delete:hover{
  background-color: red;
}
.checkout{
  font-size: 15px;
  width: 150px;
  height: 30px;
  border: none;
  border-radius: 10%;
  color: white;
  background-color:#9a5659;
  cursor: pointer;
  font-family: "EB Garamond", serif;
  position: absolute;
  bottom: 10px;
  left: 10px;
}
.checkout:hover{
  background-color: red;
}
.deleteAll{
  font-size: 15px;
  width: 150px;
  height: 30px;
  border: none;
  border-radius: 10%;
  color: white;
  background-color:#9a5659;
  cursor: pointer;
  font-family: "EB Garamond", serif;
  position: absolute;
  bottom: 10px;
  right: 10px;
}
.deleteAll:hover{
  background-color: red;
}
.plms{
  text-align: center;
  font-size: 12px;
  width: 20px;
  height: 20px;
  border: none;
  border-radius: 50%;
  color: white;
  background-color:#9a5659;
  cursor: pointer;
  font-family: "EB Garamond", serif;
}
.plsm:active{
  background-color: red;
}
.cart-count {
  position: fixed;
  top: 47px;
  right: 75px;
  background-color:#9a5659;
  color: white;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 12px;
  z-index: 2000;
  user-select: none;
}
</style>