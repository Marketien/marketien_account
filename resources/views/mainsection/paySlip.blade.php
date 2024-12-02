<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TextIInvoiceData6</title>
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
        /* background-color: #f3f1f1; */
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
        font-size: 12px;
        line-height: 18px;
        color: #555;
    }

    .img {
        width: 100px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table th,
    table td {
        border: 0.5px solid black;
        padding: 0px 2px;
        text-align: left;
        height: 1px;
        font-size: 10px;
    }

    /* Adjust date table header width */
    table.date-table th:first-child {
        width: 300px;
    }

    /* Media query for medium devices */
    @media only screen and (max-width: 768px) {
        table.date-table th:first-child {
            width: 0;
            display: none;
        }
    }

    /* Media query for small devices */
    @media only screen and (max-width: 576px) {
        table.date-table th:first-child {
            width: 0;
            display: none;
        }
    }

    .tableFlex {
        display: flex;
        justify-content: space-between;
        gap: 5px;
    }

    .heading {
        font-weight: 700;
        text-decoration: underline;
    }

    .summary {
        text-align: right;
    }

    .imgsummary {
        text-align: center;
    }

    .invoice-footer {
        display: flex;
        justify-content: center;
    }

    .submit-button {
        display: block;
        width: 20%;
        padding: 10px;
        /* background: #213167; */
        background: #213167;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .submit-button:hover {
        /* background: #21a1eb; */
        background: #21a1eb;
    }

    .header-image {
        height: 130px;
        width: 100%;
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

    <a title="back-button" href="/employee-detail/{{$employee->id}}">
        <img class="back-button" src="{{asset('image/left-arrow.png')}}" alt="">
    </a>

    <div class="invoice-box" id="container_content">
        <img class="header-image" src="{{ asset('image/Header.png') }}" alt="">
        {{-- <img class="header-image" src="{{ asset('image/marketien/Main Logo-01.png') }}" alt=""> --}}
        <table>
            <tr>
                <td colspan="2">
                    <strong>Employee Name:</strong> {{ $employee->employee_name }}<br />
                    <strong>Designation:</strong> {{ $employee->designation }}<br />
                    <strong>ID#:</strong> <br />
                    <strong>Department:</strong> {{ $employee->department }}<br />
                    <strong>Month:</strong>{{$month}}-{{$year}}<br />
                </td>
                <td colspan="2" class="imgsummary">
                    <img class="img" src="image/Qalaat Al Khaleej-Logo-01.png" alt="" srcset="" />
                </td>
                <td colspan="2" class="summary">
                    <strong>SUMMARY</strong><br />
                    <strong>Salary & Benefits:</strong> AED {{ $salary->salary }}<br />
                    <strong style="color: red;">Deductions:</strong> AED {{ $salary->deduction }}<br />
                    <strong>Due:</strong> AED {{ $salary->net_salary }}<br />s
                    <strong>Paid:</strong> AED <br />
                    <strong>Leave Balance:</strong> <br />
                </td>
            </tr>
        </table>
        <div class="tableFlex">
            <!-- Salary & Benefits  table  -->
            <div>
                <table>
                    <tr>
                        <th colspan="4">Salary & Benefits</th>
                    </tr>
                    <tr>
                        <td><strong>Basic Salary:</strong> AED {{ $salary->basic }}</td>
                        <td>
                            <strong>OT - Sundays & Public Holidays (1.5x Basic/Hr):{{ $salary->holyday_ot }}</strong>
                        </td>
                        <td>
                            <strong>OT - Weekdays (1.25x Basic/Hr):</strong> AED {{ $salary->weekday_ot }}
                        </td>
                        <td><strong>Other Allow.:{{$salary->other}}</strong> AED</td>
                    </tr>
                    <tr>
                        <td><strong>Food Allowance:</strong> Company Provided</td>
                        <td><strong>Travel Allowance:</strong></td>
                        <td><strong>Other Dues:</strong>{{ $salary->other_due }}</td>
                        <td><strong>Total Bonus:</strong>{{ $salary->project_bonus }}</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <strong>Total Salary (Net Gross):</strong> AED {{ $salary->salary }}
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th colspan="4">Deductions</th>
                    </tr>
                    <tr>
                        <td>Deduction:</td>
                        <td colspan="3">AED {{$salary->deduction}}</td>
                    </tr>
                </table>
            </div>
            <!-- date table  -->
            <div>
                <table class="date-table">
                    <tr>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Project Location</th>
                        <th>ATTD</th>
                        <th>STD Hrs</th>
                        <th>PH</th>
                        <th>WE</th>
                        <th>OT</th>
                        <th>INC</th>
                        <th>BASE</th>
                        <th>Remarks</th>
                    </tr>
                    @foreach ($attendances as $attend)
                        <tr>
                            <td>{{ $attend['date'] }}</td>
                            <td>{{ $attend['weekday'] }}</td>
                            <td>{{ $attend['project_location'] }}</td>
                            <td>{{ $attend['attd'] }}</td>
                            <td>{{ $attend['std_hour'] }}</td>
                            <td>{{ $attend['ph'] }}</td>
                            <td>{{ $attend['we'] }}</td>
                            <td>{{ $attend['ot'] }}</td>
                            <td>{{ $attend['inc'] }}</td>
                            <td>{{ $attend['base'] }}</td>
                            <td>{{ $attend['remarks'] }}</td>
                        </tr>
                    @endforeach

                    <!-- Add the remaining rows as necessary -->
                </table>
            </div>
        </div>
        <table>
            <tr>
                <td>Signatures:</td>
                <td>Payroll Accountant</td>
                <td>HR ADMIN</td>
                <td>Employee</td>
            </tr>
            <tr>
                <td></td>
                <td>Sanil Sivas</td>
                <td>Ahsan Ullah Sagar</td>
                <td></td>
            </tr>
        </table>
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
            //     filename: '{{ $employee->employee_name }}' + '_Qalat-al-khaleej' + '.pdf'
            // }).from(element).save();


            // more custom settings
            var opt = {
                margin: 0,
                filename: 'pageContent_{{ $employee->employee_name }}' + '.pdf',
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

            // New Promise - based usage:
                html2pdf().set(opt).from(element).save();


        });



    });
</script>

</html>
