<template>
  <button type="submit" class="focus:ring-4 font-medium text-sm px-5 py-2.5 focus:outline-none cursor-pointer" :class="[roundedClass, buttonColors, buttonTextColors]">
    <slot />
  </button>
</template>

<script setup>
  import { computed } from 'vue'
  const props = defineProps({
    'rounded':{
      type: [Boolean,String],
      default: false,
    },
    'color':{
      type:String,
      default:"blue"
    },
    'textColor':{
      type:String,
      default:"white"
    },
  });


  const bgColorVariants = {
    purple: "bg-purple-700 hover:bg-purple-800 focus:ring-purple-300", 
    blue: "bg-blue-300 hover:bg-blue-400 focus:ring-blue-300", 
    red: "bg-red-700 hover:bg-red-800 focus:ring-red-300",
    orange: "bg-orange-700 hover:bg-orange-800 focus:ring-orange-300",
    yellow: "bg-yellow-700 hover:bg-yellow-800 focus:ring-yellow-300",
    green: "bg-green-400 hover:bg-green-500 focus:ring-green-300",
  };

  const textColorVariants = {
    white: "text-white", 
    black: "text-black", 
  };

  const roundedClass = computed(() => ({
    "rounded-lg": props.rounded && props.rounded !== "full",
    "rounded-full": props.rounded && props.rounded === "full",
  }))

  const buttonColors = computed(() => bgColorVariants[props.color])
  const buttonTextColors = computed(() => textColorVariants[props.textColor])
</script>