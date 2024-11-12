<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TextIInvoiceData3</title>
</head>

<style>
    .invoice-box {
        font-family: Arial, sans-serif;

        /* max-width: 800px; */
        /* width: 21cm; */
        /* height: 29.7cm; */
        /* margin: auto; */
        /* padding: 20px; */
        /* border: 1px solid #eee; */
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
        /* display: inline-block; */
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
        /* margin-top: 130px; */
        font-weight: 700;
    }

    .invoice-footer {
        display: flex;
        justify-content: center;
        margin: 20px 20px;
    }

    .submit-button {

        width: 20%;
        padding: 10px;
        background: linear-gradient(to top, #3bb890, #114070);
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        text-align: center;
    }

    .submit-button:hover {
        background: linear-gradient(to bottom, #3bb890, #114070);
    }

    .header-image {
        width: 100%;
    }

    .page-break {
        page-break-after: always;
    }
</style>

<body>
    <div id="container_content">
        <img class="header-image" src="image/Header.png" alt="">
        {{-- <img class="header-image" src="image/marketien/Main Logo-01.png" alt=""> --}}

        <div class="invoice-box">
            <div class="header-section">

                <div>
                    <h7 class="heading">Ref.No: {{ $quotation->ref_no }}
                        <br>
                        Date: {{ $quotation->date }}
                    </h7>
                </div>
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
                        <td>{{ $loop->iteration }}</td>
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
            @if (count($projects) < 2)
                <div class="page-break"></div>
            @endif
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
            @if (count($projects) > 1 && count($projects) < 3)
                <div class="page-break"></div>
            @endif
            <p class="heading">Quotation Validity:</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet assumenda recusandae consequuntur
                officiis rem fugiat perspiciatis laudantium, inventore facere voluptas eaque officia ut doloremque,
                laborum harum magni! Nulla, eligendi doloremque.?</p>

            <div class="details">
                <p>Thanks & Best Regards<br /></p>
                <p class="ownerName">Zahid Faisal</p>
                <p class="ownerName">Qalat Al Khaleej</p>
                <p class="ownerName">info@qalatalkhaleej.com</p>
                <p>Tel: +971 50265 7281 </p>
            </div>
        </div>

    </div>
    <div class="invoice-footer">
        <a type="submit" href="/quotation-pdf/{{ $quotation->id }}" class="submit-button">Make PDF</a>
    </div>
</body>

</html>
