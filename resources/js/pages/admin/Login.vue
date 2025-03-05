<template>
  <div class="flex flex-col gap-2">
    <div>
      <vButton type="link" to="/" rounded color="secondary">Home</vButton>
    </div>
    <AdminLoginForm />
  </div>
</template>
<script setup>
import vButton from '@/components/vButton.vue'

import AdminLoginForm from '@/components/forms/AdminLoginForm.vue'
</script>