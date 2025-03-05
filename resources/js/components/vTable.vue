<template>
  <div class="flex flex-col gap-2">
   <table class="w-full">
      <th v-for="field in formattedFields">
        {{ field.label }}
      </th>
      <tr v-for="item in items" @click="emit('click-item',item)">
        <template v-for="field in fields">
          <td>
            <slot :name="field.label" :data="item[field.key]">
              {{ item[field.key] }}
            </slot>
          </td>
        </template>
      </tr>
    </table>
    <vFormPageControls :pages="pages" :current-page="currentPage" always-show-pages show-previous-next-controls show-first-last-controls @update:current-page="emit('update:current-page', $event)"/>
  </div>
</template>

<script setup>
import {computed} from "vue";
  import vFormPageControls from "@/components/vFormPageControls.vue";
  const emit = defineEmits(["update:current-page", "click-item"]);

const props=defineProps({
  fields:{type:Array, default:[]},
  items:{type:Array, default:[]},
  pages:{type:Number,default:1},
  currentPage:{type:Number,default:1},
})

const formattedFields = computed(()=>{
  return props.fields.map((field)=>{
    if(typeof(field) == 'object' && field.label && field.key){
      return field;
    } else if (typeof(field) === 'string'){
      return {
        label:field,
        key:field,
      }
    }else{
      console.error("incorrect field format");
    }
  })
});
</script>

<style scoped lang="scss">

tr{
  box-sizing: border-box;
  border: 1px solid #d7d6d680;
  transition: all .2s ease-in-out;
  cursor: pointer;
  &:hover{
    background-color: #d7d6d680;
  }
  &:active{
    background-color: var(--color-secondary-subtle);
  }
}
td, th{
  box-sizing: border-box;
  padding: 0.25rem 1rem;
}
th{
  text-transform: capitalize;
  background-color: #d7d6d680;
  text-align: left;
}
</style>