<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Order</title>

    <style>
        .invoice-box {
            width: 21cm;
            height: 29.7cm;
            margin: 30mm 45mm;
            font-family: "Open Sans", sans-serif;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .headerImg {
            width: 100%;
            height: 150px;
        }

        .footerImg {
            width: 100%;
            height: 120px;
            position: relative;
            top: 173px;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            font-size: 24px;
            margin: 10px 0;
            color: #004c6d;
        }

        .parentBoldInvoiceData {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        .boldInvoiceData1 {
            visibility: hidden;
            background-color: rgba(127, 217, 255, 0.495);
            display: flex;
            gap: 40px;
            font-weight: 700;
            padding-left: 40px;
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
        }

        .boldInvoiceData2 {
            width: 400px;
            height: 45px;
            background-color: rgba(127, 217, 255, 0.495);
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            padding-left: 20px;
            border-top-left-radius: 50px;
            border-bottom-left-radius: 50px;
        }

        .mx-div {
            margin-left: 40px;
            margin-right: 40px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 100px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 14px;
        }

        .invoice-table th {
            background-color: #004c6d;
            color: white;
            font-weight: bold;
        }

        .invoice-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .invoice-summary {
            text-align: right;
            margin-top: 20px;
        }

        .invoice-summary p {
            margin: 5px 0;
        }

        .invoice-summary p.total {
            font-weight: bold;
            color: #004c6d;
        }

        .invoice-footer {
            text-align: center;
            color: #777;
            margin-top: 30px;
        }

        .informationDiv {
            width: 100%;
            display: flex;
            justify-content: space-between;
            gap: 10px;
            font-size: 14px;
        }

        .information1 {
            width: 50%;
        }

        .information2 {
            width: 50%;
        }

        .boldSpan {
            font-weight: bold;
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <div class="invoice-box">
        <!-- header img section  -->
        <img class="headerImg" src="/image/Invoice-Qalat-Header.png" alt="" />

        <!-- invoiceNo  & Date section  -->
        <div class="parentBoldInvoiceData">
            <div class="boldInvoiceData1">
                <p><span>Invoice No: </span><span>akz-0042223</span></p>
                <p><span>Date: </span><span>2024-07-15</span></p>
            </div>
            <div class="boldInvoiceData2">
                <p><span>Invoice No: </span><span>{{ $purchase->invoice_no }}</span></p>
                <p><span>Date: </span><span>{{ $purchase->date }}</span></p>
            </div>
        </div>
        <!-- Table section -->
        <div class="mx-div">

            <!-- information section  -->
            <div class="informationDiv">
                <div class="information1">
                    <p>
                        <span class="boldSpan">To: </span>
                        <span>{{ $purchase->to }}</span>
                    </p>
                    <p>
                        <span class="boldSpan">Tel: </span>
                        <span> {{ $purchase->phoneNo }}</span>
                    </p>
                    <p>
                        <span class="boldSpan">Atn: </span>
                        <span>{{ $purchase->name }}</span>
                    </p>
                    <p>
                        <span class="boldSpan">Project: </span>
                        <span>{{ $purchase->proect_name }}</span>
                    </p>
                    <p>
                        <span class="boldSpan">TRN1:</span>
                        <span>{{ $purchase->trn1 }}</span>
                    </p>
                    <p>
                        <span class="boldSpan">Address: </span>
                        <span>{{ $purchase->address }}</span>
                    </p>
                </div>
                <div class="information2">
                    <p>
                        <span class="boldSpan">Terms of payment: </span>
                        <span>{{ $purchase->term_pay }}</span>
                    </p>
                    <p>
                        <span class="boldSpan">Email: </span>
                        <span>{{ $purchase->email }}</span>
                    </p>
                    <p>
                        <span class="boldSpan">Ref:</span>
                        <span>{{ $purchase->ref_no }}</span>
                    </p>
                    <p>
                        <span class="boldSpan">TRN:</span>
                        <span>{{ $purchase->trn2 }}</span>
                    </p>
                    <p>
                        <span class="boldSpan">Scope of Works: </span>
                        <span>{{ $purchase->work_scope }}</span>
                    </p>
                </div>
            </div>

            <!-- table no 2  -->
            <table class="invoice-table">
                <tr class="heading">
                    <th>SR.</th>
                    <th colspan="2">Description</th>
                    <th>Qty.</th>
                    <th>Unit price</th>
                    <th>Amount</th>
                </tr>
                <?php
                $projects = json_decode($purchase['projects']);
                $amt = 0;
                ?>
                @foreach ($projects as $project)
                    <tr class="item">
                        <td>{{ $loop->iteration }}</td>
                        <td colspan="2">
                            {{ $project->description }}
                        </td>
                        <td>{{ $project->quantity }}</td>
                        <td>{{ $project->unit_price }}</td>
                        <td>{{ $project->amount }}</td>
                        @php
                            $amt += $project->amount;
                        @endphp
                    </tr>
                @endforeach
                @php
                    $vat = $amt * (5 / 100);
                @endphp
                <tr class="total">
                    <td colspan="5" class="right-align">Subtotal:</td>
                    <td>{{ $amt }}</td>
                </tr>
                <tr class="total">
                    <td colspan="5" class="right-align">+ 5% VAT Amount:</td>
                    <td>{{ $vat }}</td>
                </tr>
                <tr class="total">
                    <td colspan="5" class="right-align">Credit:</td>
                    <td>{{ $purchase->credit }}</td>
                </tr>
                <tr class="total">
                    <td colspan="5" class="right-align">Total Net Amount:</td>
                    <td>{{ $purchase->total_net_amount }}</td>
                </tr>
                <tr class="details text-center fw-bold">
                    <td id="amount-in-words" colspan="6">

                    </td>
                </tr>
            </table>
        </div>

        <!-- footer img section  -->
        <img class="footerImg" src="/image/Invoice-Qalat-FOoter.png" alt="" />
    </div>

</body>
<script>
    function numberToWords(num) {
        const ones = ["", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"];
        const teens = ["Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
        const tens = ["", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];

        if (num === 0) return "Zero";

        if (num < 10) return ones[num];
        if (num < 20) return teens[num - 10];
        if (num < 100) return tens[Math.floor(num / 10)] + (num % 10 ? " " + ones[num % 10] : "");
        if (num < 1000) return ones[Math.floor(num / 100)] + " Hundred" + (num % 100 ? " and " + numberToWords(num % 100) : "");
        if (num < 10000) return ones[Math.floor(num / 1000)] + " Thousand" + (num % 1000 ? " " + numberToWords(num % 1000) : "");

        return "";
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        const number = {{$purchase->total_net_amount}}; // The number you want to convert
        const amountInWords = numberToWords(number) + " Only.";
        document.getElementById('amount-in-words').textContent = "In Words: AED – " + amountInWords;
    });
</script>

</html>
