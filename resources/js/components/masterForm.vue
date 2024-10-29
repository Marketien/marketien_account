<template>
    <div class="master-form-body">
        <div class="invoice-container">
            <div>
                <div class="invoice-header">
                    <h1>Create Invoice</h1>
                </div>

                <form @submit.prevent="submit()">
                    <div class="form-group">
                        <div>
                            <label for="to">To:</label>
                            <input type="text" id="to" name="to" v-model="to" >
                        </div>
                        <div>
                            <label for="invoiceNo">Invoice No:</label>
                            <div class="invoiceDiv">
                                <input type="text" id="invoiceNo" name="invoiceNo" v-model="invoice_no">
                                <div type="button" @click="getInvoice()" >
                                    <img id="generateNumberIcon" class="passMngIcon" src="image/password-manager-icon.png" alt="" >
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="date">Date:</label>
                            <input class="dateinput" type="date" id="date" name="date" v-model="date" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="phoneNo">Phone No:</label>
                            <input type="text" id="phoneNo" name="phoneNo" v-model="phone_no" >
                        </div>
                        <div>
                            <label for="LPO">LPO:</label>
                            <input type="text" id="LPO" name="LPO" v-model="lpo" >
                        </div>
                        <div>
                            <label for="projectName">Project Name:</label>
                            <input type="text" id="projectName" name="projectName" v-model="project_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" v-model="email">
                        </div>
                        <div>
                            <label for="termOfPay">Term of Pay:</label>
                            <input type="text" id="termOfPay" name="termOfPay" v-model="term_pay">
                        </div>
                        <div>
                            <label for="ref">Ref:</label>
                            <!-- <input type="text" id="ref" name="ref" v-model="ref_no"> -->
                            <div class="invoiceDiv">
                                <input type="text" id="refNo" name="invoiceNo" v-model="ref_no">
                                <div type="button" @click="getRef()" >
                                    <img id="generateNumberIcon" class="passMngIcon" src="image/password-manager-icon.png" alt="" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="nameAttn">Name/Attn:</label>
                            <input type="text" id="nameAttn" name="nameAttn" v-model="name" >
                        </div>
                        <div>
                            <label for="trn1">Trn1:</label>
                            <input type="text" id="trn1" name="trn1" v-model="trn1">
                        </div>
                        <div>
                            <label for="trn2">Trn2:</label>
                            <input type="text" id="trn2" name="trn2" v-model="trn2">
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="address">Address:</label>
                            <textarea class="addressScope" type="text"  id="address" name="address" v-model="address"></textarea>
                        </div>
                        <div>
                            <label for="scopeOfWork">Scope of Work:</label>
                            <textarea class="addressScope" type="text" id="scopeOfWork" name="scopeOfWork" v-model="work_scope" ></textarea>
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
                        <!------------- lkhaodghloashgdloashgoh------------- -->
                        <div class="d-flex justify-content-between">
                            <!-- hidden section -->
                            <div class="form-group2">
                                <div>
                                <div>
                                    <label for="totalAmount">Total Amount:</label>
                                    <input type="text" id="totalAmount" name="totalAmount" >
                                </div>
                                <div>
                                    <label for="vatAmount">+5% vat Amount:</label>
                                    <input type="text" id="vatAmount" name="vatAmount">
                                </div>
                                <div>
                                    <label for="vatAmount">+5% vat Amount:</label>
                                    <input type="text" id="vatAmount" name="vatAmount">
                                </div>
                                <div>
                                    <label for="vatAmount">Credit:</label>
                                    <input type="text" id="vatAmount" name="vatAmount">
                                </div>
                                <div>
                                    <label for="netAmount">Total Net Amount:</label>
                                    <input type="text" id="netAmount" name="netAmount">
                                </div>
                            </div>
                            </div>
                            <div class="form-group1">
                                <div>
                                <div class="d-flex ">
                                    <label class="form-group1Label" for="totalAmount">Total Amount:</label>
                                    <input type="number" id="totalAmount" name="totalAmount" v-model="total_amount" readonly @change="calculateGrandTotal()">
                                </div>
                                <div class="d-flex ">
                                    <label class="form-group1Label" for="vatAmount">+5% vat Amount:</label>
                                    <input type="number" id="vatAmount" name="vatAmount" v-model="vat_amount" readonly @change="calculateGrandTotal()">
                                </div>
                                <div class="d-flex ">
                                    <label class="form-group1Label" for="vatAmount">Amount To Pay:</label>
                                    <input type="number" id="vatAmount" name="vatAmount" v-model="amount_topay" readonly >
                                </div>
                                <div class="d-flex ">
                                    <label class="form-group1Label" for="vatAmount">Credit:</label>
                                    <input type="number" id="vatAmount" name="vatAmount" v-model="credit" @change="calculateGrandTotal()">
                                </div>
                                <div class="d-flex ">
                                    <label class="form-group1Label" for="netAmount">Total Net Amount:</label>
                                    <input type="text" id="netAmount" name="netAmount" v-model="total_net_amount" readonly>
                                </div>
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
            total_amount:0,
            projects:[{
               description:'',
               quantity:'',
               unit_price:'',
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
