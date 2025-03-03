<template>
  <vForm title="Admin Login"
    cta-after
    @submit-form="submitAdminLogin"
  >
    <div class="flex flex-col gap-4 items-center">
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
          v-model="formData.password"
          name="password"
          label="Password"
          type="password"
          placeholder="Password"
          label-align="right"
          label-position="left"
          required
          v-model:error="formValidity.password"
          :regex="REGEX_PASSWORD"
          regex-error="Password Must be at least 8 characters"
        />
        
    </div>
    <template #call-to-actions>
      <div class="flex justify-center">
        <vButton rounded="full" color="secondary" :disabled="!hasValidDetails" @click="submitAdminLogin">
          Submit
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
const REGEX_EMAIL = /^[a-zA-Z0-9._%±]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$/i;
const REGEX_PASSWORD = /(\w){8,}/;
const formData = reactive({
  email: "",
  password: "",
});

const formValidity = reactive({
  email: false,
  password: false,
});
const submitAdminLogin = () => {
  console.log("submitted admin login", formData)
  axios.post('/api/login', formData);
}
const hasValidDetails = computed(() => {
  return formData.email && Object.values(formValidity).reduce((totalValidity, validity) => {
    return totalValidity && validity === true
  }, true);
})
</script>