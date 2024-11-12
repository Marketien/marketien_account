@extends('adminMaster')
@section('content')
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <style>
        .InputParentDiv {

            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 50px;
            align-items: center;
            margin: 80px 10px;
        }

        .account-table-section-1 {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .account-table-section-2 {
            margin-top: 20px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .to-date {
            margin-top: 20px !important;
        }

        .fiter-submit-div {
            margin-top: 20px !important;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Basic styling for form */
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
        }

        /* Grid layout for large devices */
        .form-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            align-items: center;
        }

        .button-width-1 {
            font-size: 13px;
            background: #103b18;
            text-transform: uppercase;
            color: white;
            /* box-shadow: 2px 2px rgba(2, 2, 2, 0.764); */
            /* border-radius: 5px; */
            /* border: none; */
            /* padding: 8px 8px; */
            border: 2px solid darkgreen;
            box-shadow: inset 4px 4px 8px #349646, inset -4px -4px 8px #3c8d4b;
            border-radius: 4px;
        }

        .button-width-2 {
            font-size: 13px;
            background: #704c0d;
            border: 2px solid darkgoldenrod;
            box-shadow: inset 4px 4px 8px #c7b72a, inset -4px -4px 8px #c7b72a;
            border-radius: 4px;
            color: white;
            /* box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
                            border-radius: 5px;
                            border: none; */
            /* padding: 8px 8px; */
            text-transform: uppercase;
        }


        .button-width-3 {
            font-size: 13px;
            text-decoration: none;
            background: #142357;
            color: white;
            /* box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
                            border-radius: 5px;
                            border: none; */
            border: 2px solid rgb(23, 10, 94);
            box-shadow: inset 4px 4px 8px #4f49a0, inset -4px -4px 8px #4f49a0;
            border-radius: 4px;
            /* padding: 8px 8px; */
            text-transform: uppercase;
        }

        .button-width-1:hover,
        .button-width-2:hover,
        .button-width-3:hover {
            box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
        }

        .add-button {
            border-radius: 5px;
            color: white;
            padding: 0px 20px;
            /* background: #213167 !important; */
            background: #213167 !important;
            justify-self: start;
            align-self: center;
            box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
        }

        .add-button:hover {
            /* background: #21a1eb !important; */
            background: #21a1eb !important;
        }

        .submit-button {
            border-radius: 5px;
            color: white;
            padding: 0px 20px;
            /* background: #213167 !important; */
            background: #213167 !important;
            justify-self: start;
            align-self: center;
            box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
        }

        .submit-button:hover {
            /* background: #21a1eb !important; */
            background: #21a1eb !important;
        }

        .tableButton {
            border-radius: 5px;
            color: white;
            padding: 0px 20px;
            /* background: #213167 !important; */
            background: #213167 !important;
            justify-self: start;
            align-self: center;
            box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
        }

        .tableButton:hover {
            /* background: #21a1eb !important; */
            background: #21a1eb !important;
        }

        /* Styling for form inputs and labels */
        .form-group {
            /* display: flex;
                                          flex-direction: column; */
            display: flex;
            align-items: center;
            width: 100%;
        }

        label {
            text-align: center;
            width: 25%;
            padding: 10px 0px;
            font-weight: 600;
            background-color: #f1f1f1 !important;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-left: 1px solid black;
        }

        label1 {
            text-align: center;
            width: 25%;
            padding: 9.5px 0px;
            font-weight: 600;
            background-color: #f1f1f1 !important;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-left: 1px solid black;
        }

        .formInput {
            flex-grow: 1;
            width: 75%;
            padding: 10px;
            font-size: 16px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-left: none;
        }

        .formInput1 {
            flex-grow: 1;
            width: 75%;
            padding: 10.5px;
            font-size: 16px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-left: none;
        }

        textarea.formInput {
            height: 100px;
        }

        .btn-div {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .search-button {
            justify-self: start;
            align-self: center;
        }

        .table-responsive {
            padding: 10px;
            margin-top: 50px;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /****************************** filter and input  section ***************************** */
        .InputParentDiv {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .submit-button {
            font-family: "Montserrat", sans-serif;
            background: linear-gradient(to top, #3bb890, #114070);
            color: white !important;
            border: none;
            padding: 8px;
            font-weight: 500;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            font-family: "Montserrat", sans-serif;
            transition: background 0.3s ease;
        }

        .submit-button:hover {
            background: linear-gradient(to bottom, #2a9070, #0d3050);
            opacity: 0.9;
            color: white !important;
        }

        /* Modal css section ------------------------------------------------------------------------>  */
        .modal-content {
            font-family: "Montserrat", sans-serif;
            /* background-color: #21a1eb; */
            background-color: #21a1eb;
            position: relative;
        }

        .modal-title {
            position: absolute;
            top: 0px;
            left: 180px;
            /* background-color: #213167; */
            background-color: #213167;
            color: white;
            text-transform: uppercase;
            font-weight: 600;
            padding: 10px 20px 10px 20px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .modal-title-1 {
            position: absolute;
            top: 0px;
            left: 90px;
            /* background-color: #213167; */
            background-color: #213167;
            color: white;
            text-transform: uppercase;
            font-weight: 600;
            padding: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .btn-close {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        /* Styling for form inputs and labels */
        .modal-form-group {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .modal-label {
            text-align: center;
            width: 25%;
            /* margin-top: 8px; */
            padding: 10px 0px;
            font-weight: 600;
            background-color: #f1f1f1 !important;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-left: 1px solid black;
        }

        .modal-form-input {
            flex-grow: 1;
            width: 75%;
            padding: 10px;
            font-size: 16px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-left: none;
        }

        .modal-footer {
            display: flex;
            justify-content: center;
        }

        .save-button {
            background-color: #213167 !important;
            text-transform: uppercase;
            font-weight: 600;
            padding-right: 0 20px 0 20px;
            border-radius: 10px;
        }

        .save-button:hover {
            color: rgb(176, 171, 171) !important;
        }

        /* --------------------------- Media Query  section ---------------------- */
        @media screen and (max-width: 576px) {
            .InputParentDiv {
                display: grid;
                grid-template-columns: 1fr;
                gap: 20px;
                align-items: center;
                padding: 10px;
                margin: 95px 10px;
            }

            .d-flex.flex-column.flex-md-row {
                flex-direction: column;
            }

            .account-table-section-2 {
                display: grid;
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .form-group {
                grid-template-columns: 1fr;
            }

            label {
                font-size: 12px;
                padding: 13px 0px 13px 0px;
            }

            label1 {
                font-size: 12px;
                padding: 3px 0px 4px 0px;
                text-align: center;
                font-weight: 600;
                background-color: #f1f1f1 !important;
                border-top: 1px solid black;
                border-bottom: 1px solid black;
                border-left: 1px solid black;
            }

            .modal-title {
                left: 120px;
            }

            .modal-title-1 {
                left: 80px;
            }

            .modal-label {
                font-size: 12px !important;
                padding: 13px 0px !important;
            }

            .table-responsive {
                margin: 10px;
            }
        }

        @media screen and (max-width: 992px) {
            .InputParentDiv {
                display: grid;
                grid-template-columns: 1fr;
                gap: 20px;
                align-items: center;
                padding: 10px;
                margin: 95px 10px;
            }

            .account-table-section-1 {
                display: grid;
                grid-template-columns: repeat(1, 1fr);
                gap: 20px;
            }

            .account-table-section-2 {
                display: grid;
                grid-template-columns: repeat(1, 1fr);
                gap: 20px;
            }

            label1 {
                font-size: 12px;
                padding: 13px 0px 12px 0px;
                text-align: center;
                font-weight: 600;
                background-color: #f1f1f1 !important;
                border-top: 1px solid black;
                border-bottom: 1px solid black;
                border-left: 1px solid black;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .selector-width {
                margin-bottom: 10px;
            }

            .button-width {
                width: 100%;
            }

            .form-row {
                display: grid;
                grid-template-columns: repeat(1, 1fr);
                gap: 20px;
                align-items: center;
            }

            .form-group {
                flex-direction: row;
            }

            .modal-title {
                left: 180px;
            }

            .modal-title-1 {
                left: 80px;
            }

            .table-responsive {
                padding: 10px;
            }
        }
    </style>
    <script src="js/table2excel.js"></script>

    <!-- ((((((((((((((((((((((((((((((((( InputParentDiv ))))))))))))))))))))))))))))))))) -->
    <div class="flex-grow-1 p-3">
        <div class="InputParentDiv">
            <!-- account-table-section-1 -->
            <form action="/search-account" method="POST" class="account-table-section-1">
                @csrf
                <!-- from-to-div  -->
                <div id="dateField" class="from-to-div">
                    <!-- from div  -->
                    <div>
                        <h1 class="filterText">
                            <span>From:</span>
                        </h1>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="formInput" id="date" name="dateFrom" />
                        </div>
                    </div>
                    <!-- To div  -->
                    <div class="to-date">
                        <h1 class="filterText">
                            <span>To:</span>
                        </h1>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" class="formInput" id="date" name="dateTo" />
                        </div>
                    </div>
                </div>
                <!-- <<<<<<<<<< month dropdown input field >>>>>>>>>> -->
                <div id="monthField" style="display: none; margin-top: 20px;">
                    <div class="form-group">

                        <label for="date">
                            Month</label>

                        <select class=" formInput" aria-label="Default select example" id="monthSelect" name="month">
                            <option value="" selected disabled>Select a month</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>
                <!-- fiter-submit-div  -->
                <div class="fiter-submit-div">
                    <div class="form-group">
                        <label for="date">Filters:</label>
                        <select id="filterSelect" class="formInput1" aria-label="Default select example">
                            <option value="1" selected>Date</option>
                            <option value="2">Month</option>
                        </select>
                    </div>
                    <!-- submit button -->
                    <div class="ms-3">
                        <button type="submit" class="submit-button">Submit</button>
                    </div>
                </div>

            </form>
            <!-- account-table-section-2  -->
            <div class="account-table-section-2">
                <!-- button section  -->
                <div class="d-flex gap-2">
                    <!-- Export buttons -->
                    <button class="button-width-1 d-flex align-items-center gap-1" id="downloadexcel">
                        <span><img class="button-img" src="image/pdf.png" alt="" /></span>
                        <span>Excel</span>
                    </button>
                    <button class="button-width-2 d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/file-storage_8316770.png" alt="" /></span>
                        <span>Visibility</span>
                    </button>
                    <a href="/preview-account" class="button-width-3 d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/document_16509258.png" alt="" /></span>
                        <span>Preview</span>
                    </a>
                </div>
                <!-- selector section  -->
                <div class="form-group">
                    <label1 for="date">Entries:</label1>
                    <select class="formInput" aria-label="Default select example">
                        <option selected>10</option>
                        <option value="1">20</option>
                        <option value="2">30</option>
                        <option value="3">40</option>
                    </select>
                </div>
            </div>
        </div>

        <hr />
        <!-- ((((((((((((((((((((((((((((((((( InputParentDiv ))))))))))))))))))))))))))))))))) -->

        <div>
            <!-- input fields  -->
            <form action="/account-store" method="POST" class="container mt-5  mb-5">
                @csrf
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('fail'))
                    <div class="alert alert-danger">
                        {{ session('fail') }}
                    </div>
                @endif
                <div class="form-row">
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="formInput" id="description" placeholder="Enter description"
                            name="description" />
                    </div>
                    <div class="form-group">
                        <label for="cashOutDebit">Cash Out Db:</label>
                        <input type="text" class="formInput" id="cashOutDebit" placeholder="Enter amount"
                            name="cash_out" />
                    </div>
                    <div class="form-group">
                        <label for="cashInCredit">Cash In Cr:</label>
                        <input type="text" class="formInput" id="cashInCredit" placeholder="Enter amount"
                            name="cash_in" />
                    </div>
                </div>
                <div class="btn-div">
                    <button class="add-button" type="submit">ADD</button>
                </div>
            </form>
            <hr />

            <!-- Table section   -->
            <div class="table-responsive">
                <table id="myTable">
                    <thead>
                        <tr>
                            <td>Date</td>
                            <td>Description</td>
                            <td>CashOut Debit</td>
                            <td>CashIn Credit</td>
                            <td>Balance Amount</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- table row 1  -->
                        @foreach ($accounts as $account)
                            <tr>
                                <!-- Dropdown button   -->

                                <td>{{ $account->date }}</td>
                                <td>{{ $account->description }}</td>
                                <td>{{ number_format($account->cash_out_debit, 2, '.', ',') }}</td>
                                <td>{{ number_format($account->cash_in_credit, 2, '.', ',') }}</td>
                                <td>{{ number_format($account->calc_amount, 2, '.', ',') }}</td>
                                <td>
                                    {{-- <div class="dropdown">
                                        <button class="tableButton dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    Edit
                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop">
                                                    Delete
                                                </button>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    <div class="dropdown">
                                        <button class="tableButton dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item editBtn" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $account->id }}"
                                                    data-id="{{ $account->id }}">Edit</a></li>
                                            {{-- <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$account->id}}">Edit</button></li> --}}
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop{{ $account->id }}">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                                @include('account.modalAccount')
                                @include('account.modalDelete')
                                </td>
                            </tr>
                            <!-- table row 1  -->
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('downloadexcel').addEventListener('click', function() {
            var table2excel = new Table2Excel();
            table2excel.export(document.querySelectorAll("#myTable"));
        });
    </script>
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
                    filename: 'account_table' + '.pdf',
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


    <script>
        // dynamic input fields ------------------------------
        document.addEventListener("DOMContentLoaded", function() {
            const filterSelect = document.getElementById("filterSelect");
            const dateField = document.getElementById("dateField");
            const monthField = document.getElementById("monthField");

            filterSelect.addEventListener("change", function() {
                // Hide all fields initially
                dateField.style.display = "none";
                monthField.style.display = "none";

                // Show the selected field
                const selectedValue = filterSelect.value;

                switch (selectedValue) {
                    case "1":
                        dateField.style.display = "block";
                        break;
                    case "2":
                        monthField.style.display = "block";
                        break;
                }
            });
        });
    </script>
@endsection
