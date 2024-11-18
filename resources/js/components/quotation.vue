<template>
  <form @submit.prevent="submit()">
    <div class="quotation-container">
      <div class="invoice-box1">
        <div class="form-group">
          <div>
            <label for="ref-no">Ref.No:</label>
            <input
              type="text"
              id="ref-no"
              name="ref-no"
              class="formInput"
              v-model="ref_no"
            />
          </div>
          <div>
            <label class="label-1" for="date">Date:</label>
            <input type="date" id="date" name="date" class="formInput-1" v-model="date" />
          </div>
        </div>
        <div class="form-group">
          <div>
            <label for="m-s">M/S:</label>
            <input type="text" id="m-s" name="m-s" class="formInput-3" v-model="ms" />
          </div>
          <div>
            <label class="" for="po-box">P.O Box:</label>
            <input
              type="text"
              id="po-box"
              name="po-box"
              class="formInput-4"
              v-model="po_box"
            />
          </div>
        </div>
        <div class="form-group">
          <div>
            <label for="tek">Tel:</label>
            <input
              type="text"
              id="tel"
              name="tel"
              class="formInput-5"
              v-model="phone_no"
            />
          </div>
          <div>
            <label for="email">Email:</label>
            <input
              type="email"
              id="email"
              name="email"
              class="formInput-7"
              v-model="email"
            />
          </div>
        </div>
        <div class="form-group">
          <div>
            <label class="" for="kind-attn">Kind Attn:</label>
            <input
              type="text"
              id="kind-attn"
              name="kind-attn"
              class="formInput-6"
              v-model="kind_attn"
            />
          </div>
          <div>
            <label class="" for="project-name">Project Name:</label>
            <input
              type="text"
              id="project-name"
              name="project-name"
              class="formInput-2"
              v-model="project_name"
            />
          </div>
        </div>
      </div>
      <div>
        <p class="heading">Dear Sir,</p>
        <p>
          With reference to your inquiry, we are pleased to offer our quotation for the
          subject items. We welcome the opportunity to provide this business solution for
          you and look forward to establishing a mutually rewarding relationship with your
          esteemed organization.
        </p>
        <p class="heading">Scope of Works:</p>
        <!-- <div class="header-section">
            <div  class="heading">
                Ref.No: <input class="parentInput1" type="text" name="" id="" v-model="ref_no">
                    <br><br>
                  Date: <input class="parentInput2" type="date" name="" id="" v-model="date">
            </div>
        </div> <br>
        <p class="heading">M/S: <input class="parentInput3" type="text" name="" id="" v-model="ms"><br><br>
          P.O Box: <input class="parentInput4" type="text" name="" id="" v-model="po_box"><br><br>
          Tel: <input class="parentInput5" type="number" name="" id="" v-model="phone_no"><br><br>
          Email: <input class="parentInput6" type="email" name="" id="" v-model="email"></p>
        <p class="heading">Kind Attn: <input class="parentInput7" type="text" name="" id="" v-model="kind_attn"><br><br>
          Project Name: <input class="parentInput8" type="text" name="" id="" v-model="project_name"></p><br>

        <p>Dear Sir,</p>
        <p>With reference to your inquiry, we are pleased to offer our quotation for the subject items. We welcome the
            opportunity to provide this business solution for you and look forward to establishing a mutually rewarding
            relationship with your esteemed organization.</p>
        <p class="heading">Scope of Works:</p> -->
      </div>
      <div class="invoice-section2">
        <table class="invoice-table">
          <thead>
            <tr>
              <th>Sl No.</th>
              <th>Work Description</th>
              <th>Qty</th>
              <th>Unit</th>
              <th>Unit Rate</th>
              <th>Total Amount</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <td>1</td>
              <td><input id="description" name="description" rows="2" required></input></td>
              <td><input type="number" id="quantity" name="quantity" required></td>
              <td><input type="number" id="unit-price" name="unit-price" step="0.01" required></td>
              <td><input type="number" id="amount" name="amount" step="0.01" required></td>
            </tr> -->
            <tr v-for="(key, keyIndex) in projects" :key="key.id">
              <td>1.</td>
              <td>
                <p class="heading">
                  <input
                    class="parentInput"
                    type="text"
                    name=""
                    id=""
                    v-model="key.heading"
                  />
                </p>
                <p>
                  <textarea
                    :id="'textarea1' + keyIndex"
                    @keydown.enter.prevent="
                      handleEnterKey('textarea1' + keyIndex, $event)
                    "
                    placeholder="write something "
                    v-model="key.description"
                    class="formIn"
                  ></textarea>
                </p>
              </td>
              <td>
                <input
                  type="number"
                  name=""
                  id=""
                  v-model="key.quantity"
                  @change="calculateRowTotal(keyIndex)"
                />
              </td>
              <td><input type="text" name="" id="" v-model="key.unit" /></td>
              <td>
                <input
                  type="number"
                  name=""
                  id=""
                  v-model="key.unit_rate"
                  @change="calculateRowTotal(keyIndex)"
                />
              </td>
              <td>
                <input type="number" name="" id="" v-model="key.amount" readonly />
              </td>
              <td>
                <div class="col-md-2">
                  <!--                <label  class="row" v-if="keyIndex == 0"></label><br>-->

                  <button
                    class="add-button mt-2 ml-2"
                    style="margin-bottom: 0; width: 50px"
                    v-if="keyIndex == Object.keys(projects).length - 1"
                    @click="add"
                    title="add"
                    id="add_more_fields"
                  >
                    <i class="fa fa-plus-circle">add</i>
                  </button>
                  <button
                    class="delete-button text-uppercase mt-2 ml-2"
                    style="width: 50px"
                    v-if="keyIndex >> 0"
                    @click="remove"
                    title="remove"
                  >
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
            <label class="label-2" for="totalAmount">Total Cost:</label>
            <input
              class="formInput-8"
              type="text"
              id="totalAmount"
              name="totalAmount"
              required
            />
          </div>
          <div>
            <label class="label-2" for="vatAmount">+5% vat Amount:</label>
            <input
              class="formInput-9"
              type="text"
              id="vatAmount"
              name="vatAmount"
              required
            />
          </div>
          <div>
            <label class="label-2" for="vatAmount">To Pay:</label>
            <input
              class="formInput-10"
              type="text"
              id="vatAmount"
              name="vatAmount"
              required
            />
          </div>
          <div>
            <label class="label-2" for="vatAmount">Credit:</label>
            <input
              class="formInput-11"
              type="text"
              id="vatAmount"
              name="vatAmount"
              required
            />
          </div>
          <div>
            <label class="label-2" for="netAmount">Total Net Amount:</label>
            <input
              class="formInput-12"
              type="text"
              id="netAmount"
              name="netAmount"
              required
            />
          </div>
        </div>

        <div class="form-group-2">
          <div>
            <div>
              <label class="label-2" for="totalAmount">Total Cost:</label>
              <input
                class="formInput-8"
                type="number"
                id="totalAmount"
                name="totalAmount"
                v-model="total_amount"
                readonly
                step="0.01"
              />
            </div>
            <div>
              <label class="label-2" for="vatAmount">+5% vat Amount:</label>
              <input
                class="formInput-9"
                type="number"
                id="vatAmount"
                name="vatAmount"
                step="0.01"
                v-model="vat_amount"
                readonly
              />
            </div>
            <!-- <div>
              <label class="label-2" for="vatAmount">To Pay:</label>
              <input class="formInput-10" type="text" id="vatAmount" name="vatAmount" required>
            </div> -->
            <div>
              <label class="label-2" for="vatAmount">Discount:</label>
              <input
                class="formInput-11"
                type="number"
                id="vatAmount"
                name="vatAmount"
                v-model="discount"
                step="0.01"
                @change="calculateGrandTotal()"
              />
            </div>
            <div>
              <label class="label-2" for="netAmount" style="font-size: 10px !important"
                >Total Net Amount:</label
              >
              <input
                class="formInput-12"
                type="number"
                id="netAmount"
                name="netAmount"
                v-model="total_net_amount"
                step="0.01"
                readonly
              />
            </div>
          </div>
        </div>
      </div>

      <div class="form-group-textarea">
        <div>
          <label class="label-3" for="address">General Condition:</label>
          <textarea
            class="formInput-13 textarea3"
            type="text"
            id="textarea2"
            @keydown.enter.prevent="handleEnterKey('textarea2', $event)"
            placeholder="write something"
            name="condition"
            v-model="conditon"
          ></textarea>
        </div>
        <div>
          <label class="label-4" for="scopeOfWork">Payment Terms:</label>
          <textarea
            class="formInput-13 textarea3"
            type="text"
            id="textarea3"
            @keydown.enter.prevent="handleEnterKey('textarea3', $event)"
            placeholder="write something"
            name="scopeOfWork"
            v-model="payment_term"
          ></textarea>
        </div>
      </div>

      <!-- <div class="invoice-box2">
        <div class="header-section"></div> -->
        <!-- <table>
          <tr>
            <th>Sl No.</th>
            <th>Work Description</th>
            <th>Qty</th>
            <th>Unit</th>
            <th>Unit Rate</th>
            <th>Total Amount</th>
            <th>Action</th>
          </tr>
          <tr v-for="(key, keyIndex) in projects" :key="key.id">
            <td>1.</td>
            <td>
              <p class="heading">
                <input
                  class="parentInput"
                  type="text"
                  name=""
                  id=""
                  v-model="key.heading"
                />
              </p>
              <ul>
                <textarea
                  :id="'textarea1' + keyIndex"
                  @keydown.enter.prevent="handleEnterKey('textarea1' + keyIndex, $event)"
                  placeholder="write something"
                  v-model="key.description"
                ></textarea>
              </ul>
            </td>
            <td>
              <input
                type="number"
                name=""
                id=""
                v-model="key.quantity"
                @change="calculateRowTotal(keyIndex)"
              />
            </td>
            <td><input type="text" name="" id="" v-model="key.unit" /></td>
            <td>
              <input
                type="number"
                name=""
                id=""
                v-model="key.unit_rate"
                @change="calculateRowTotal(keyIndex)"
              />
            </td>
            <td><input type="number" name="" id="" v-model="key.amount" readonly /></td>
            <td>
              <div class="col-md-2">

                <button
                  class="add-button mt-2 ml-2"
                  style="margin-bottom: 0; width: 50px"
                  v-if="keyIndex == Object.keys(projects).length - 1"
                  @click="add"
                  title="add"
                  id="add_more_fields"
                >
                  <i class="fa fa-plus-circle">add</i>
                </button>
                <button
                  class="delete-button text-uppercase mt-2 ml-2"
                  style="width: 50px"
                  v-if="keyIndex >> 0"
                  @click="remove"
                  title="remove"
                >
                  <i class="fa fa-minus-circle">del</i>
                </button>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="5" style="text-align: right">Total Cost</td>
            <td><input type="number" name="" id="" v-model="total_amount" readonly /></td>
          </tr>
          <tr>
            <td colspan="5" style="text-align: right">5% VAT</td>
            <td>
              <input
                type="number"
                name=""
                step="0.01"
                id=""
                v-model="vat_amount"
                readonly
              />
            </td>
          </tr>
          <tr>
            <td colspan="5" style="text-align: right">Discount</td>
            <td>
              <input
                type="number"
                name=""
                id=""
                step="0.01"
                v-model="discount"
                @change="calculateGrandTotal()"
              />
            </td>
          </tr>
          <tr>
            <td colspan="5" style="text-align: right">Total Net Amount</td>
            <td>
              <input
                type="number"
                name=""
                id=""
                step="0.01"
                v-model="total_net_amount"
                readonly
              />
            </td>
          </tr>
        </table> -->
        <!-- <p>Total Amount in Words: AED – Forty Thousand Five Only.</p>
        <div class="content">
          <p class="heading">General Condition:</p>
          <ul> -->
            <!-- <textarea
              class="textarea3"
              id="textarea2"
              @keydown.enter.prevent="handleEnterKey('textarea2', $event)"
              placeholder="write something"
              v-model="conditon"
            ></textarea> -->
          <!-- </ul>
          <p class="heading">Payment Terms:</p>
          <ul> -->
            <!-- <textarea
              class="textarea3"
              id="textarea3"
              @keydown.enter.prevent="handleEnterKey('textarea3', $event)"
              placeholder="write something"
              v-model="payment_term"
            ></textarea> -->
          <!-- </ul>
          <p>
            If any discrepancies in the invoice, Client should inform to Qalat-Al-Khaleej
            Accounts Department within 7 days from the receipt of invoices, unless
            otherwise we will consider the invoice has been accepted for payment.
          </p>
          <p class="heading">Project Duration:</p>
          <p>To be discussed.</p>
        </div> -->
        <!-- <br />
        <br /> -->
        <p>If any discrepancies in the invoice, Client should inform to Qalat-Al-Khaleej Accounts Department within 7
        days from the receipt of invoices, unless otherwise we will consider the invoice has been accepted for
        payment.</p>
      <p class="heading">Project Duration:</p>
      <p>To be discussed.</p>
        <div class="invoice-footer">
          <input type="submit" value="Submit" class="submit-button" />
        </div>
      </div>
    <!-- </div> -->
  </form>
