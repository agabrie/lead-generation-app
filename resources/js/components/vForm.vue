<template>
  <form @submit.prevent="" class="flex flex-col gap-5">
    <vCard :title="title" :description="description" card-border-bottom>
      <template #title v-if="$slots['title']" >
        <slot name="title" />
      </template>
      <slot />
      <div v-if="ctaPosition === 'inside'">
        <slot name="call-to-actions">
          <div class="flex justify-center">
            <vButton rounded @click="$emit('submit-form', $event)">Submit</vButton>
          </div>
        </slot>
      </div>
    </vCard>
    <div v-if="ctaPosition === 'after'">
      <slot name="call-to-actions">
        <div class="flex justify-center">
          <vButton rounded="full" color="secondary" @click="$emit('submit-form', $event)">Submit</vButton>
        </div>
      </slot>
    </div>
  </form>
</template>

<script setup>
import { computed } from 'vue'

import vCard from "@/components/vCard.vue";
import vButton from "@/components/vButton.vue";

const props = defineProps({
  "ctaAfter":{type:Boolean,default:false},
  "title":{type:String},
  "description":{type:String},
});
const ctaPosition = computed(()=>{
  if(props.ctaAfter){
    return "after";
  }else{
    return "inside"
  }
});
</script>