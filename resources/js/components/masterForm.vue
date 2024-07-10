<template>
    <div class="master-form-body">
        <div class="invoice-container">
            <div>
                <div class="invoice-header">
                    <h1>TAX INVOICE</h1>
                </div>

                <form>
                    <div class="form-group">
                        <div>
                            <label for="to">To:</label>
                            <input type="text" id="to" name="to" required>
                        </div>
                        <div>
                            <label for="invoiceNo">Invoice No:</label>
                            <input type="text" id="invoiceNo" name="invoiceNo" required>
                        </div>
                        <div>
                            <label for="date">Date:</label>
                            <input type="text" id="date" name="date" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="phoneNo">Phone No:</label>
                            <input type="text" id="phoneNo" name="phoneNo" required>
                        </div>
                        <div>
                            <label for="LPO">LPO:</label>
                            <input type="text" id="LPO" name="LPO" required>
                        </div>
                        <div>
                            <label for="projectName">Project Name:</label>
                            <input type="text" id="projectName" name="projectName" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div>
                            <label for="termOfPay">Term of Pay:</label>
                            <input type="text" id="termOfPay" name="termOfPay" required>
                        </div>
                        <div>
                            <label for="ref">Ref:</label>
                            <input type="text" id="ref" name="ref" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="nameAttn">Name/Attn:</label>
                            <input type="text" id="nameAttn" name="nameAttn" required>
                        </div>
                        <div>
                            <label for="trn1">Trn1:</label>
                            <input type="text" id="trn1" name="trn1" required>
                        </div>
                        <div>
                            <label for="trn2">Trn2:</label>
                            <input type="text" id="trn2" name="trn2" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <label for="address">Address:</label>
                            <input class="addressScope" type="text"  id="address" name="address" required>
                        </div>
                        <div>
                            <label for="scopeOfWork">Scope of Work:</label>
                            <input class="addressScope" type="text" id="scopeOfWork" name="scopeOfWork" required>
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
                                    <td><div ><input type="number" id="quantity" name="quantity" v-model="key.quantity"></div></td>
                                    <td><div ><input type="number" id="unit-price" name="unit-price" step="0.01" v-model="key.unit_price"></div></td>
                                    <td><div ><input type="number" id="amount" name="amount" step="0.01" v-model="key.amount"></div></td>
                                    <td>
                                        <div class="col-md-2">
                                            <!--                <label  class="row" v-if="keyIndex == 0"></label><br>-->

                                                            <button  class="btn btn-success btn-sm mt-2 ml-2 " style="margin-bottom: 0; width:50px;" v-if="keyIndex == Object.keys(projects).length -1" @click="add" title="add" id="add_more_fields">
                                                                <i class="fa fa-plus-circle">add</i>
                                                            </button>
                                                            <button  class="btn btn-danger btn-sm mt-2 ml-2" style="width:50px;" v-if="keyIndex >> 0" @click="remove"  title="remove">
                                                                <i class="fa fa-minus-circle">del</i>
                                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!------------- lkhaodghloashgdloashgoh------------- -->
                        <div class="d-flex justify-content-between">
                            <div class="form-group2">
                                <div>
                                <div>
                                    <label for="totalAmount">Total Amount:</label>
                                    <input type="text" id="totalAmount" name="totalAmount" required>
                                </div>
                                <div>
                                    <label for="vatAmount">+5% vat Amount:</label>
                                    <input type="text" id="vatAmount" name="vatAmount" required>
                                </div>
                                <div>
                                    <label for="netAmount">Total Net Amount:</label>
                                    <input type="text" id="netAmount" name="netAmount" required>
                                </div>
                            </div>
                            </div>
                            <div class="form-group1">
                                <div>
                                <div class="d-flex ">
                                    <label class="form-group1Label" for="totalAmount">Total Amount:</label>
                                    <input type="text" id="totalAmount" name="totalAmount" required>
                                </div>
                                <div class="d-flex ">
                                    <label class="form-group1Label" for="vatAmount">+5% vat Amount:</label>
                                    <input type="text" id="vatAmount" name="vatAmount" required>
                                </div>
                                <div class="d-flex ">
                                    <label class="form-group1Label" for="netAmount">Total Net Amount:</label>
                                    <input type="text" id="netAmount" name="netAmount" required>
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
            ref:'',
            term_pay:'',
            name:'',
            trn1:'',
            trn2:'',
            address:'',
            work_scope:'',
            total_net_amount:'',
            vat_amount:'',
            total_amount:'',
            projects:[{
               description:'',
               quantity:'',
               unit_price:'',
               amount:'',
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
    }


}
</script>
