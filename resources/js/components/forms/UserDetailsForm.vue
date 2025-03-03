<template>
  <vForm title="User Details"
    description="Please provide your details in order for us to contact you"
    cta-after
    @submit-form="submitUserDetails"
  >
    <div class="flex flex-col gap-4 items-center">
      <template v-if="detailsStep == 1">
        <vTextInput
          v-model="formData.first_name"
          name="first_name"
          label="First Name"
          placeholder="First Name"
          label-align="right"
          label-position="left"
          required
          v-model:error="formValidity.first_name"
          :regex="REGEX_NAMES"
          regex-error="First name must begin with an uppercase character"
        />
        <vTextInput
          v-model="formData.last_name"
          name="last_name"
          label="Last Name"
          placeholder="Last Name"
          label-align="right"
          label-position="left"
          required
          v-model:error="formValidity.last_name"
          :regex="REGEX_NAMES"
          regex-error="First name must begin with an uppercase character"
        />
        <vTextInput v-model="formData.email"
          name="email"
          label="Email Address"
          placeholder="Email Address"
          label-align="right"
          label-position="left"
          required
          v-model:error="formValidity.email"
          :regex="REGEX_EMAIL"
          regex-error="Invalid email format"
          />
        <vTextInput
          v-model="formData.phone_number"
          name="phone_number"
          label="Cellphone Number"
          placeholder="Cellphone Number"
          label-align="right"
          label-position="left"
          required
          v-model:error="formValidity.phone_number"
          :regex="REGEX_PHONE_NUMBER"
          regex-error="Invalid cellphone number"
        />
      </template>
      <template v-if="detailsStep == 2">
        <vAddressInput
          :model-value="address.address_line_1"
          @update:model-value="handleAutocomplete"
          required
          v-model:error="formValidity.address_line_1"
        />
        <vTextInput
          v-model="address.address_line_2"
          name="address_line_2"
          label="Address Line 2"
          placeholder="Address Line 2"
          label-align="right"
          label-position="left"
          required
          v-model:error="formValidity.address_line_2"
          />
        <vTextInput
          v-model="address.city"
          name="city"
          label="City" placeholder="City"
          label-align="right"
          label-position="left"
          required
          v-model:error="formValidity.city"
        />
        <vTextInput
          v-model="address.postal_code"
          name="postal_code" label="Postal Code"
          placeholder="Postal Code"
          label-align="right"
          label-position="left"
          required
          v-model:error="formValidity.postal_code"
        />
        <vTextInput
          v-model="address.province"
          name="province" label="Province"
          placeholder="Province"
          label-align="right"
          label-position="left"
          v-model:error="formValidity.province"
        />
        <vTextInput
          v-model="address.country"
          name="country"
          label="Country"
          placeholder="Country"
          label-align="right"
          label-position="left"
          v-model:error="formValidity.country"
        />
      </template>
      <div class="flex justify-center gap-2">
        <vButton rounded="full" color="secondary" :disabled="detailsStep == 1" @click="detailsStep = 1">1</vButton>
        <vButton rounded="full" color="secondary" :disabled="detailsStep == 2" @click="detailsStep = 2">2</vButton>
      </div>
    </div>
    <template #call-to-actions>
      <div class="flex justify-center">
        <vButton rounded="full" color="secondary" :disabled="!hasValidDetails" @click="submitUserDetails">Submit
        </vButton>
      </div>
    </template>
  </vForm>
</template>

<script setup>
import { ref, reactive, computed } from "vue";
import vForm from "@/components/vForm.vue";
import vTextInput from "@/components/vTextInput.vue";
import vButton from "@/components/vButton.vue";
import axios from "axios";
import vAddressInput from "@/components/vAddressInput.vue";
const detailsStep = ref(1);
const REGEX_NAMES = /^([!]?(([A-Za-z]+)(\'|\-)?)+)([a-z])$/;
const REGEX_EMAIL = /^[a-zA-Z0-9._%±]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$/i;
const REGEX_PHONE_NUMBER = /^(0|\+27)[0-9]{9}/;
const address = reactive({
  address_line_1:"",
  address_line_2:"",
  postal_code:"",
  city:"",
  province:"",
  country:"",
});
const formData = reactive({
  first_name: "",
  last_name: "",
  email: "",
  phone_number: "",
  consent_email_marketing: true,
  consent_ts_and_cs: true,
});

const formValidity = reactive({
  first_name: false,
  last_name: false,
  email: false,
  phone_number: false,
  address_line_1: false,
  address_line_2: false,
  city: false,
  postal_code: false,
  province: false,
  country: false,
});
const submitUserDetails = () => {
  console.log("submitted user details", formData)
  axios.post('/api/lead', {...formData, ...address});
}
const handleAutocomplete = (event)=>{
  address.address_line_1=event.address_line_1;
  address.address_line_2=event.address_line_2;
  address.postal_code=event.postal_code;
  address.city=event.city;
  address.province=event.province;
  address.country=event.country;
}
const hasValidDetails = computed(() => {

  return formData.first_name && Object.values(formValidity).reduce((totalValidity, validity) => {
    return totalValidity && validity === true
  }, true);
})
</script>