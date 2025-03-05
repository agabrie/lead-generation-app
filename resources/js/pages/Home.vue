<template>
  <div>
      <FormTooltip>
        <div class="flex flex-col gap-2">
        <h2 class="text-2xl text-center">
          We just need a few details...
        </h2>
        <p class="text-center">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam voluptate aut voluptatem pariatur ipsum numquam aliquid. Non praesentium numquam in?
        </p>
        <p class="text-center">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, nesciunt.
        </p>
        </div>
      </FormTooltip>
      <UserDetailsForm />
  </div>
</template>

<script setup>
  import FormTooltip from '@/components/FormTooltip.vue'
  import UserDetailsForm from '@/components/forms/UserDetailsForm.vue'
</script>