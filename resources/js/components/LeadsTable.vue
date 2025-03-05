<template>
  <div>
    <vTable
      :fields='[
        {key:"email", label:"Email"},
        {key:"first_name", label:"First Name"},
        {key:"last_name", label:"Last Name"},
      ]'
      :items="leads"
      :pages="pages"
      :current-page="currentPage"
      @click-item="goToLead"
      @update:current-page="emit('update:current-page', $event)"
    ></vTable>
  </div>
</template>

<script setup>
  import vTable from "@/components/vTable.vue";
import { useRouter } from "vue-router";
const router = useRouter();
  const props=defineProps({
    leads:{type:Array,default:[]},
    pages:{type:Number,default:1},
    currentPage:{type:Number,default:1},
  })
  const emit=defineEmits(["update:current-page"]);
  const goToLead = (lead)=>{
    console.log(lead.id);
    router.push(`/admin/lead/${lead.id}?page=${props.currentPage}`);
  }
</script>