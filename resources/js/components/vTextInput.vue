<template>
    <div
      class="relative flex flex-col gap-2 justify-center align-center w-full md:w-1/2 md:max-w-100"
      :class="{
        'md:flex-row':labelPosition === 'left',
        'text-error':typeof error==='string'
      }"
    >
      <label
        v-if="!hideLabel"
        :for="name"
        :class="{
          'basis-1/3 flex items-center':labelPosition !=='top',
          'md:justify-end md:text-end':labelAlign==='right',
          'justify-start text-start':labelAlign==='left',
        }"
      >
        {{ label }}
        <p :class="{'-right-5 text-xl px-1':true, 'text-secondary':typeof error!=='string','text-error':typeof error==='string'}">{{required?"*":""}}</p>

      </label>
      <input
        class="inline-block basis-2/3 p-2 bg-white rounded-lg"
        :class="{
          'border-1 border-error focus:outline-error': typeof error==='string',
        }"
        :id="id"
        :type="type"
        :name="name"
        :value="modelValue"
        :placeholder="placeholder"
        @input="handleInput"
        @update="handleInput"
        :required="required"
      />
    </div>
    <div v-if="typeof error==='string'" class="text-error">
      {{ error }}
    </div>
</template>

<script setup>
import { watch } from 'vue';
const emit = defineEmits(['update:modelValue', 'update:error'] );
const props = defineProps({
  "name":{type:String, required:true},
  "id":{type:String, required:false},
  "modelValue": { type: String, required:true },
  "error": { type: [Boolean, String], required:false, default: false},
  "regex":{type:RegExp,required:false},
  "regexError":{type:String,required:false, default:"Input is invalid"},
  "hideLabel": { type: Boolean, default: false },
  "label": { type: String, default: "" },
  "placeholder": {type: String, default: ""},
  "required":{type:Boolean, default:false},
  "labelAlign":{type:String, default:"left"},
  "labelPosition":{type:String, default:"top"},
  "type":{type:String, default:"text"},
});
watch(()=>props.modelValue, (value)=>{
  validateValue(value);
})
const handleInput = (event)=>{
  let value = event.target.value;
  validateValue(value);
  emit('update:modelValue', value);
}
const validateValue = (value)=>{
  if(props.required && !value){
    emit('update:error', "Input is required")
  }else if(props.regex && !props.regex.test(value)) {
    emit('update:error',props.regexError);
  }else{
    emit('update:error', true);
  }
}
</script>