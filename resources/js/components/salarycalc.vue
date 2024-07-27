<template>
    <form @submit.prevent="submit()">
    <table class="invoiceTable1">
        <thead class="thead1">
            <tr>
                <th colspan="6" class="">Salary & Benefits</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="3">Basic</td>
                <td colspan="3"><input class="textInput" type="number" name="" id="" v-model="basic" @change="getTotalSalary()" ></td>
            </tr>
            <tr>
                <td colspan="3">OT - Sunday & Public holidays <br> (1.50k Basic /Hr) </td>
                <td colspan="3"><input class="textInput" type="number" step="0.01" name="" id="" v-model="holiday_ot" @change="getTotalNetSalary()"></td>
            </tr>
            <tr>
                <td colspan="3">Ot - Weekdays (1.25X Basic /Hr)</td>
                <td colspan="3"><input class="textInput" type="number" name="" id="" step="0.01" v-model="weekday_ot" @change="getTotalNetSalary()"></td>
            </tr>
            <tr>
                <td colspan="3">Housing</td>
                <td colspan="3"><input class="textInput" type="text" name="" id="" v-model="housing" readonly></td>
            </tr>
            <tr>
                <td colspan="3">Transport</td>
                <td colspan="3"><input class="textInput" type="text" name="" id="" v-model="transport" readonly></td>
            </tr>
            <tr>
                <td colspan="3">Food Allowance</td>
                <td colspan="3"><input class="textInput" type="number" name="" id="" v-model="food" @change="getTotalNetSalary()"></td>
            </tr>
            <tr>
                <td colspan="3">Other Allowances</td>
                <td colspan="3"><input class="textInput" type="number" name="" id="" v-model="other" @change="getTotalNetSalary()"></td>
            </tr>
            <tr>
                <td colspan="3">Ohter Dues</td>
                <td colspan="3"><input class="textInput" type="number" name="" id="" v-model="other_due" @change="getTotalNetSalary()"></td>
            </tr>
            <tr>
                <td colspan="3">Project Bonus</td>
                <td colspan="3"><input class="textInput" type="number" name="" id="" v-model="project_bonus" @change="getTotalNetSalary()"></td>
            </tr>
            <tr>
                <td colspan="3">Total Salary</td>
                <td colspan="3"><input class="textInput" type="text" name="" id="" v-model="total_salary" readonly @change="getTotalNetSalary()"></td>
            </tr>
            <tr>
                <td colspan="3">Total Salary(Net Gross)</td>
                <td colspan="3"><input class="textInput" type="text" name="" id="" v-model="total_net_salary" readonly></td>
            </tr>
        </tbody>

    </table>
    <!-- submit button  -->
    <div class="submitdiv">
        <button class="submitbutton">Submit</button>
      </div>
</form>
</template>
<script type="module">
import axios from 'axios';
import VueAxios from 'vue-axios';
export default {
    data() {
        return {
            id: window.location.href.split('/').pop(),
            deduction:0,
            basic:'',
            holiday_ot:0.00,
            weekday_ot:0.00,
            housing:'Nill',
            transport:'Company Provided',
            food:0,
            other:0,
            other_due:0,
            project_bonus:0,
            total_salary:0,
            total_net_salary:0,


        }
    },
    methods:{
        getTotalSalary(){
            this.total_salary = this.basic;
            this.getTotalNetSalary();
        },
        getTotalNetSalary(){
            var total = 0;
            var w_ot = this.weekday_ot.toFixed(2);
            var h_ot = this.holiday_ot.toFixed(2);
            total = this.total_salary+
               this.food + this.other
               + this.other_due + this.project_bonus
               + this.holiday_ot + this.weekday_ot;
               this.total_net_salary = total.toFixed(2);
        },
        submit: function (e) {
                    axios.post('/api/salary-store', {
                       id: window.location.href.split('/').pop(),
                       deduction: this.deduction,
                       basic:this.basic,
                       holyday_ot: this.holiday_ot,
                       weekday_ot: this.weekday_ot,
                       food: this.food,
                       other: this.other,
                       other_due: this.other_due,
                       project_bonus: this.project_bonus,
                       total_net_salary: this.total_net_salary,
                    }).then((response) => {
                        console.log(response.data);
                        // this.response = response.data
                        // this.success = 'Data saved successfully';
                        // this.response = JSON.stringify(response, null, 2)
                        // this.id = response.data;

                            window.location.reload();

                            // window.location.href=('/purchase-total/');

                    });

                e.preventDefault();

            }


    },
    mounted() {
        this.getTotalSalary();
        this.getTotalNetSalary();
        },
}
</script>
