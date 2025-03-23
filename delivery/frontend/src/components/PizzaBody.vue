<template>
<div class="body">
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
             <p class="image-caption">Маргарита</p> <br> <!-- br Для правильного отступа -->
            <p class="image-description">Тесто для пиццы, соус фирменный, сыр моцарелла, помидоры.</p>
            <p class="image-price">490 р.</p>
            <button class="image-button">Заказать</button>
        </div>
    </div>
</div>

</template>
<script>
    import vetchinaikurica from '@/assets/Vetchinaikurica-280x280.jpg';
    import peperoni from '@/assets/Peperoni.jpg';
    import margharita from '@/assets/Margharita.jpg';
    export default { 
        data(){
        return {
        margharita,
        peperoni,
        vetchinaikurica, //Создание свойства чтоб работала локальная фотка (Иначе выводил alt..)
    };
  }
}
</script>

<style>
.body{
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
</style>