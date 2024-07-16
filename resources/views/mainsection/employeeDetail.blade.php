@extends('adminMaster')
@section('content')
@vite(['resources/js/app.js','resources/css/app.css'])
    <style>
        textarea {
            width: 100%;
            height: 150px;
        }

        .attn-table {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        /* ------------------------------- */
        .tableDiv {
            margin: auto;
            padding: 20px;
            font-size: 14px;
            line-height: 24px;
            color: #555;
            margin-left: 10px;
            margin-left: 10px;
        }

        .invoiceTable {
            margin-top: 30px;
            width: 100%;
            overflow-x: auto !important;
            border: 1px solid black;
            text-align: center;
        }

        .invoiceTable th {
            border: 1px solid black;
            padding: 1%;
        }

        .invoiceTable tr td {
            border: 1px solid black;
        }

        .invoiceTable .thead {
            background: linear-gradient(to left, #37d8a5, #114070);
            color: white;
        }

        /* salary and benefits */
        /* ------------------------------- */
       /* Common styles for tables */
       .sos{
        margin-top: 90px;
       }
    .invoiceTable1,
    .invoiceTable2 {
      width: 100%;
      border: 1px solid black;
      text-align: left;
      margin-bottom: 20px; /* Add margin between tables */
      box-sizing: border-box; /* Ensure padding and border are included in width */
    }

    .invoiceTable1 th,
    .invoiceTable1 td,
    .invoiceTable2 th,
    .invoiceTable2 td {
      border: 1px solid black;
      padding: 10px; /* Adjust padding for better spacing */
    }

    .thead1,
    .thead2 {
      background: linear-gradient(to left, #37d8a5, #114070);
      color: white;
      font-weight: bold;
    }

    .textInput {
      width: calc(100% - 20px);
      margin: 0;
      box-sizing: border-box;
    }

    /* Media query for medium devices */
    @media (max-width: 768px) {
      .sos {
        flex-direction: column;
      }
      .textInput {
        width: calc(100% - 10px); /* Further adjust input width for smaller screens */
      }
    }

    /* Media query for large devices */
    @media (min-width: 769px) {
      .sos {
        display: flex;
        justify-content: space-between;
      }
      .tableDiv1,
      .tableDiv2 {
        flex: 0 0 48%; /* Adjust the width as needed */
      }
    }
    .submitdiv{
      display: flex ;
      justify-content: center;
    }
    .submitbutton{
      background: linear-gradient(to top, #37d8a5, #114070);
      color: white;
      font-weight: 500;
      padding: 10px;
      border: 1px solid black ;
      border-radius: 2px;
    }
    .submitbutton:hover{
      background: linear-gradient(to bottom, #37d8a5, #114070);
      color: white;
      font-weight: 500;
      padding: 10px;
      border: 1px solid black ;
      border-radius: 2px;
    }
    </style>

<div class="attn-table">
    <div class="sos">
            <!-- Salary & Benefits  -->
            <div class="tableDiv1" id="apps"></div>
            <!-- Summary  -->
      <div class="tableDiv2">
        <table class="invoiceTable2">
          <thead class="thead2">
            <tr>
              <th colspan="8" class="">Summary</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td colspan="3">Salary & Benefits:</td>
              <td colspan="2">AED</td>
              <td colspan="3">{{optional($salary)->salary}}</td>
            </tr>
            <tr>
              <td colspan="3">Deduction:</td>
              <td colspan="2">AED</td>
              <td colspan="3">{{optional($salary)->deduction}}</td>
            </tr>
            <tr>
              <td colspan="3">Due:</td>
              <td colspan="2">AED</td>
              <td colspan="3">{{optional($salary)->net_salary}}</td>
            </tr>
            <tr>
              <td colspan="3">Paid:</td>
              <td colspan="2">AED</td>
              <td colspan="3"></td>
            </tr>
            <tr>
              <td colspan="8">Leave Balance:</td>
            </tr>

          </tbody>
        </table>
      </div>
        </div>

        <div class="tableDiv">
            <table class="invoiceTable">
                <thead class="thead">
                    <tr>
                        <th>Date</th>
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
                </thead>
                <tbody>
                    @foreach ($attends as $attend)
                        <tr>
                            <th>{{ $attend->date }}</th>
                            <td>{{ $attend->location_id }}</td>
                            <td>{{ $attend->attd }}</td>
                            <td>{{ $attend->std_hour }}</td>
                            <td>{{ $attend->ph }}</td>
                            <td>{{ $attend->we }}</td>
                            <td>{{ $attend->ot }}</td>
                            <td>{{ $attend->inc }}</td>
                            <td>{{ $attend->base }}</td>
                            <td>{{ $attend->remarks }}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <div class="submitdiv">
            <a href="/payslip/{{optional($salary)->employee_id}}" class="submitbutton">Make PlaySlip</a>
          </div>
    </div>
@endsection
