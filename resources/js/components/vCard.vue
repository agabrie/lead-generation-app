<template>
  <section class="rounded-lg overflow-hidden w-full shadow-sm">
    <div v-if="$slots['title'] || title" class="bg-white p-5">
      <slot name="title">
        <h2 class="text-2xl text-secondary">{{ title }}</h2>
      </slot>
    </div>
    <div class="p-5 bg-gray-100 border-green-500" :class="{'border-b-4':cardBorderBottom}">
      <slot />
    </div>
  </section>
</template>

<script setup>
const props = defineProps({
  "title":{type:String, default:""},
  "cardBorderBottom":{ type:Boolean, default:false },
});
</script>