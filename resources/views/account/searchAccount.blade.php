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
        .tableButton{
            border-radius: 5px;
            color: white ;
            padding: 0px 20px ;
            /* background: #213167 !important; */
            background: #213167 !important;
            justify-self: start;
            align-self: center;
            box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
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

    <script src="js/table2excel.js"></script>

    <div style="margin-top: 55px;" class="flex-grow-1 p-3">


        <div class="bg-light p-3 rounded mb-5">
            <!-- button and filter section  -->

            <div class="mb-5 d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <!-- button section  -->
                <div class="d-flex gap-2">
                    <!-- Export buttons -->
                    {{-- <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/document_16509258.png" alt="" /></span>
                        <span>CSV</span>
                    </button> --}}
                    <button class="button-width-1 d-flex align-items-center gap-1" id="downloadexcel">
                        <span><img class="button-img" src="image/document_16509258.png" alt="" /></span>
                        <span>Excel</span>
                    </button>
                    <button class="button-width-2 d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/printer_1041985.png" alt="" /></span>
                        <span>Print</span>
                    </button>
                    {{-- <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/file-storage_8316770.png" alt="" /></span>
                        <span>Visibility</span>
                    </button> --}}
                    {{-- <button type="submit" class="button-width d-flex align-items-center gap-1 btn_print">
                        <span><img class="button-img" src="image/pdf.png" alt="" /></span>
                        <span>PDF</span>
                    </button> --}}
                    <a  class="button-width-3 d-flex align-items-center gap-1" href="{{route('preview-search',['data'=>json_encode($accounts)])}}">
                        <span><img class="button-img" src="image/pdf.png" alt="" /></span>
                        <span>preview</span>
                    </a>
                </div>
            </div>
            <!-- button and filter section  -->

            <!-- input fields  -->

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
                                <td>{{ number_format($account->cash_out_debit,2,'.',',') }}</td>
                                <td>{{ number_format($account->cash_in_credit,2,'.',',') }}</td>
                                <td>{{ number_format($account->calc_amount,2,'.',',') }}</td>
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
