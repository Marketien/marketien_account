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
      background-color: #f3f1f1;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
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
      border: 1px solid black;
      padding: 4px;
      text-align: left;
    }
    /* Adjust date table header width */
    table.date-table th:first-child {
      width: 1000px;
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
      <table>
        <tr>
          <td colspan="2">
            <strong>Employee Name:</strong> {{$employee->employee_name}}<br />
            <strong>Designation:</strong> {{$employee->designation}}<br />
            <strong>ID#:</strong> <br />
            <strong>Department:</strong> {{$employee->department}}<br />
            <strong>Month:</strong> Mar-23<br />
          </td>
          <td colspan="2" class="imgsummary">
            <img
              class="img"
              src="image/Qalaat Al Khaleej-Logo-01.png"
              alt=""
              srcset=""
            />
          </td>
          <td colspan="2" class="summary">
            <strong>SUMMARY</strong><br />
            <strong>Salary & Benefits:</strong> AED {{$salary->salary}}<br />
            <strong>Deductions:</strong> AED {{$salary->deduction}}<br />
            <strong>Due:</strong> AED {{$salary->net_salary}}<br />s
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
              <td><strong>Basic Salary:</strong> AED {{$salary->basic}}</td>
              <td>
                <strong>OT - Sundays & Public Holidays (1.5x Basic/Hr):{{$salary->holyday_ot}}</strong>
              </td>
              <td>
                <strong>OT - Weekdays (1.25x Basic/Hr):{{$salary->weekday_ot}}</strong> AED 83.33
              </td>
              <td><strong>Incentive:</strong> NIL</td>
            </tr>
            <tr>
              <td><strong>Food Allowance:</strong> Company Provided</td>
              <td><strong>Travel Allowance:</strong></td>
              <td><strong>Other Dues:</strong>{{$salary->other_due}}</td>
              <td><strong>Total Bonus:</strong>{{$salary->project_bonus}}</td>
            </tr>
            <tr>
              <td colspan="4">
                <strong>Total Salary (Net Gross):</strong> AED {{$salary->salary}}
              </td>
            </tr>
          </table>
          <table>
            <tr>
              <th colspan="4">Deductions</th>
            </tr>
            <tr>
              <td>Absent Deduction:</td>
              <td colspan="3">AED 0.00</td>
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
            @foreach ($attendances as $attend )

            <tr>
                <td>{{$attend['date']}}</td>
                <td>{{$attend['weekday']}}</td>
                <td>{{$attend['project_location']}}</td>
                <td>{{$attend['attd']}}</td>
                <td>{{$attend['ph']}}</td>
                <td>{{$attend['ph']}}</td>
                <td>{{$attend['we']}}</td>
                <td>{{$attend['ot']}}</td>
                <td>{{$attend['inc']}}</td>
                <td>{{$attend['base']}}</td>
                <td>{{$attend['remarks']}}</td>
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
      <div class="invoice-footer">
        <input type="submit" value="Make PDF" class="submit-button">
    </div>
    </div>
  </body>
</html>
