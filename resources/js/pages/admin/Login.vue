<template>
  <div>
      <h2>Admin</h2>
      <router-link class="underline" to="/"> Take me to Home page </router-link>
      <AdminLoginForm />
  </div>
</template>
<script setup>

import AdminLoginForm from '@/components/forms/AdminLoginForm.vue'
</script>