import './bootstrap';
import { createApp } from "vue";
import router from "./router/router";
import App from "./App.vue";
import { TooltipDirective } from './directives/tooltip';
import LeadsTable from '@/components/LeadsTable.vue';
const app = createApp(App);

app.directive('tooltip', TooltipDirective )
app.component('leads-table', LeadsTable)
app.use(router);
app.mount("#app");