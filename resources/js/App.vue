<template>
  <Header />
  <router-view v-slot="{ Component, route }">
    <div class="flex flex-col md:px-15 w-full justify-center items-center" :key="route.name">
      <main class="px-5 md:px-0 py-5  w-full max-w-screen-lg">
        <component :is="Component" />
      </main>
    </div>
  </router-view>
  <Footer />
</template>
<script setup>
import Header from '@/components/Header.vue'
import Footer from '@/components/Footer.vue'
</script>