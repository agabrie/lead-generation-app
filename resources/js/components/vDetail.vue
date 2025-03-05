<template>
  <div class="px-2 py-2 w-full detail">
    <label class="text-xl">{{ label }}</label>
    <p>
      <slot />
    </p>
  </div>
</template>

<script setup>
const props=defineProps(["label","detail"]);

</script>

<style lang="scss" scoped>
label{
  text-transform: capitalize;
}
</style>