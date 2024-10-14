@extends('adminMaster')
@section('content')
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <style>
        /* Basic styling for form */
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        /* Grid layout for large devices */
        .form-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            align-items: center;
        }

        /* Media queries for responsive design */
        /* For medium devices */
        @media screen and (max-width: 992px) {
            .selector-width {
                margin-bottom: 10px;
                /* Adjust spacing */
            }

            .button-width {
                width: 100%;
                /* Make buttons full width */
            }
        }

        /* For small devices */
        @media screen and (max-width: 576px) {
            .d-flex.flex-column.flex-md-row {
                flex-direction: column;
                /* Stack elements vertically */
            }
        }

        @media screen and (min-width: 992px) {
            .form-row {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                /* Divide into four equal columns */
                gap: 20px;
                align-items: center;
            }

            .form-group {
                flex-direction: row;
                /* Ensure items are in a row */
            }
        }

        /* For medium devices */
        @media screen and (max-width: 992px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        /* For small devices */
        @media screen and (max-width: 576px) {
            .form-group {
                /* width: 100%; */
                grid-template-columns: 1fr;
            }
        }

        /* Styling for form inputs and labels */
        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
        }

        .formInput {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea.formInput {
            height: 100px;
            /* Adjust height as needed */
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
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            /* Enables smooth scrolling on iOS */
        }

        /****************************** filter and input  section ***************************** */
        .filterInputParentDiv {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .filterDiv {
            width: 100%;
        }

        .inputDiv {
            width: 100%;
        }

        .similarInputStyle {
            width: 50%;
            padding: 1%;
            border-radius: 5px;
            border: 1px solid rgba(128, 128, 128, 0.493);
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

        .similarInputStyle {
            margin-bottom: 4px;
        }
    </style>

    <script src="js/table2excel.js"></script>

    <div style="margin-top: 55px;" class="flex-grow-1 p-3">

        <!-- ((((((((((((((((((((((((((((((((( filterInputParentDiv ))))))))))))))))))))))))))))))))) -->
        <form action="/search-account" method="POST" class="filterInputParentDiv bg-light p-3 rounded mb-5 mt-3">
            @csrf
            <!-- filter dropdown section -->
            <div class="filterDiv">
                <h1 class="filterText mb-3">
                    <span>
                        <img class="filterImg" src="./assets/filter_icon.png" alt="" />
                    </span>
                    <span>Filters</span>
                </h1>
                <div class="w-50">
                    <select id="filterSelect" class="form-select" aria-label="Default select example">
                        <option value="1" selected>Date</option>
                        <option value="2">Month</option>
                    </select>
                </div>
            </div>

            <!-- dynamic input fields -->


            <div class="inputDiv">

                <!-- <<<<<<<<<< date input field >>>>>>>>>> -->
                <div id="dateField">
                    <h1 class="filterText">
                        <span>From:</span>
                    </h1>
                    <div>
                        <input class="similarInputStyle" type="date" name="dateFrom" id="dateInput">
                    </div>
                    <h1 class="filterText">
                        <span>To:</span>
                    </h1>
                    <div>
                        <input class="similarInputStyle" type="date" name="dateTo" id="dateInput">
                    </div>
                </div>

                <!-- <<<<<<<<<< month dropdown input field >>>>>>>>>> -->
                <div id="monthField" style="display: none;">
                    <h1 class="filterText">
                        <span>Month</span>
                    </h1>
                    <div class="w-50">
                        <select class="form-select" aria-label="Default select example" id="monthSelect" name="month">
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
            </div>
            <!-- submit button -->
            <div class="ms-3">
                <button type="submit" class="submit-button">Submit</button>
            </div>

        </form>
        <!-- ((((((((((((((((((((((((((((((((( filterInputParentDiv ))))))))))))))))))))))))))))))))) -->

        <div class="bg-light p-3 rounded mb-5">
            <!-- button and filter section  -->

            <div class="mb-5 d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <!-- selector section  -->
                <div class="selector-width mb-3 mb-md-0">
                    <span>Show </span>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>10</option>
                        <option value="1">20</option>
                        <option value="2">30</option>
                        <option value="3">40</option>
                    </select>
                    <span> Entries </span>
                </div>
                <!-- button section  -->
                <div class="d-flex gap-2">
                    <!-- Export buttons -->
                    <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/document_16509258.png" alt="" /></span>
                        <span>CSV</span>
                    </button>
                    <button class="button-width d-flex align-items-center gap-1" id="downloadexcel">
                        <span><img class="button-img" src="image/document_16509258.png" alt="" /></span>
                        <span>Excel</span>
                    </button>
                    <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/printer_1041985.png" alt="" /></span>
                        <span>Print</span>
                    </button>
                    <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/file-storage_8316770.png" alt="" /></span>
                        <span>Visibility</span>
                    </button>
                    <a href="/preview-account" class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/pdf.png" alt="" /></span>
                        <span>Preview</span>
                    </a>
                </div>
            </div>
            <!-- button and filter section  -->

            <!-- input fields  -->
            <form action="/account-store" method="POST">
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

                <div class="container mb-5 ">
                    <div class="form-row">
                        {{-- <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="formInput" id="date" required>
                    </div> --}}
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" class="formInput" name="description" id="description"
                                placeholder="Enter description" required />
                        </div>
                        <div class="form-group">
                            <label for="cashOutDebit">CashOut Debit:</label>
                            <input type="text" class="formInput" name="cash_out" id="cashOutDebit"
                                placeholder="Enter amount">
                        </div>
                        <div class="form-group">
                            <label for="cashInCredit">CashIn Credit:</label>
                            <input type="text" class="formInput" name="cash_in" id="cashInCredit"
                                placeholder="Enter amount">
                        </div>
                        <div class="form-group">
                            <div class=" btn-div">
                                <button class="btn search-button" type="submit">ADD</button>
                            </div>

                        </div>

                    </div>
                </div>
            </form>
            <!-- Table section   -->
            <div id="container_content">
                <table class="overflow-auto" id="myTable">
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
                            </tr>
                        @endforeach
                        <!-- table row 2  -->

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- modal body --}}
    <!--Edit Modal -->

    <!--Delete Modal -->


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
        document.addEventListener('DOMContentLoaded', function() {
            const filterSelect = document.getElementById('filterSelect');
            const dateField = document.getElementById('dateField');
            const monthField = document.getElementById('monthField');

            filterSelect.addEventListener('change', function() {
                // Hide all fields initially
                dateField.style.display = 'none';
                monthField.style.display = 'none';

                // Show the selected field
                const selectedValue = filterSelect.value;

                switch (selectedValue) {
                    case '1':
                        dateField.style.display = 'block';
                        break;
                    case '2':
                        monthField.style.display = 'block';
                        break;
                }
            });
        });
    </script>
@endsection
