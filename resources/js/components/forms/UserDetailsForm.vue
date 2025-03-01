<template>
  <vForm title="User Details" cta-after @submit-form="submitUserDetails">
    <div class="flex flex-col gap-4 items-center">
      <vTextInput v-model="formData.first_name" name="first_name" label="First Name" placeholder="First Name" required label-align="right" label-position="left" />
      <vTextInput v-model="formData.last_name" name="last_name" label="Last Name" placeholder="Last Name" required label-align="right" label-position="left" />
      <vTextInput v-model="formData.email" name="email" label="email" placeholder="email" required label-align="right" label-position="left"/>
      <vTextInput v-model="formData.phone_number" name="phone_number" label="phone_number" placeholder="Phone Number" label-align="right"d label-position="left"/>
      <vTextInput v-model="formData.address_line_1" name="address_line_1" label="Address Line 1" placeholder="Address Line 1" required label-align="right" label-position="left"/>
      <vTextInput v-model="formData.address_line_2" name="address_line_2" label="Address Line 2" placeholder="Address Line 2" label-align="right" label-position="left"/>
      <vTextInput v-model="formData.city" name="city" label="City" placeholder="City" required label-align="right" label-position="left"/>
      <vTextInput v-model="formData.postal_code" name="postal_code" label="postal_code" placeholder="postal_code" required label-align="right" label-position="left"/>
      <vTextInput v-model="formData.province" name="province" label="Province" placeholder="Province" required label-align="right" label-position="left"/>
      <vTextInput v-model="formData.country" name="country" label="Country" placeholder="Country" required label-align="right" label-position="left"/>
    </div>
  </vForm>
</template>

<script setup>
  import {reactive} from "vue";
  import vForm from "@/components/vForm.vue";
  import vTextInput from "@/components/vTextInput.vue";
  import axios from "axios";
  const formData = reactive({
    first_name:"",
    last_name:"",
    email:"",
    phone_number:"",
    address_line_1:"",
    address_line_2:"",
    city:"",
    postal_code:"",
    province:"",
    country:"",
    consent_email_marketing:true,
    consent_ts_and_cs:true,
  });

  // {
  //   first_name:"John",
  //   last_name:"Doe",
  //   email:"john.doe@gmail.com",
  //   phone_number:"0123456789",
  //   address_line_1:"87 Somewhere Avenue",
  //   address_line_2:"GrassHopper Village",
  //   city:"Cape Town",
  //   postal_code:"7460",
  //   country:"South Africa",
  // }
  const submitUserDetails = ()=>{
    console.log("submitted user details", formData)
    axios.post('/api/lead', formData);
  }
</script>