import { createApp } from 'vue';
import Account from './components/masterForm.vue';
import Salary from './components/salarycalc.vue';
import Quotation from './components/quotation.vue';

createApp(Account).mount('#app');
createApp(Salary).mount('#apps');
createApp(Quotation).mount('#appq');
