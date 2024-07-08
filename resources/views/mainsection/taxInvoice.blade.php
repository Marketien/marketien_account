<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TextIInvoiceData1</title>
    <!-- bootstrap CDN  -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </head>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .invoice-box {
      max-width: 800px;
      margin: auto;
      padding: 20px;
      border: 1px solid #eee;
      background-color: #f3f1f1;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
      font-size: 14px;
      line-height: 24px;
      color: #555;
    }
    .InvoiceText {
      font-size: larger;
      margin-bottom: 40px;
      font-weight: 700;
      text-decoration: underline;
      color: rgba(0, 196, 250, 0.989);
      text-align: center;
    }
    table {
      border: 1px solid black;
      width: 100%;
      margin-top: 20px;
    }
    table th {
      border-right: 1px solid black;
      border-bottom: 1px solid black;
    }
    table td {
      border-right: 1px solid black;
      border-bottom: 1px solid black;
    }
    p {
      font-weight: 700;
    }
    h6 {
      font-weight: 700;
    }
    .ownerName {
      margin-top: 130px;
    }
    .submit-button {
        display: block;
        width: 100%;
        padding: 10px;
        background: linear-gradient(to top, #3bb890, #114070);
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .submit-button:hover {
        background: linear-gradient(to bottom, #3bb890, #114070);
    }
  </style>
  <body>
    <div class="invoice-box">
      <h2 class="InvoiceText">TAX INVOICE</h2>
      <!-- table no 1  -->
      <table>
        <thead>
          <tr>
            <th>To:</th>
            <th>M/S TAALEEM SPV LIMITED</th>
            <th>Date:</th>
            <th>24/01/2023</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Address:</td>
            <td>
              24th Floor, Al Sila Tower 1, Abu-Dhabi<br />
              Global Market Square, U.A.E
            </td>
            <td>Invoice no:</td>
            <td>INV-QAK-023-154</td>
          </tr>
          <tr>
            <td>Tel:</td>
            <td>+971 4 349 8807</td>
            <td>Terms of payment:</td>
            <td>CDC</td>
          </tr>
          <tr>
            <td>Atm:</td>
            <td>Mr. Jamie McMaster</td>
            <td>Email:</td>
            <td>info@qalatalkhaleej.com</td>
          </tr>
          <tr>
            <td>Project:</td>
            <td>Boys Changing Room</td>
            <td>Ref:</td>
            <td>PO-111238</td>
          </tr>
          <tr>
            <td>TRN:</td>
            <td>10059856233685452</td>
            <td>TRN:</td>
            <td>10059856233685452</td>
          </tr>
          <tr>
            <td>Scope of Works</td>
            <td>
              carry out carpentry works and replace all 50 locks on lockers in
              girls changing rooms
            </td>
          </tr>
        </tbody>
      </table>
      <!-- table no 2  -->
      <table>
        <tr class="heading">
          <td>SR.</td>
          <td colspan="2">Description</td>
          <td>Qty.</td>
          <td>Unit price</td>
          <td>Amount</td>
        </tr>
        <tr class="item">
          <td>1.</td>
          <td colspan="2">
            Replacement and Alignment checking work with minor maintenance -
            Hinges, knob, lock and towel rod.
          </td>
          <td>01</td>
          <td>5,000.00</td>
          <td>5,000.00</td>
        </tr>
        <tr class="total">
          <td colspan="5" class="right-align">Subtotal:</td>
          <td>5,000.00</td>
        </tr>
        <tr class="total">
          <td colspan="5" class="right-align">+ 5% VAT Amount:</td>
          <td>250.00</td>
        </tr>
        <tr class="total">
          <td colspan="5" class="right-align">Total Net Amount:</td>
          <td>5,250.00</td>
        </tr>
        <tr class="details text-center fw-bold">
          <td colspan="6">
            In Words: AED – Five Thousand Two Hundred Fifty Only.
          </td>
        </tr>
      </table>
      <div class="mt-5">
        <h6 class="text-decoration-underline">
          Payment shall be made in the Name of:
        </h6>
        <p>
          <span>Account Name:</span>
          <span>Qalat Al Khaleej General Con. & Maintenance</span>
        </p>
        <p>
          <span>Account Number:</span>
          <span>IBAN: AE120313109310211007438</span>
        </p>
        <p>
          <span>Bank:</span>
          <span>Janata Bank Ltd. Abu-Dhabi Branch, Abu-Dhabi, UAE</span>
        </p>
      </div>
      <div class="details center-align mt-5">
        <p>Thanks & Best Regards<br /></p>
        <p class="ownerName">Preethi S</p>
        <p>Admin/Accounts</p>
      </div>
      <div class="invoice-footer">
        <input type="submit" value="Make PDF" class="submit-button">
    </div>
    </div>
  </body>
</html>
