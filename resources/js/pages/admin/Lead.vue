<template>
  <div class="flex flex-col gap-2">
    <div>
      <vButton type="link" :to="{path:'/admin',query:{page:previousPage}}" rounded color="secondary">View Leads</vButton>
    </div>
    {{ lead }}
  </div>
</template>
<script setup>
import vButton from '@/components/vButton.vue'
import { onMounted, ref } from 'vue';
import {useRoute} from "vue-router";
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
  })
}
</script>