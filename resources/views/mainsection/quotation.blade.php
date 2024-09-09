<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TextIInvoiceData3</title>
</head>

<style>
    .invoice3body {
        font-family: Arial, sans-serif;
    }

    .invoice-box3 {
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

    .table3 {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table3 th,
    .table3 td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    .header-section3 {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-section3 div {
        display: inline-block;
    }

    .heading3 {
        font-weight: 700;
    }

    .content3 {
        margin-top: 20px;
    }

    /* Second Section */
    .invoice4body {
        font-family: Arial, sans-serif;
    }

    .invoice-box4 {
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

    .table3{
        height:850px;
    }
    .table4 {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table4 th,
    .table4 td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    .header-section4 {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-section4 div {
        display: inline-block;
    }

    .heading4 {
        font-weight: 700;
        text-decoration: underline;
    }

    .content4 {
        margin-top: 20px;
    }

    /* third section  */
    .invoice5body {
        font-family: Arial, sans-serif;
    }

    .invoice-box5 {
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

    .heading5 {
        font-weight: 700;
        text-decoration: underline;
    }

    .content5 {
        margin-top: 20px;
    }

    .details5 {

        font-weight: 700;
    }

    .ownerName5 {
        margin-top: 130px;
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
    .header-image {
        width: 100%;
    }
</style>

<body>
    <div id="container_content">
        <div class="invoice3body">
            <div class="invoice-box3">
                <img class="header-image" src="/image/Header.png" alt="">
                <div class="header-section3">
                    <div>
                        <h7 class="heading3">Ref.No: {{ $quotation->ref_no }}<br>Date: {{ $quotation->date }}</h7>
                    </div>
                </div>
                <p class="heading3">M/S: {{ $quotation->ms }}<br>P.O Box: {{ $quotation->po_box }}<br>Tel:
                    {{ $quotation->phone_no }}<br>Email: {{ $quotation->email }}</p>
                <p class="heading3">Kind Attn: {{ $quotation->kind_attn }}<br>Project Name:
                    {{ $quotation->project_name }}
                </p>
                <p>Dear Sir,</p>
                <p>With reference to your inquiry, we are pleased to offer our quotation for the subject items. We
                    welcome
                    the opportunity to provide this business solution for you and look forward to establishing a
                    mutually
                    rewarding relationship with your esteemed organization.</p>
                <p class="heading3">Scope of Works:</p>
                <table class="table3">
                    <tr>
                        <th>Sl No.</th>
                        <th>Work Description</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Unit Rate</th>
                        <th>Total Amount</th>
                    </tr>
                    @php
                        $projects = json_decode($quotation->projects);
                    @endphp
                    @foreach ($projects as $project)
                        <tr>
                            <td>1.</td>
                            <td>
                                <p class="heading3">{{ $project->heading }}</p>
                                <p id="output">
                                    {{-- {{$project->description}} --}}
                                    @php
                                        $string = $project->description;
                                        $string = str_replace('• ', "\n• ", $string);
                                        echo nl2br($string);
                                    @endphp
                                </p>
                            </td>
                            <td>{{ number_format($project->quantity,2,'.',',') }}</td>
                            <td>{{ number_format($project->unit,2,'.',',') }}</td>
                            <td>{{ number_format($project->unit_rate,2,'.',',') }}</td>
                            <td>{{ number_format($project->amount,2,'.',',') }}</td>
                        </tr>

                    @endforeach
                </table>
            </div>
        </div>
        <div class="invoice4body">
            <div class="invoice-box4">
                <div class="header-section4">
                </div>
                <table class="table4">
                    <tr>
                        <td colspan="5" style="text-align: right;">Total Cost</td>
                        <td>{{ number_format($quotation->total_amount,2,'.',',') }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: right;">5% VAT</td>
                        <td>{{ number_format($quotation->vat_amount,2,'.',',') }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: right;">Total After Discount</td>
                        <td>{{ number_format($quotation->total_net_amount,2,'.',',') }}</td>
                    </tr>
                </table>
                <p>Total Amount in Words: AED – Forty Thousand Five Only.</p>
                <div class="content4">
                    <p class="heading4">General Condition:</p>

                    <p>
                        @php
                            $string = $quotation->conditon;
                            $string = str_replace('• ', "\n• ", $string);
                            echo nl2br($string);
                        @endphp
                    </p>

                    <p class="heading4">Payment Terms:</p>
                    <p>
                        @php
                            $string = $quotation->payment_term;
                            $string = str_replace('• ', "\n• ", $string);
                            echo nl2br($string);
                        @endphp
                    </p>
                    <p>If any discrepancies in the invoice, Client should inform to Qalat-Al-Khaleej Accounts Department
                        within 7 days from the receipt of invoices, unless otherwise we will consider the invoice has
                        been
                        accepted for payment.</p>
                    <p class="heading4">Project Duration:</p>
                    <p>To be discussed.</p>
                </div>
            </div>
        </div>
        <div class="invoice5body">
            <div class="invoice-box5">
                <p class="heading5">Quotation Validity:</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet assumenda recusandae consequuntur
                    officiis rem fugiat perspiciatis laudantium, inventore facere voluptas eaque officia ut doloremque,
                    laborum harum magni! Nulla, eligendi doloremque.?</p>

                <div class="details5">
                    <p>Thanks & Best Regards<br /></p>
                    <p class="ownerName5">Preethi S</p>
                    <p>Tel: +971 50273 6738 </p>
                </div>
            </div>
        </div>
    </div>
    <div class="invoice-footer">
        <input type="submit" value="Make PDF" class="submit-button btn_print">
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
            // html2pdf().set({
            //     filename: '' + '_Qalat-al-khaleej' + '.pdf'
            // }).from(element).save();


            // more custom settings
            var opt = {
                margin: 0,
                filename: 'quotation_{{ $quotation->kind_attn }}' + '.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };

            // New Promise-based usage:
            html2pdf().set(opt).from(element).save();


        });



    });
</script>


</html>
