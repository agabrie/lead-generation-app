<template>
  <div>
      <h2>HOME</h2>
      <router-link class="underline" to="/test"> Take me to Test page </router-link>
      <FormTooltip>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam voluptate aut voluptatem pariatur ipsum numquam aliquid. Non praesentium numquam in?</FormTooltip>
      <UserDetailsForm />
  </div>
</template>

<script setup>
  import FormTooltip from '@/components/FormTooltip.vue'
  import UserDetailsForm from '@/components/forms/UserDetailsForm.vue'
</script>