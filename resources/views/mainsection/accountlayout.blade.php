@extends('adminMaster')
@section('content')
    {{-- /****************************** filter and input  section ***************************** */ --}}
    <style>
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
    </style>
    <div style="margin-top: 55px;" class="flex-grow-1 p-3">


        <!-- ((((((((((((((((((((((((((((((((( filterInputParentDiv ))))))))))))))))))))))))))))))))) -->
        <div class="filterInputParentDiv bg-light p-3 rounded mb-5 mt-3">
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
                        <option value="3">Invoice</option>
                        <option value="4">Client Name</option>
                        <option value="5">LPO</option>
                    </select>
                </div>
            </div>

            <!-- dynamic input fields -->
            <div class="inputDiv">
                <form action="/search-master" method="POST">
                    @csrf
                    <!-- <<<<<<<<<< date input field >>>>>>>>>> -->
                    <div id="dateField">
                        <h1 class="filterText">
                            <span>Date</span>
                        </h1>
                        <div>
                            <input class="similarInputStyle" type="date" name="date" id="dateInput">
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

                    <!-- <<<<<<<<<< invoice input field >>>>>>>>>> -->
                    <div id="invoiceField" style="display: none;">
                        <h1 class="filterText">
                            <span>Invoice</span>
                        </h1>
                        <div>
                            <input class="similarInputStyle" type="text" name="invoice_no" id="invoiceInput">
                        </div>
                    </div>

                    <!-- <<<<<<<<<< client Name input field >>>>>>>>>> -->
                    <div id="clientNameField" style="display: none;">
                        <h1 class="filterText">
                            <span>Client Name</span>
                        </h1>
                        <div>
                            <input class="similarInputStyle" type="text" name="client_name" id="clientNameInput">
                        </div>
                    </div>

                    <!-- <<<<<<<<<< LPO input field >>>>>>>>>> -->
                    <div id="lpoField" style="display: none;">
                        <h1 class="filterText">
                            <span>LPO</span>
                        </h1>
                        <div>
                            <input class="similarInputStyle" type="text" name="lpo" id="lpoInput">
                        </div>
                    </div>
            </div>
            <!-- submit button -->
            <div class="ms-3">
                <button type="submit" class="submit-button">Submit</button>
            </div>
            </form>
        </div>
        <!-- ((((((((((((((((((((((((((((((((( filterInputParentDiv ))))))))))))))))))))))))))))))))) -->

        <div class="bg-light p-3 rounded mb-5">
            <!-- button and filter section  -->
            <div class="mb-5 d-flex justify-content-between align-items-center gap-2">
                <!-- selector section  -->
                <div class="selector-width d-flex align-items-center gap-2">
                    <span> Show </span>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>10</option>
                        <option value="1">20</option>
                        <option value="2">30</option>
                        <option value="3">40</option>
                    </select>
                    <span> Entries </span>
                </div>
                <!-- button section  -->
                <div class="d-flex align-items-center gap-2">
                    <!-- Export to CSV button -->
                    <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/document_16509258.png" alt="" /></span>
                        <span>CSV</span>
                    </button>
                    <!-- Export to Excel button -->
                    <button class="button-width d-flex align-items-center gap-1" id="downloadexcel">
                        <span><img class="button-img" src="image/document_16509258.png" alt="" /></span>
                        <span> Excel</span>
                    </button>
                    <!-- Print button -->
                    <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/printer_1041985.png" alt="" /></span>
                        <span>Print</span>
                    </button>
                    <!-- Column visibility  -->
                    <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/file-storage_8316770.png" alt="" /></span>
                        <span>visibility</span>
                    </button>
                    <!-- Export to PDF button  -->
                    <button type="submit" class="button-width d-flex align-items-center gap-1 btn_print">
                        <span><img class="button-img" src="image/pdf.png" alt="" /></span>
                        <span>PDF</span>
                    </button>
                </div>
                <!-- search button  -->
                <div>
                    {{-- <form class="d-flex ms-auto me-3">
                        <input class="form-control me-2 w-100" type="search" placeholder="Search" aria-label="Search" />
                    </form> --}}
                    {{-- <a href="/account-master-form" class="btn search-button">
                        Add
                    </a> --}}
                </div>
            </div>
            <!-- Table section   -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
            @endif
            <div id="container_content">
                <table class="overflow-auto" id="myTable">
                    <thead>
                        <tr>
                            <td>Actions</td>
                            <td>Invoice No.</td>
                            <td>Client Name</td>
                            <td>Project Description</td>
                            <td>Inv. Date</td>
                            <td>LPO</td>
                            <td>Amount(A&D)</td>
                            <td>Credit</td>
                            <td>Balance Amount <br>(A&C)</td>
                            <td>Remarks</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- table row 1  -->
                        @foreach ($masters as $master)
                            @php
                                $input = \App\Models\InputMaster::where('invoice_no', $master->invoice_no)->first();
                            @endphp

                            <tr>
                                <!-- Dropdown button   -->
                                <td>
                                    <div class="dropdown">
                                        <button class="tableButton dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="/account-sms/{{ $master->id }} ">SMS</a>
                                            </li>
                                            <li><a class="dropdown-item" href="/master-detail/{{ $input->id }}">Details
                                                </a></li>
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop{{ $master->id }}">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td>{{ $master->invoice_no }}</td>
                                <td>{{ $master->client_name }}</td>
                                <td>{{ $master->description }}</td>
                                <td>{{ $master->invoice_date }}</td>
                                <td>{{ $master->lpo }}</td>
                                <td>{{ number_format($master->amount, 2, '.', ',') }}</td>
                                <td>{{ number_format($master->credit, 2, '.', ',') }}</td>
                                <td>{{ number_format($master->due, 2, '.', ',') }}</td>
                                <td>{{ number_format($master->remark, 2, '.', ',') }}</td>
                                @include('account.modalMasterDelete')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="font-family: 'Montserrat', sans-serif; font-weight: bold;"
                    class="bg-light p-3 rounded mb-3 text-center lh-lg">
                    <p class="d-flex justify-content-between"><span>Total Bill Submitted :</span>
                        <span>{{ number_format($amount, 3, '.', ',') }}</span>
                    </p>
                    <p class="d-flex justify-content-between"><span>Total Amount Recieved :</span> <span
                            class="text-success">{{ number_format($credit, 3, '.', ',') }}</span> </p>
                    <p class="d-flex justify-content-between"><span>Total OutStanding:</span> <span
                            class="text-danger">{{ number_format($due, 3, '.', ',') }}</span>
                    </p>
                </div>
            </div>
        </div>

    </div>
    <script src="js/table2excel.js"></script>
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
                    filename: 'account_master' + '.pdf',
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

    {{-- // dynamic input fields ------------------------------ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterSelect = document.getElementById('filterSelect');
            const dateField = document.getElementById('dateField');
            const monthField = document.getElementById('monthField');
            const invoiceField = document.getElementById('invoiceField');
            const clientNameField = document.getElementById('clientNameField');
            const lpoField = document.getElementById('lpoField');

            filterSelect.addEventListener('change', function() {
                // Hide all fields initially
                dateField.style.display = 'none';
                monthField.style.display = 'none';
                invoiceField.style.display = 'none';
                clientNameField.style.display = 'none';
                lpoField.style.display = 'none';

                // Show the selected field
                const selectedValue = filterSelect.value;

                switch (selectedValue) {
                    case '1':
                        dateField.style.display = 'block';
                        break;
                    case '2':
                        monthField.style.display = 'block';
                        break;
                    case '3':
                        invoiceField.style.display = 'block';
                        break;
                    case '4':
                        clientNameField.style.display = 'block';
                        break;
                    case '5':
                        lpoField.style.display = 'block';
                        break;
                }
            });
        });
    </script>
@endsection
