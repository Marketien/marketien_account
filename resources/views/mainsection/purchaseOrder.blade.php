<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TextIInvoiceData2</title>
    <!-- bootstrap CDN  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .header-image {
        width: 100%;
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
        margin-top: 90px;
    }

    .signatureBody th {
        text-align: center;
    }

    .signatureBody td {
        height: 150px;
    }

    .heading {
        font-weight: 700;
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

    .sealImg1 {
        visibility: hidden;
        width: 100%;
        max-width: 150px;
        display: block;
        margin: auto;
    }

    .sealImg2 {
        width: 100%;
        max-width: 150px;
        display: block;
        margin: auto;
    }
</style>

<body>

        <div class="invoice-box container_content" id="container_content">

            <img class="header-image" src="/image/Header.png" alt="">

            <h2 class="InvoiceText">Order Invoice</h2>
            <!-- table no 1  -->
            <table>
                <thead>
                    <tr>
                        <th>To:</th>
                        <th>{{ $purchase->to }}</th>
                        <th>Date:</th>
                        <th>{{ $purchase->date }}</th>
                    </tr>
                </thead>
                <tbody class="heading">
                    <tr>
                        <td>Address:</td>
                        <td>
                            {{ $purchase->address }}
                        </td>
                        <td>Invoice no:</td>
                        <td>{{ $purchase->invoice_no }}</td>
                    </tr>
                    <tr>
                        <td>Tel:</td>
                        <td>{{ $purchase->phoneNo }}</td>
                        <td>Terms of payment:</td>
                        <td>{{ $purchase->term_pay }}</td>
                    </tr>
                    <tr>
                        <td>Name:</td>
                        <td>{{ $purchase->name }}</td>
                        <td>Email:</td>
                        <td>{{ $purchase->email }}</td>
                    </tr>
                    <tr>
                        <td>Project:</td>
                        <td>{{ $purchase->proect_name }}</td>
                        <td>Ref:</td>
                        <td>PO-111238</td>
                    </tr>
                    <tr>
                        <td>TRN:</td>
                        <td>{{ $purchase->trn1 }}</td>
                        <td>TRN:</td>
                        <td>{{ $purchase->trn2 }}</td>
                    </tr>
                    <tr>
                        <td>Scope of Works</td>
                        <td>
                            {{ $purchase->work_scope }}
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
                <?php
                $projects = json_decode($purchase['projects']);
                $amt = 0;
                ?>
                @foreach ($projects as $project)
                    <tr class="item">
                        <td scope="row">{{ $loop->iteration }}</td>
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
                    <td colspan="6">
                        In Words: AED – Five Thousand Two Hundred Fifty Only.
                    </td>
                </tr>
            </table>
            <!-- table no 3  -->
            <div class="mt-5">
                <table>
                    <thead class="signatureBody">
                        <th>Prepared By</th>
                        <th>Approved</th>
                    </thead>
                    <tbody class="signatureBody">
                        <td><img class="sealImg1" src="/image/Seal & Signature.png" alt=""></td>
                        <td><img class="sealImg2" src="/image/Seal & Signature.png" alt=""></td>
                    </tbody>
                </table>
            </div>
            <div class="details center-align mt-4">
                <p>Thanks & Best Regards<br /></p>
                <p class="ownerName">Preethi S</p>
                <p>Admin/Accounts</p>
            </div>
        </div>
        <div class="invoice-footer">
            <input type="button" id="rep" value="Make PDF" class="submit-button btn_print">
        </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function($) {

        $(document).on('click', '.btn_print', function(event) {
            event.preventDefault();

            //credit : https://ekoopmans.github.io/html2pdf.js

            var element = document.getElementById('container_content');

            //easy
            // html2pdf().from(element).save();

            //custom file name
            html2pdf().set({
                filename: '{{ $purchase->invoice_no }}'+'_Qalat-al-khaleej' + '.pdf'
            }).from(element).save();


            //more custom settings
            // var opt = {
            //     margin: 1,
            //     filename: 'pageContent_' + js.AutoCode() + '.pdf',
            //     image: {
            //         type: 'jpeg',
            //         quality: 0.98
            //     },
            //     html2canvas: {
            //         scale: 2
            //     },
            //     jsPDF: {
            //         unit: 'in',
            //         format: 'letter',
            //         orientation: 'portrait'
            //     }
            // };

            // New Promise-based usage:
            // html2pdf().set(opt).from(element).save();


        });



    });
</script>

</html>
