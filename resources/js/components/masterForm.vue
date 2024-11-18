<template>
    <div class="master-form-body">
        <div class="invoice-container">
            <div>
                <form @submit.prevent="submit()">
                <div class="invoice-header-div">
                    <div class="invoice-header-heading">Create Invoice</div>
                <div class="header-input">
                    <div>
                        <label class="head-label" for="date">Date:</label>
                        <input type="date" id="date" name="date" class="head-input mb-1" v-model="date" required>
                    </div>
                    <div>
                        <label class="head-label" for="invoiceNo">Invoice No:</label>
                        <input type="text" id="invoiceNo" name="invoiceNo" class="head-input-invoice" v-model="invoice_no" required>

                        <img id="generateNumberIcon" class="passMngIcon" src="image/password-manager-icon.png"
                            alt="" @click="getInvoice()" >

                    </div>
                </div>

                </div>
                <div class="form-group-single">
                    <div>
                        <label class="label-1" for="trn1">Trn1:</label>
                        <input type="text" id="trn1" name="trn1" class="formInput-1" v-model="trn1" required>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="to">To:</label>
                        <input type="text" id="to" name="to" class="formInput" v-model="to" required>
                    </div>
                    <div>
                        <label class="label-2" for="phoneNo">Phone No:</label>
                        <input type="text" id="phoneNo" name="phoneNo" class="formInput-2" v-model="phone_no" required>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="LPO">LPO:</label>
                        <input type="text" id="LPO" name="LPO" class="formInput" v-model="lpo" required>
                    </div>
                    <div>
                        <label class="label-2" for="projectName">Project Name:</label>
                        <input type="text" id="projectName" name="projectName" class="formInput-2" v-model="project_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="formInput" v-model="email" required>
                    </div>
                    <div>
                        <label class="label-2" for="termOfPay">Term of Pay:</label>
                        <input type="text" id="termOfPay" name="termOfPay" class="formInput-2" v-model="term_pay" required>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="ref">Ref:</label>
                        <input type="text" id="ref" name="ref" class="formInput" v-model="ref_no" required>

                        <img id="generateNumberIcon" class="passMngIcon2" src="image/password-manager-icon.png"
                            alt="" @click="getRef()" >

                    </div>
                    <div>
                        <label class="label-2" for="nameAttn">Name/Attn:</label>
                        <input type="text" id="nameAttn" name="nameAttn" class="formInput-2" v-model="name" required>
                    </div>
                </div>
                <div class="form-group-single">
                    <div>
                        <label class="label-1" for="trn2">Trn2:</label>
                        <input type="text" id="trn2" name="trn2" class="formInput-1" v-model="trn2" required>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label class="label-3" for="address">Address:</label>
                        <textarea class="formInput-3" type="text" id="address" name="address" v-model="address" required></textarea>
                    </div>
                    <div>
                        <label class="label-3" for="scopeOfWork">Scope of Work:</label>
                        <textarea class="formInput-3" type="text" id="scopeOfWork" name="scopeOfWork" v-model="work_scope" required></textarea>
                    </div>
                </div>
                <div class="invoice-section2">
                    <table class="invoice-table">
                            <thead>
                                <tr>
                                    <th>SR.</th>
                                    <th>Description</th>
                                    <th>Qty.</th>
                                    <th>Unit Price</th>
                                    <th>Amount</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(key, keyIndex) in projects"  :key="key.id" >
                                    <td>1</td>
                                    <td><div ><input id="description" name="description" rows="2" v-model="key.description"></input></div></td>
                                    <td><div ><input type="number" id="quantity" name="quantity" v-model.number="key.quantity" @change="calculateRowTotal(keyIndex)"></div></td>
                                    <td><div ><input type="number" id="unit-price" name="unit-price" step="0.01" v-model.number="key.unit_price" @change="calculateRowTotal(keyIndex)"></div></td>
                                    <td><div ><input type="number" id="amount" name="amount" step="0.01" v-model="key.amount" readonly></div></td>
                                    <td>
                                        <div class="col-md-2">
                                            <!--                <label  class="row" v-if="keyIndex == 0"></label><br>-->

                                                            <button  class="add-button mt-2 ml-2 " style="margin-bottom: 0; width:50px;" v-if="keyIndex == Object.keys(projects).length -1" @click="add" title="add" id="add_more_fields">
                                                                <i class="fa fa-plus-circle">add</i>
                                                            </button>
                                                            <button  class="delete-button text-uppercase  mt-2 ml-2" style="width:50px;" v-if="keyIndex >> 0" @click="remove"  title="remove">
                                                                <i class="fa fa-minus-circle">del</i>
                                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                <div class="amount-section-div">
                    <div class="form-group-1">
                        <div>
                            <div>
                                <label class="label-4" for="totalAmount">Total Amount:</label>
                                <input class="formInput-4" type="text" id="totalAmount" name="totalAmount" >
                            </div>
                            <div>
                                <label class="label-4" for="vatAmount">+5% vat Amount:</label>
                                <input class="formInput-4" type="text" id="vatAmount" name="vatAmount" >
                            </div>
                            <div>
                                <label class="label-4" for="vatAmount">To Pay:</label>
                                <input class="formInput-4" type="text" id="vatAmount" name="vatAmount" >
                            </div>
                            <div>
                                <label class="label-4" for="vatAmount">Credit:</label>
                                <input class="formInput-4" type="text" id="vatAmount" name="vatAmount" >
                            </div>
                            <div>
                                <label class="label-4" for="netAmount">Total Net Amount:</label>
                                <input class="formInput-4" type="text" id="netAmount" name="netAmount" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group-2">
                        <div>
                            <div>
                                <label class="label-4" for="totalAmount">Total Amount:</label>
                                <input class="formInput-4" type="text" id="totalAmount" name="totalAmount" v-model="total_amount" readonly @change="calculateGrandTotal()" >
                            </div>
                            <div>
                                <label class="label-4" for="vatAmount">+5% vat Amount:</label>
                                <input class="formInput-4" type="text" id="vatAmount" name="vatAmount" v-model="vat_amount" readonly @change="calculateGrandTotal()">
                            </div>
                            <div>
                                <label class="label-4" for="vatAmount">To Pay:</label>
                                <input class="formInput-4" type="text" id="vatAmount" name="vatAmount" v-model="amount_topay" readonly >
                            </div>
                            <div>
                                <label class="label-4" for="vatAmount">Credit:</label>
                                <input class="formInput-4" type="text" id="vatAmount" name="vatAmount" v-model="credit" @change="calculateGrandTotal()" >
                            </div>
                            <div>
                                <label class="label-4" for="netAmount">Total Net Amount:</label>
                                <input class="formInput-4" type="text" id="netAmount" name="netAmount" v-model="total_net_amount" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-footer">
                 <input type="submit" value="Submit" class="submit-button">
               </div>

                </form>
            </div>
        </div>
    </div>
