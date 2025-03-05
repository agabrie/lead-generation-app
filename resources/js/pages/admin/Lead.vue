<template>
  <div class="flex flex-col gap-2">
    <div>
      <vButton type="link" :to="{path:'/admin',query:{page:previousPage}}" rounded color="secondary">View Leads</vButton>
    </div>
    <!-- {{ lead?.first_name }} -->
    <vCard v-if="lead" :title="lead.first_name" :description="lead.last_name">
      <div class="flex flex-row gap-2 flex-wrap md:flex-nowrap">
        <section class="w-full">
          <h2 class="text-2xl text-secondary">
            Info
          </h2>
          <vDetail label="First Name">{{ lead.first_name }}</vDetail>
          <vDetail label="Last Name">{{ lead.last_name }}</vDetail>
          <vDetail label="Email">{{ lead.email }}</vDetail>
          <vDetail label="Phone Number">{{ lead.phone_number }}</vDetail>
          <p
            class="px-2"
            :class="{
              'text-error':!lead.consent_email_marketing,
              'text-success':lead.consent_email_marketing,
            }"
          >
            {{ !!lead.consent_email_marketing?"Opted in to Email Marketing":"Did not opt in to marketing" }}
          </p>

        </section>
        <section  class="w-full">
          <h2 class="text-2xl text-secondary">
            Address
          </h2>
          <vDetail label="Address">{{ lead.address_line_1 }}</vDetail>
          <vDetail label="Suburb">{{ lead.address_line_2 }}</vDetail>
          <vDetail label="Postal Code">{{ lead.postal_code }}</vDetail>
          <vDetail label="City">{{ lead.city }}</vDetail>
          <vDetail label="Province">{{ lead.province }}</vDetail>
          <vDetail label="Phone Number">{{ lead.phone_number }}</vDetail>
        </section>
      </div>
    </vCard>
  </div>
</template>
<script setup>
import vButton from '@/components/vButton.vue'
import vCard from '@/components/vCard.vue'
import { onMounted, ref } from 'vue';
import {useRoute} from "vue-router";
import vDetail from '@/components/vDetail.vue';
const route=useRoute();
const leadId=ref(route.params.id);
const previousPage=ref(route.query.page||1);
const lead = ref(null);
onMounted(()=>{
  fetchLead();
})
const fetchLead = ()=>{
  axios.get(`/api/lead/${leadId.value}`).then(({data})=>{
    lead.value= data.lead;
    console.log(data)
  })
}
</script>