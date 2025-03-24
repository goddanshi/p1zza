<template>
    <div class="body1">
      <div class="nadpis"><p>Пицца на любой ваш вкус</p></div>
      <div class="pizzas-container1">
        <div class="image-container" v-for="(pizza, index) in pizzas" :key="index">
          <img :src="pizza.image" :alt="pizza.name">
          <p class="image-caption">{{ pizza.name }}</p>
          <p class="image-description">{{ pizza.description }}</p>
          <p class="image-price">{{ pizza.price }} р.</p>
          <button class="image-button">Заказать</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import vetchinaikurica from "../assets/Vetchinaikurica-280x280.jpg"
  import peperoni from "../assets/Peperoni.jpg"
  import margharita from "../assets/Margharita.jpg"
  import asorti from "../assets/Asorti.jpg"
  import greze from "../assets/Greze.jpg"
  import tireyaki from "../assets/Tireyaki.jpg"
  export default {
    props: ['addToCart'],
    data() {
      return {
        pizzas: [
          { name: "Ветчина и курица", image: vetchinaikurica, description: "Тесто, соус сливочный, сыр моцарелла, куриное филе, ветчина, помидоры.", price: 660 },
          { name: "Пепперони", image: peperoni, description: "Тесто, соус фирменный, сыр моцарелла, салями оригинальная.", price: 600 },
          { name: "Маргарита", image: margharita, description: "Тесто, соус фирменный, сыр моцарелла, помидоры.", price: 490 },
          { name: "Ассорти", image: asorti, description: "Тесто, ветчина, бекон, маслины, помидоры, перец, сыр моцарелла, соус фирменный, филе куриное.", price: 770 },
          { name: "Греческая", image: greze, description: "Тесто, соус фирменный, лук, маслины, помидоры, брынза, пекинская капуста, зелень, перец, сыр моцарелла.", price: 630 },
          { name: "Цыпленок Терияки", image: tireyaki, description: "Тесто, соус ранч, помидоры, сыр моцарелла, куриное филе, огурцы, соус терияки.", price: 680 }
        ]
      };
    }
  };
  </script>
<style>
.body1{
    padding-top: 100px;
    font-family: "EB Garamond", serif;
}
.nadpis p{
    padding-top:60px;
    text-align: center;
    font-size: 50px;
}
.pizzas-container1, .pizzas-container2 {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* 3 колонки */
  justify-content: center;
  gap: 40px;
  padding: 20px;
}
.image-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 300px; 
  text-align: center;
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
}
</style>