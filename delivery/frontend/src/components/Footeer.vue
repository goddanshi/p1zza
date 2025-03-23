<template>
<footer>
    <div class="foot">
        <div class="nadpisfoot">
            <p>Заказы принимаются до 1:00. Доставляем в течение 60 минут! Вы можете оплатить заказ на сайте либо через курьера.</p>
        </div>
        <div class="navigation">
        <div class="contact-info">
            <div class="phone">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                </svg>
                <p>+7 (919) 507-63-45 <br> oceanfluddy@gmail.com</p>
            </div>
            <div class="loc">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                <p>Киров, ул. Московская, 110к1</p>
            </div>
            <div class="time">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg><p>Ежедневно <br>с 10:00 до 2:00</p>
            </div>
     </div>
</div>
    </div>
</footer>
</template>
<script>

</script>
<style>
.foot{
    font-family: "EB Garamond", serif;
    background-color: #696969;
    height: 500px;
}
.nadpisfoot {
    display: flex;
    padding-top: 50px;
    text-align: center;
    justify-content: center;
}
.nadpisfoot p {
    color: whitesmoke;
    font-size: 22px;
    width: 500px;
}
.navigation {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding-top: 50px;
    color: whitesmoke;
}


.contact-info {
    display: flex;
    flex-direction: row; 
    justify-content: center; 
    gap: 40px; 
}
.time,
.phone,
.loc {
    display: flex;
    flex-direction: column; 
    align-items: center; 
    gap: 20px; 
}
.time svg,
.phone svg,
.loc svg {
    width: 50px;
    color: whitesmoke;
}
.time,
.phone p,
.loc p {
    text-align: center;
}
</style>