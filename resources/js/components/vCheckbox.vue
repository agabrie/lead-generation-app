<template>
  <div
    class="relative flex flex-row gap-3 md:gap-2 md:justify-center align-center w-full md:w-1/2 md:max-w-100 cursor-pointer"
    :class="{
      'md:flex-row':labelPosition === 'right',
    }"
      @click="handleChange"
  >
  <div class="md:basis-1/3 rounded-lg flex justify-end items-top">
    <input
      type="checkbox"
      class="relative -inset-y-2 w-5 accent-green-600 bg-white"
      :class="{
        'border-1 border-error focus:outline-error': typeof error==='string',
      }"
      :name="name"
      :id="id"
      :checked="modelValue"
    />
    </div>
    <label
      :for="name"
      :class="{
        'md:basis-2/3 flex items-center':labelPosition !=='top',
        'md:justify-end md:text-end':labelAlign==='right',
        'justify-start text-start':labelAlign==='left',
        'text-error':typeof error==='string'
      }"
    >
      {{ label }}
    </label>
    <p :class="{'absolute right-5 md:right-5 text-xl py-2':true, 'text-secondary':typeof error!=='string','text-error':typeof error==='string'}">{{required?"*":""}}</p>
  </div>
  <div v-if="typeof error==='string'" class="text-error">
    {{ error }}
  </div>
</template>
<script setup>
import {computed} from "vue";
const emit = defineEmits(["update:model-value", "update:error"]);
  const props = defineProps({
    "name":{type:String, required:true},
    "id":{type:String, required:false},
    "modelValue": { type: Boolean, required:true },
    "label": { type: String, default: "" },
    "labelAlign":{type:String, default:"left"},
    "labelPosition":{type:String, default:"top"},
    "required":{type:Boolean, default:false},
    "error": { type: [Boolean, String], required:false, default: false},
  });
  const handleChange=(event)=>{
    emit("update:model-value", !props.modelValue);

    if(props.required && props.modelValue){
      emit("update:error", "You must check this box in order to submit the form");
    }else{
      emit('update:error', true);
    }
  }
</script>