</template>
<script type="module">
import axios from 'axios';
import VueAxios from 'vue-axios';
export default {
    data() {
        return {
            to:'',
            invoice_no:'',
            date:'',
            phone_no:'',
            lpo:'',
            project_name:'',
            email:'',
            ref_no:'',
            term_pay:'',
            name:'',
            trn1:'',
            trn2:'',
            address:'',
            work_scope:'',
            total_net_amount:0,
            vat_amount: 0,
            amount_topay:0,
            credit:0,
            total_amount: 0,
            projects:[{
               description:'',
               quantity:0,
               unit_price:0,
               amount:0,
            }],
        }
    },
    methods:{
        add: function() {
                // this.products++;
                this.projects.push({
                    description:'',
                    quantity:'',
                    unit_price:'',
                    amount:'',
                });
                localStorage.setItem("projects", JSON.stringify(this.projects));
            },
            remove: function(index,key) {
                // this.products--;
                var idx = this.projects.indexOf(key);
                console.log(idx, index);
                if (index != 1) {
                    this.projects.splice(idx, 1);
                    localStorage.setItem("projects", JSON.stringify(this.projects));
                }

            },
            getInvoice(){
                axios.get("/api/invoice-no").then((response)=>{
                  this.invoice_no = response.data;
                  console.log(response.data);
                });
            },
            getRef(){
                axios.get("/api/ref-no").then((response)=>{
                  this.ref_no = response.data;
                  console.log(response.data);
                });
            },
            calculateRowTotal(keyIndex){
                var total = parseFloat(this.projects[keyIndex].quantity)* parseFloat(this.projects[keyIndex].unit_price);
                if (!isNaN(total)) {
                    this.projects[keyIndex].amount = total.toFixed(2);
                }
                this.calculateTotal();
            },
            calculateTotal(keyIndex){
                var lineTotal=0;

                // for (let keyIndex = 0; keyIndex < this.products.length; keyIndex++) {
                //
                // }
                lineTotal= this.projects.reduce(function (a,b){
                    var rowTotal = parseFloat(b.amount);
                    return a + rowTotal;
                },0);
                console.log(lineTotal);
                this.total_amount = lineTotal.toFixed(2);
                this.calculateGrandTotal();
                this.calculateVat();
            },
            calculateVat(){

                var vat = 0;
                vat = this.total_amount * (5/100);
                this.vat_amount = vat.toFixed(2);
                 this.calculateGrandTotal();
                 this.amountToPay();
            },
            amountToPay(){
                var pay = parseFloat(this.total_amount) + parseFloat(this.vat_amount);
                this.amount_topay = pay.toFixed(2);
            },
            calculateGrandTotal(){
                var grand = 0;
                if(!isNaN(this.credit)){

                    grand = parseFloat(this.total_amount) + parseFloat(this.vat_amount) - parseFloat(this.credit);
                }else{
                    grand = parseFloat(this.total_amount) + parseFloat(this.vat_amount);
                }
                this.total_net_amount = grand.toFixed(2);
                console.log("this value is",this.total_net_amount)
            },
            submit: function (e) {
                    axios.post('/api/acount-store', {
                        to:this.to,
                invoice_no:this.invoice_no,
                      date:this.date,
                  phone_no:this.phone_no,
                       lpo:this.lpo,
              project_name:this.project_name,
                     email:this.email,
                    ref_no:this.ref_no,
                  term_pay:this.term_pay,
                      name:this.name,
                      trn1:this.trn1,
                      trn2:this.trn2,
                   address:this.address,
                work_scope:this.work_scope,
          total_net_amount:this.total_net_amount,
              amount_topay:this.amount_topay,
                    credit:this.credit,
                  projects:this.projects

                    }).then((response) => {
                        // console.log(response);
                        // this.response = response.data
                        // this.success = 'Data saved successfully';
                        // this.response = JSON.stringify(response, null, 2)
                        // this.id = response.data;

                            window.location.href=('/account-master-table');

                            // window.location.href=('/purchase-total/');

                    });

                e.preventDefault();

            }

        },
        mounted() {
            this.calculateRowTotal();
            this.calculateTotal();
            this.calculateVat();
            this.calculateGrandTotal();
            this.amountToPay();
            this.getInvoice();
            this.getRef();
        },


}
</script>
