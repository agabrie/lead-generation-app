<template>
  <vTextInput
    v-model="addressObject.address_line_1"
    id="address-search"
    name="address_line_1"
    label="Address"
    placeholder="Address"
    label-align="right"
    label-position="left"
    :required="required"
    v-bind:error="error"
    @update:error="$emit('update:error',$event)"
  />
</template>
<script setup>
import {onMounted, defineEmits, reactive} from "vue";
import vTextInput from "@/components/vTextInput.vue";
const emit = defineEmits(["update:modelValue", "update:error"]); 
const props = defineProps(["modelValue", "error", "required"]);
let autocomplete;
onMounted(()=>{
  const options = {
    componentRestrictions: { country: "za" },
    fields: ["address_components"],
    types: ["address"],
  };
    var input = document.getElementById('address-search');
    autocomplete = new google.maps.places.Autocomplete(input, options);
    autocomplete.addListener('place_changed',handleAutocomplete)
})

const handleAutocomplete = (event)=>{
  let place = autocomplete.getPlace()
  mapAddressFields(place);
  emit("update:modelValue", addressObject)
}
const addressObject = reactive({
  address_line_1:props.modelValue,
});
const mapAddressFields = (place)=>{
  let address = place.address_components.reduce((address_object, component)=>{
    return {...address_object, [component.types[0]]:component.long_name}
  },{});

  addressObject.address_line_1=`${address.street_number} ${address.route}`;
  addressObject.address_line_2=address.sublocality_level_2;
  addressObject.postal_code=address.postal_code;
  addressObject.city=address.locality;
  addressObject.province=address.administrative_area_level_1;
  addressObject.country=address.country;
}
</script>