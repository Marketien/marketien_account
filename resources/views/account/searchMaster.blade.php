@extends('adminMaster')
@section('content')
<style>
     .button-width-1 {
            /* background: #1b6328;
            text-transform: uppercase;
            color: white;
            box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
            border-radius: 5px;
            border: none;
            padding: 0px 10px ; */
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
            /* background: #a46800;
            text-transform: uppercase;
            color: white;
            box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
            border-radius: 5px;
            border: none; padding: 0px 10px ; */
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
            /* text-decoration: none ;
            background: #213167;
            text-transform: uppercase;
            color: white;
            box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
            border-radius: 5px;
            border: none;
            padding: 0px 10px ; */
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
        .billing-section-flex-div {
            display: flex;
            justify-content: center;
            margin-top: 5rem;
        }

        .billing-section {
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            /* background-color: #213167 !important; */
            background-color: #213167 !important;
            width: 500px;
        }

        .billing-section-p {
            background-color: white;
            display: flex;
            justify-content: space-between;
            padding-right: 10px;
        }

        .billing-section-span {
            padding-left: 10px;
            padding-right: 6px;
            background-color: rgb(203, 199 ,199) !important;
        }
</style>
    <div style="margin-top: 55px;" class="flex-grow-1 p-3">



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
                    {{-- <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/document_16509258.png" alt="" /></span>
                        <span>CSV</span>
                    </button> --}}
                    <!-- Export to Excel button -->
                    <button class="button-width-1 d-flex align-items-center gap-1" id="downloadexcel">
                        <span><img class="button-img" src="image/document_16509258.png" alt="" /></span>
                        <span> Excel</span>
                    </button>
                    <!-- Print button -->
                    <button class="button-width-2 d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/printer_1041985.png" alt="" /></span>
                        <span>Visibility</span>
                    </button>
                    <!-- Column visibility  -->
                    {{-- <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="image/file-storage_8316770.png" alt="" /></span>
                        <span>visibility</span>
                    </button> --}}
                    <!-- Export to PDF button  -->
                    <button type="submit" class="button-width-3 d-flex align-items-center gap-1 btn_print">
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
            <div style="background-color:green;">
                @if (Session::get('success'))
                    <div style="color:black; margin: 1rem; ">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::get('fail'))
                    <div style="color: rgb(238, 255, 0);">
                        {{ Session::get('fail') }}
                    </div>
                @endif
            </div>
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
                                        <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="/account-sms/{{$master->id}} ">SMS</a></li>
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
                                <td>{{ $master->amount }}</td>
                                <td>{{ $master->credit }}</td>
                                <td>{{ $master->due }}</td>
                                <td>{{ $master->remark }}</td>
                                @include('account.modalMasterDelete')
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div style="font-family: 'Montserrat', sans-serif; font-weight: bold;"
                    class="bg-light p-3 rounded mb-3 text-center lh-lg">
                    <p class="d-flex justify-content-between"><span>Total Bill Submitted :</span>
                        <span>{{ $amount }}</span> </p>
                    <p class="d-flex justify-content-between"><span>Total Amount Recieved :</span> <span
                            class="text-success">{{ $credit }}</span> </p>
                    <p class="d-flex justify-content-between"><span>Total OutStanding:</span> <span
                            class="text-danger">{{ $due }}</span>
                    </p>
                </div> --}}
                <div class="billing-section-flex-div">
                    <div class="billing-section p-3 rounded mb-3 text-center lh-lg">
                        <p class="billing-section-p"><span class="billing-section-span">Total Bill Submitted :</span>
                            <span>{{ number_format($amount, 3, '.', ',') }}</span>
                        </p>
                        <p class="billing-section-p"><span class="billing-section-span">Total Amount Recieved :</span> <span
                                class="text-success">{{ number_format($credit, 3, '.', ',') }}</span> </p>
                        <p class="billing-section-p"><span class="billing-section-span">Total OutStanding:</span> <span
                                class="text-danger">{{ number_format($due, 3, '.', ',') }}</span>
                        </p>
                    </div>
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
@endsection
