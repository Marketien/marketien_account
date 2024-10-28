@extends('adminMaster')
@section('content')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .dashboardBody {
            width: 95%;
            margin: auto;

        }

        /* number status section  */
        .NSD {
            margin: auto;
        }

        .row {
            margin-top: 100px;
        }

        .box-div {
            background: #21a1eb;
            color: white;
            border-radius: 5px;
        }

        .box-title {
            margin: auto;
            padding: 8px;
            background: #213167;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .box-text {
            margin: auto;
            width: 16rem;
            padding-top: 20px;
            padding-bottom: 20px;
            padding-right: 10px;
            padding-left: 10px;
            display: flex;
            justify-content: space-between;
            font-size: xx-large;
        }

        .icon {
            width: 60px;
        }

        .card-link {
            margin: auto;
            padding: 8px;
            background: #213167;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        /* graph section  */
        .graphParentdiv {
            margin-top: 60px;
            margin-bottom: 40px;
        }

        /* total calculation section  */
        .TCD {
            margin: auto;
        }

        .box-div1 {
            background: #21a1eb;
            color: white;
            border-radius: 5px;
        }

        .box-title1 {
            margin: auto;
            padding: 8px;
            background: #213167;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .box-text1 {
            margin: auto;
            width: 23rem;
            padding-top: 20px;
            padding-bottom: 20px;
            padding-right: 5px;
            padding-left: 5px;
            display: flex;
            justify-content: space-between;
            font-size: xx-large;
        }

        .card-link1 {
            margin: auto;
            padding: 8px;
            background: #213167;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        /* Matured Bills section  */
        .MBD {
            margin: auto;
            overflow: auto;
        }

        .tableTittle {
            margin-top: 40px;
            margin-bottom: -35px;
        }

        .table {
            margin-top: 40px;
            margin-bottom: 40px;
            border: 1px solid black;
        }

        th {
            border: 1px solid black;
            color: white !important;
            background: #21a1eb !important;
            text-align: center;
        }

        td {
            border: 1px solid black;
            text-align: center;
        }
    </style>

    <div class="dashboardBody flex-grow-1 p-3" >
        <!--------------------<<<<<<<<< Number status section >>>>>>>>>> -------------------->
        <div class="NSD">
            <div class="row">
                <!-- card one  -->
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="box-div">
                        <h5 class="box-title">Income Today</h5>
                        <p class="box-text">
                            <span><img class="icon" src="image/income.png" alt="" srcset="" /></span>
                            <span>{{$incToday}}</span>
                        </p>
                        <p href="#" class="card-link">view more...</p>
                    </div>
                </div>
                <!-- card two  -->
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="box-div">
                        <h5 class="box-title">Expense Today</h5>
                        <p class="box-text">
                            <span><img class="icon" src="image/expenses.png" alt="" srcset="" /></span>
                            <span>{{$expToday}}</span>
                        </p>
                        <p href="#" class="card-link">view more...</p>
                    </div>
                </div>
                <!-- card three  -->
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="box-div">
                        <h5 class="box-title">Monthly Income</h5>
                        <p class="box-text">
                            <span><img class="icon" src="image/growth.png" alt="" srcset="" /></span>
                            <span>{{$incMonth}}</span>
                        </p>
                        <p href="#" class="card-link">view more...</p>
                    </div>
                </div>
                <!-- card four  -->
                <div class="col-md-6 col-lg-3 mb-3">
                    <div class="box-div">
                        <h5 class="box-title">Monthly Expense</h5>
                        <p class="box-text">
                            <span><img class="icon" src="image/expense-month.png" alt="" srcset="" /></span>
                            <span>{{$expMonth}}</span>
                        </p>
                        <p href="#" class="card-link">view more...</p>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------<<<<<<<<< Graph section >>>>>>>>>> -------------------->
        <div class="graphParentdiv">
            <canvas id="myChart"></canvas>
        </div>
        <!--------------------<<<<<<<<< Total Calculation section >>>>>>>>>> -------------------->
        <div class="TCD">
            <div class="row">
                <!-- card one  -->
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="box-div1">
                        <h5 class="box-title1">Total Order</h5>
                        <p class="box-text">
                            <span>{{$totalOrder}}</span>
                            <span><img class="icon" src="image/money-bag.png" alt="" srcset="" /></span>
                        </p>
                        <p href="#" class="card-link1">view more...</p>
                    </div>
                </div>
                <!-- card two  -->
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="box-div1">
                        <h5 class="box-title1">Total Credit</h5>
                        <p class="box-text">
                            <span>{{$totalRecieved}}</span>
                            <span><img class="icon" src="image/total-expenses.png" alt="" srcset="" /></span>
                        </p>
                        <p href="#" class="card-link1">view more...</p>
                    </div>
                </div>
                <!-- card three  -->
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="box-div1">
                        <h5 class="box-title1">Total Dues</h5>
                        <p class="box-text">
                            <span>{{$totalDue}}</span>
                            <span><img class="icon" src="image/dues.png" alt="" srcset="" /></span>
                        </p>
                        <p href="#" class="card-link1">view more...</p>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------<<<<<<<<< Matured Bills section >>>>>>>>>> -------------------->
        <div class="MBD">
            <table class="table">
                <h4 class="tableTittle">Matured Bills</h4>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Client Name</th>
                        <th scope="col">LPO</th>
                        <th scope="col">Invoice No</th>
                        <th scope="col">Invoice Date</th>
                        <th scope="col">Payment Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($maturity as $mature )


                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$mature->client_name}}</td>
                        <td>{{$mature->lpo}}</td>
                        <td>{{$mature->invoice_no}}</td>
                        <td>{{$mature->invoice_date}}</td>
                        <td style="color:red;">BillMatured:  <span style="color:black">{{$mature->due}}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- chart Js script tag  -->
    <script>
        const labels = Array.from({
                length: 31
            }, (_, i) =>
            String(i + 1).padStart(2, "0")
        );

        const data = {
            labels: labels,
            datasets: [{
                    label: "Income",
                    data: [{{$income}}],
                    backgroundColor: "#213167",
                    borderColor: "#213167",
                    borderWidth: 1,
                },
                {
                    label: "Expense",
                    data: [{{$expense}}],
                    backgroundColor: "#21a1eb",
                    borderColor: "#21a1eb",
                    borderWidth: 1,
                },
            ],
        };

        const config = {
            type: "bar",
            data: data,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: "Amount",
                        },
                    },
                    x: {
                        title: {
                            display: true,
                            text: "Day",
                        },
                    },
                },
                plugins: {
                    title: {
                        display: true,
                        text: "Income vs Expense",
                    },
                },
            },
        };

        const myChart = new Chart(document.getElementById("myChart"), config);
    </script>
@endsection
