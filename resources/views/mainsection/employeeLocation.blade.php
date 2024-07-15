@extends('adminMaster')
@section('content')
    <style>
        .emp-body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        /* ------------------------------- */
        .InvoiceTableContainer {
            margin-top: 90px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            overflow-x: auto !important;
        }

        .InvoiceTable-container {
            overflow-x: auto !important;
            flex: 1;
            margin: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .InvoiceTable-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .InvoiceTable-container th,
        td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid black;
        }

        .InvoiceTable-container th {
            background: linear-gradient(to left, #37d8a5, #114070);
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .table-container {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
    <div class="emp-body">
    <div class="InvoiceTableContainer">
        <div class="InvoiceTable-container">
            <table>
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01-Mar-23</td>
                        <td>WED</td>
                        <td>WED</td>
                        <td>Otto</td>
                    </tr>
                    <tr>
                        <td>01-Mar-23</td>
                        <td>WED</td>
                        <td>WED</td>
                        <td>Otto</td>
                    </tr>
                    <tr>
                        <td>01-Mar-23</td>
                        <td>WED</td>
                        <td>WED</td>
                        <td>Otto</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="InvoiceTable-container">
            <table>
                <thead>
                    <tr>
                        <th>Location Name</th>
                        <th>Location Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01-Mar-23</td>
                        <td>WED</td>
                        <td>Otto</td>
                    </tr>
                    <tr>
                        <td>01-Mar-23</td>
                        <td>WED</td>
                        <td>Otto</td>
                    </tr>
                    <tr>
                        <td>01-Mar-23</td>
                        <td>WED</td>
                        <td>Otto</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
   </div>
@endsection
