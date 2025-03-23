<template>
<div class="body"> 
    <Row1 />
    <Footeer />
</div>

</template>
<script>
    import Row1 from '../components/PizzaRow1.vue';
    import Footeer from '../components/Footeer.vue';
    export default { 
        components: { Row1, Footeer }, //Важно все записывать в одном components, при создании 2 и более будут накладываться друг на друга.
        data(){
        return {

    };
  }
}
</script>

<style>

</style>