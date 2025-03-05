<template>
  <div  v-if="alwaysShowPages || pages>1" class="flex justify-center gap-2">
    <vButton v-if="showFirstLastControls" rounded="full" color="secondary" size="small" :disabled="currentPage==1" @click="emit('update:current-page', 1)"><<</vButton>
    <vButton v-if="showPreviousNextControls" rounded="full" color="secondary" size="small" :disabled="currentPage==1" @click="emit('update:current-page', currentPage-1)"><</vButton>
    <vButton v-for="pageIndex in pages" rounded="full" color="secondary" size="small" :disabled="currentPage == pageIndex" @click="emit('update:current-page', pageIndex)">{{ pageIndex }}</vButton>
    <vButton v-if="showPreviousNextControls" rounded="full" color="secondary" size="small" :disabled="currentPage==pages" @click="emit('update:current-page', currentPage+1)" >></vButton>
    <vButton v-if="showFirstLastControls" rounded="full" color="secondary" size="small" :disabled="currentPage==pages" @click="emit('update:current-page', pages)">>></vButton>
  </div>
</template>

<script setup>
const props=defineProps({
  pages:{type:Number, default:1},
  currentPage:{type:Number,default:1},
  alwaysShowPages:{type:Boolean,default:false},
  showPreviousNextControls:{type:Boolean,default:false},
  showFirstLastControls:{type:Boolean,default:false},
})
const emit = defineEmits(["update:current-page"]);
import vButton from "@/components/vButton.vue";
</script>