<template>
  <div class="header">
      <div class="maincontainer">
        <div class="img" img><img src="https://static.tildacdn.com/tild3030-6638-4639-b630-336538633735/noroot.png" alt=""></div>
      </div>
  </div>
  </template>
  <script>
    export default {
    props: {
      toggleCart: {
        type: Function,
        required: true
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
  
  </style>