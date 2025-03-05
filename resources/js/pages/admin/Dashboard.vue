<template>
  <div class="flex flex-col gap-3">
    <div>
    <vButton type="link" to="/" rounded color="secondary">Home</vButton>
    </div>
    <LeadsTable :leads="leadsData?.data" :pages="leadsData?.last_page" v-model:current-page="page" />
  </div>
</template>
<script setup>
import LeadsTable from '@/components/LeadsTable.vue'
import vButton from '@/components/vButton.vue'
import axios from 'axios';
import { reactive,ref, onMounted, computed, watch } from 'vue';

import {useRoute} from "vue-router";
const route=useRoute();

let leadsData = ref(null);
let page = ref(parseInt(route.query.page));
onMounted(()=>{
  getLeadsPage(page.value);
})
watch(page,page=>{
  getLeadsPage(page);
})
// let leads = computed(()=>{
//   return leadsData.value?.data;
// });

const getLeadsPage = (pageIndex)=>{
  axios.get(`/api/leads?page=${pageIndex}`).then(({data})=>{
    console.log("get leads", data);
    leadsData.value = data.leads;
    const url = new URL(location);
    url.searchParams.set("page", pageIndex);
    history.pushState({}, "", url);
  })
}
</script>