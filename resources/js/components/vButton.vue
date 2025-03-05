<template>
  <router-link
    v-if="type=='link'"
    :to="to"
    :class="[
      'focus:ring-4 font-medium text-sm focus:outline-none',
      buttonSize,
      roundedClass,
      buttonColors,
      buttonTextColors,
      disabled?'cursor-not-allowed':'cursor-pointer'
    ]"
    :disabled="disabled"
  >
    <slot />
  </router-link>
  <button v-else :type="type"
    :class="[
      'focus:ring-4 font-medium text-sm focus:outline-none',
      buttonSize,
      roundedClass,
      buttonColors,
      buttonTextColors,
      disabled?'cursor-not-allowed':'cursor-pointer'
    ]"
  :disabled="disabled"
  >
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
      default:"primary"
    },
    'textColor':{
      type:String,
      default:"white"
    },
    'disabled':{
      type:Boolean,
      default:false,
    },
    'size':{
      type:String,
      default:"regular",
    },
    'type':{
      type:String,
      default:"submit",
    },
    'to':{
      type:[String, Object],
      default:"/"
    }
  });


  const bgColorVariants = {
    primary: "bg-primary hover:bg-primary-subtle focus:ring-primary", 
    secondary: "bg-secondary hover:bg-secondary-subtle focus:ring-secondary",
    success: "bg-secosuccessndary hover:bg-success-subtle focus:ring-success",
    error: "bg-error hover:bg-error-subtle focus:ring-error",
    warning: "bg-warning hover:bg-warning-subtle focus:ring-warning",
    grey: "bg-grey hover:bg-grey-subtle focus:ring-warning",
    disabled: "bg-disabled",
  };

  const textColorVariants = {
    white: "text-white", 
    black: "text-black", 
  };

  const buttonSizes = {
    regular: "px-5 py-2.5",
    small: "py-1 px-2.5",
  }
  const buttonSize  = computed(()=>{
    return buttonSizes[props.size];
  })
  const roundedClass = computed(() => ({
    "rounded-lg": props.rounded && props.rounded !== "full",
    "rounded-full": props.rounded && props.rounded === "full",
  }))

  const buttonColors = computed(() => props.disabled?bgColorVariants['disabled']:bgColorVariants[props.color])
  const buttonTextColors = computed(() => props.disabled?textColorVariants['white']:textColorVariants[props.textColor])
</script>