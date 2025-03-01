<template>
  <div
    :class="{
      'flex gap-2 max-w-100 justify-center align-center w-1/2': true,
      'flex-col':labelPosition==='top',
      'flex-row':labelPosition === 'left'
    }"
  >
    <label
      v-if="!hideLabel"
      for="name"
      :class="{
        'basis-1/3 flex items-center':labelPosition !=='top',
        'justify-end':labelAlign==='right',
        'justify-start':labelAlign==='left',
      }"
    >
      {{ label }}
    </label>
    <input
      class="inline-block basis-2/3 p-2 bg-white"
      type="text"
      :name="name"
      :value="modelValue"
      :placeholder="placeholder"
      @input="$emit('update:modelValue', $event.target.value)"
      :required="required"
    />
  </div>
</template>

<script setup>
const props = defineProps({
  "name":{type:String, required:true},
  "modelValue": { type: String, required:true },
  "hideLabel": { type: Boolean, default: false },
  "label": { type: String, default: "" },
  "placeholder": {type: String, default: ""},
  "required":{type:Boolean, default:false},
  "labelAlign":{type:String, default:"left"},
  "labelPosition":{type:String, default:"top"},
});
</script>