</template>
<script type="module">
import axios from "axios";
import VueAxios from "vue-axios";
export default {
  data() {
    return {
      ref_no: "",
      date: "",
      ms: "",
      po_box: "",
      phone_no: "",
      email: "",
      kind_attn: "",
      project_name: "",
      payment_term: "",
      conditon:"",
      projects: [
        {
          heading: "",
          description: "",
          quantity: "",
          unit: "",
          unit_rate: "",
          amount: 0,
        },
      ],
      total_amount: 0,
      vat_amount: 0,
      total_net_amount: 0,
      discount: 0,
    };
  },
  methods: {
    add: function () {
      // this.products++;
      this.projects.push({
        heading: "",
        description: "",
        quantity: "",
        unit: "",
        unit_rate: "",
        amount: "",
      });
      localStorage.setItem("projects", JSON.stringify(this.projects));
    },
    remove: function (index, key) {
      // this.products--;
      var idx = this.projects.indexOf(key);
      console.log(idx, index);
      if (index != 1) {
        this.projects.splice(idx, 1);
        localStorage.setItem("projects", JSON.stringify(this.projects));
      }
    },
    calculateRowTotal(keyIndex) {
      var total =
        parseFloat(this.projects[keyIndex].quantity) *
        parseFloat(this.projects[keyIndex].unit_rate);
      if (!isNaN(total)) {
        this.projects[keyIndex].amount = total.toFixed(2);
      }
      this.calculateTotal();
    },
    calculateTotal(keyIndex) {
      var lineTotal = 0;

      // for (let keyIndex = 0; keyIndex < this.products.length; keyIndex++) {
      //
      // }
      lineTotal = this.projects.reduce(function (a, b) {
        var rowTotal = parseFloat(b.amount);
        return a + rowTotal;
      }, 0);
      console.log(lineTotal);
      this.total_amount = lineTotal.toFixed(2);
      this.calculateGrandTotal();
      this.calculateVat();
    },
    calculateVat() {
      var vat = 0;
      vat = this.total_amount * (5 / 100);
      this.vat_amount = vat.toFixed(2);
      this.calculateGrandTotal();
      this.amountToPay();
    },
    amountToPay() {
      var pay = parseFloat(this.total_amount) + parseFloat(this.vat_amount);
      this.amount_topay = pay.toFixed(2);
    },
    calculateGrandTotal() {
      var grand = 0;
      if (!isNaN(this.credit)) {
        grand =
          parseFloat(this.total_amount) +
          parseFloat(this.vat_amount) -
          parseFloat(this.credit);
      } else {
        grand =
          parseFloat(this.total_amount) +
          parseFloat(this.vat_amount) -
          parseFloat(this.discount);
      }
      this.total_net_amount = grand.toFixed(2);
      console.log("this value is", this.total_net_amount);
    },
    handleEnterKey(textareaId, event) {
      const textarea = document.getElementById(textareaId);
      const value = textarea.value;
      const lines = value.split("\n");
      const currentLineIndex = this.getCurrentLineIndex(textarea);
      const currentLine = lines[currentLineIndex];

      if (this.isBulletPoint(currentLine)) {
        lines[currentLineIndex] = currentLine.slice(2);
      } else {
        lines.splice(currentLineIndex, 0, "• ");
      }

      textarea.value = lines.join("\n");
      textarea.selectionStart = textarea.selectionEnd = this.getNewCursorPosition(
        currentLineIndex,
        currentLine,
        this.isBulletPoint(currentLine)
      );
    },
    getCurrentLineIndex(textarea) {
      return textarea.value.substr(0, textarea.selectionStart).split("\n").length - 1;
    },
    isBulletPoint(line) {
      return /^ /.test(line.trim());
    },
    getNewCursorPosition(currentLineIndex, currentLine, isBullet) {
      if (isBullet) {
        return currentLineIndex * 2; // Assuming '• ' is 2 characters long
      } else {
        return (currentLineIndex + 1) * 2; // Assuming '• ' is 2 characters long
      }
    },
    submit: function (e) {
      axios
        .post("/api/quotation-store", {
          ref_no: this.ref_no,
          date: this.date,
          ms: this.ms,
          po_box: this.po_box,
          phone_no: this.phone_no,
          email: this.email,
          kind_attn: this.kind_attn,
          project_name: this.project_name,
          projects: this.projects,
          conditon: this.conditon,
          total_amount: this.total_amount,
          vat_amount: this.vat_amount,
          total_net_amount: this.total_net_amount,
          payment_term: this.payment_term,
        })
        .then((response) => {
          console.log(response.data);
          // console.log(response);
          // this.response = response.data
          // this.success = 'Data saved successfully';
          // this.response = JSON.stringify(response, null, 2)
          // this.id = response.data;

          // window.location.reload();

          window.location.href = "/quotation-list/";
        });

      e.preventDefault();
    },
  },
  mounted() {
    this.calculateRowTotal();
    this.calculateTotal();
    this.calculateVat();
    this.calculateGrandTotal();
    this.amountToPay();
  },
};
</script>
