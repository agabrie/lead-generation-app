<template>
  <section class="rounded-lg overflow-hidden w-full shadow-sm">
    <div v-if="hasHeader" class="bg-white p-5">
      <slot v-if="$slots['title'] || title" name="title">
        <h2 class="text-2xl text-secondary">{{ title }}</h2>
      </slot>
      <slot v-if="$slots['description'] || description" name="description">
        <h2 class="text-grey">{{ description }}</h2>
      </slot>
    </div>

    <div class="p-5 bg-gray-100 border-secondary" :class="{'border-b-4':cardBorderBottom}">
      <slot />
    </div>
  </section>
</template>

<script setup>
import { computed, useSlots } from 'vue';
const props = defineProps({
  "title":{type:String, default:""},
  "description":{type:String, default:""},
  "cardBorderBottom":{ type:Boolean, default:false },
});
const slots = useSlots();
const hasHeader = computed(()=>{
  return (slots['title'] || props.title) || (slots["description"] || props.description);
})
</script>