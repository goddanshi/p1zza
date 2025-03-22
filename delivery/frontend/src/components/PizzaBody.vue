<template>
<div class="body">
    <div class="nadpis"><p>Пицца на любой ваш вкус</p></div>
    <div class="pizzas1">
        <div class="image-container">
            <img :src="vetchinaikurica" alt="Pizza" />
            <p class="image-caption">Ветчина и курица</p> 
            <p class="image-description">Тесто для пиццы, соус сливочный, сыр моцарелла, куриное филе, ветчина, помидоры.</p>
            <p class="image-price">660 р.</p>
            <button class="image-button">Заказать</button>
        </div>
    </div>
</div>
</template>
<script>
    import vetchinaikurica from '@/assets/Vetchinaikurica-280x280.jpg';
    export default { 
        data(){
        return {
        vetchinaikurica  //Создание свойства чтоб работала локальная фотка (Иначе выводил alt..)
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
.pizzas1 {
  display: flex; 
  justify-content: space-between; 
  padding: 20px;
}
.image-container {
  display: flex;
  flex-direction: column; 
  align-items: center; 
  padding-left: 60px;
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