<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TextIInvoiceData3</title>
</head>

<style>
    .invoicebody {
        font-family: Arial, sans-serif;
    }

    .invoice-box {
        /* max-width: 800px; */
        width: 21cm;
        /* height: 29.7cm; */
        margin: auto;
        padding: 20px;
        border: 1px solid #eee;
        /* background-color: #f3f1f1; */
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
        font-size: 14px;
        line-height: 24px;
        color: #555;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        line-height: 14px;
    }

    .table th,
    .table td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
    }

    .header-section div {
        display: inline-block;
    }

    .heading {
        font-weight: 700;
    }

    .heading {
        font-weight: 700;
        text-decoration: underline;
    }

    .content {
        margin-top: 20px;
    }

    .heading {
        font-weight: 700;
        text-decoration: underline;
    }

    .details {

        font-weight: 700;
    }

    .ownerName {
        margin-top: 130px;
        font-weight: 700;
    }

    .invoice-footer {
        display: flex;
        justify-content: center;
        margin: 20px 20px;
    }

    .submit-button {
        text-decoration: none;
        text-transform: uppercase;
        width: 20%;
        padding: 10px;
        background: #213167;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        text-align: center;
    }

    .submit-button:hover {
        background: #21a1eb;
    }

    .header-image {
        width: 100%;
    }

    .page-break {
        page-break-after: always;
    }
    .back-button{
        width: 20px ;
        background-color: rgb(176, 176, 176) ;
        padding: 5px ;
        border-radius: 50%
    }
    .back-button:hover{
        background-color: rgb(194, 162, 162) ;
    }
</style>

<body>
    <a title="back-button" href="/quotation-list">
        <img class="back-button" src="{{ asset('image/left-arrow.png') }}" alt="">
    </a>
    <div id="container_content">
        <div class="invoicebody">
            <div class="invoice-box">
                <img class="header-image" src="{{ asset('image/Header.png') }}" alt="">
                <div class="header-section">

                    <div>
                        <p class="heading">M/S: {{ $quotation->ms }}
                            <br>
                            P.O Box: {{ $quotation->po_box }}
                            <br>
                            Tel:
                            {{ $quotation->phone_no }}
                            <br>
                            Email: {{ $quotation->email }}
                        </p>
                        <p class="heading">Kind Attn: {{ $quotation->kind_attn }}
                            <br>
                            Project Name:
                            {{ $quotation->project_name }}
                        </p>
                    </div>
                    <div>
                        <h7 class="heading">Ref.No: {{ $quotation->ref_no }}
                            <br>
                            Date: {{ $quotation->date }}
                        </h7>
                    </div>
                </div>
                <p>Dear Sir,</p>
                <p>With reference to your inquiry, we are pleased to offer our quotation for the subject items. We
                    welcome
                    the opportunity to provide this business solution for you and look forward to establishing a
                    mutually
                    rewarding relationship with your esteemed organization.</p>
                <p class="heading">Scope of Works:</p>
                <table class="table">
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
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <p class="heading">{{ $project->heading }}</p>
                                <p id="output">
                                    {{-- {{$project->description}} --}}
                                    @php
                                        $string = $project->description;
                                        $string = str_replace('• ', "\n• ", $string);
                                        echo nl2br($string);
                                    @endphp
                                </p>
                            </td>
                            <td>{{ number_format($project->quantity, 2, '.', ',') }}</td>
                            <td>{{ number_format($project->unit, 2, '.', ',') }}</td>
                            <td>{{ number_format($project->unit_rate, 2, '.', ',') }}</td>
                            <td>{{ number_format($project->amount, 2, '.', ',') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" style="text-align: right;">Total Cost</td>
                        <td>{{ number_format($quotation->total_amount, 2, '.', ',') }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: right;">5% VAT</td>
                        <td>{{ number_format($quotation->vat_amount, 2, '.', ',') }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: right;">Total After Discount</td>
                        <td>{{ number_format($quotation->total_net_amount, 2, '.', ',') }}</td>
                    </tr>


                </table>
                <p>Total Amount in Words: AED – Forty Thousand Five Only.</p>
                <div class="page-break"></div>
                <div class="content">
                    <p class="heading">General Condition:</p>

                    <p>
                        @php
                            $string = $quotation->conditon;
                            $string = str_replace('• ', "\n• ", $string);
                            echo nl2br($string);
                        @endphp
                    </p>

                    <p class="heading">Payment Terms:</p>
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
                    <p class="heading">Project Duration:</p>
                    <p>To be discussed.</p>
                </div>
                <p class="heading">Quotation Validity:</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet assumenda recusandae consequuntur
                    officiis rem fugiat perspiciatis laudantium, inventore facere voluptas eaque officia ut doloremque,
                    laborum harum magni! Nulla, eligendi doloremque.?</p>

                <div class="details">
                    <p>Thanks & Best Regards<br /></p>
                    <p class="ownerName">Preethi S</p>
                    <p>Tel: +971 50273 6738 </p>
                </div>
            </div>
        </div>
    </div>
    <div class="invoice-footer">
        <a type="submit" href="/quotation-pdf/{{ $quotation->id }}" class="submit-button">Make PDF</a>
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
