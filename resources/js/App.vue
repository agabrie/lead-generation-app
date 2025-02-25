
<template>
  <Header />
 <router-view v-slot="{ Component, route }">
    <div class="px-5 md:px-15 py-5" :key="route.name">
        <component :is="Component" />
    </div>
  </router-view>
  <Footer />
</template>
<script setup>
  import Header from '@/components/Header.vue'
  import Footer from '@/components/Footer.vue'
</script>