<template>
<div class="body1">     
        <div class="nadpis"><p>Пицца на любой ваш вкус</p></div>
    <div class="pizzas-container1">
        <div class="image-container">
            <img :src="vetchinaikurica" alt="Pizza" />
            <p class="image-caption">Ветчина и курица</p> 
            <p class="image-description">Тесто для пиццы, соус сливочный, сыр моцарелла, куриное филе, ветчина, помидоры.</p>
            <p class="image-price">660 р.</p>
            <button class="image-button">Заказать</button>
        </div>
        
        <div class="image-container">
            <img :src="peperoni" alt="Пепперони">
            <p class="image-caption">Пепперони</p> 
            <p class="image-description">Тесто для пиццы, соус фирменный, сыр моцарелла, салями оригинальная.</p>
            <p class="image-price">600 р.</p>
            <button class="image-button">Заказать</button>
        </div>

        <div class="image-container">
            <img :src="margharita" alt="Маргарита">
             <p class="image-caption">Маргарита</p> 
            <p class="image-description">Тесто для пиццы, соус фирменный, сыр моцарелла, помидоры.</p><br> <!-- br Для правильного отступа -->
            <p class="image-price">490 р.<s id="opac">560 р.</s></p>
            <button class="image-button">Заказать</button>
        </div>
    </div>
    <div class="pizzas-container2">
        <div class="image-container">
            <img :src="asorti" alt="Pizza" />
            <p class="image-caption">Асорти</p> 
            <p class="image-description">Тесто для пиццы, ветчина, бекон, маслины, помидоры, перец свежий, сыр моцарелла, соус фирменный, филе куриное.</p>
            <p class="image-price">770 р.</p>
            <button class="image-button">Заказать</button>
        </div>
        
        <div class="image-container">
            <img :src="greze" alt="Пепперони">
            <p class="image-caption">Греческая</p> 
            <p class="image-description">Тесто для пиццы, соус фирменный, лук, маслины, помидоры, брынза, пекинская капуста, зелень, перец болгарский, сыр моцарелла.</p>
            <p class="image-price">630 р.</p>
            <button class="image-button">Заказать</button>
        </div>

        <div class="image-container">
            <img :src="teriyaki" alt="Маргарита">
             <p class="image-caption">Цыпленок Терияки</p> 
            <p class="image-description">Тесто для пиццы, соус ранч, помидоры, сыр моцарелла, куриное филе, огурцы свежие, соус терияки.</p><br> <!-- br Для правильного отступа -->
            <p class="image-price">680 р.</p>
            <button class="image-button">Заказать</button>
        </div>
    </div>
</div>
</template>
<script>
    import vetchinaikurica from '@/assets/Vetchinaikurica-280x280.jpg';
    import peperoni from '@/assets/Peperoni.jpg';
    import margharita from '@/assets/Margharita.jpg';
    import asorti from '@/assets/Asorti.jpg';
    import greze from '@/assets/Greze.jpg';
    import teriyaki from '@/assets/Tireyaki.jpg';
    export default { 
        name: "PizzaRow1",
        data(){
        return {//Создание свойства чтоб работала локальная фотка (Иначе выводил alt..)
        margharita,
        peperoni,
        vetchinaikurica,
        asorti,
        greze,
        teriyaki,
    };
  }
}
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
.pizzas-container1 {
  display: flex;  
  justify-content: center; 
  gap: 40px; 
  padding: 20px;
  flex-wrap: wrap; 
}
.pizzas-container2 {
  display: flex;  
  justify-content: center; 
  gap: 40px; 
  padding: 20px;
  flex-wrap: wrap; 
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