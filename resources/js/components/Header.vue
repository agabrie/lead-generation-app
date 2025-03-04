<template>
  <header class="bg-primary text-white px-5 md:px-15 py-5  flex justify-center">
    <nav class="max-w-screen-lg w-full justify-between flex flex-row">
      <h1 class="text-3xl font-bold">Header</h1>
      <button v-if="isUserLoggedIn" class="cursor-pointer" @click="logoutHandler">Logout</button>
    </nav>
  </header>
</template>

<script setup>
import {ref} from "vue";
import {useRouter} from "vue-router";
let router = useRouter();
  let isUserLoggedIn = ref(!!sessionStorage.getItem("token"));
  const logoutHandler=()=>{
    axios.post("/api/logout").then(({data})=>{
        if(data.message){
          sessionStorage.removeItem("token");
          if(router.currentRoute.value.path === "/admin") {
            window.location.reload();
          }
          isUserLoggedIn.value = false;
        }
    }).catch((err)=>{
      console.error(err);
    });
  }
</script>