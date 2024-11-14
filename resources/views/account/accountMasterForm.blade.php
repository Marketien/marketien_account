@extends('adminMaster')
@section('content')
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-l0sNRNKZ.js')}}">
    <script type="module" src="{{ asset('build/assets/app-ZYuboFVO.js')}}"></script> --}}
    {{-- <style>
        .master-form-body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background: rgba(67, 68, 76, 0.404);
        }

        .invoice-container {
            margin-top: 80px;
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
            background-color: white;
            padding: 20px;
            max-width: 800px;
            width: 100%;
            box-sizing: border-box;
        }

        .invoice-header {
            margin-bottom: 50px;
        }

        .invoice-header h1 {
            font-weight: 600;
            font-size: 40px;
            text-transform: uppercase;
            /* color: #213167; */
            color: #213167;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-group>div {
            flex: 1;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .form-group>div:last-child {
            margin-right: 0;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form-group textarea {
            height: 100px;
        }


        @media (max-width: 768px) {
            .form-group {
                flex-direction: column;
            }

            .form-group>div {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }

        .addressScope {
            height: 150px;
        }

        .invoice-section2 input {
            width: calc(100% - 16px);
            /* Adjust input width to fit within grid */
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            /* background: #21a1eb !important; */
            background: #21a1eb !important;
            color: white;
        }

        .invoice-table td {
            margin-bottom: 20px;
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .dateinput {
            width: 100%;
            /* Ensure input fields take full width */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .submit-button {
            margin-top: -50px;
            display: block;
            width: 100%;
            padding: 10px;
            /* background: #213167 !important; */
            background: #213167 !important;
            font-weight: 600;
            text-transform: uppercase;
            box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-button:hover {
            box-shadow: 3px 3px rgba(2, 2, 2, 0.764);
        }

        .add-button {
            display: flex;
            justify-content: center;
            border-radius: 5px;
            color: white;
            padding: 0px 20px;
            background: #213167 !important;
            justify-self: start;
            align-self: center;
            box-shadow: 1px 1px rgba(2, 2, 2, 0.764);
            text-transform: uppercase;
        }

        .delete-button {
            display: flex;
            justify-content: center;
            border-radius: 5px;
            color: white;
            padding: 0px 20px;
            background: #ff0000 !important;
            justify-self: start;
            align-self: center;
            box-shadow: 1px 1px rgba(2, 2, 2, 0.764);
            text-transform: uppercase;
        }

        /* Adjusting form-group1 to justify-content-end */
        .form-group1 {
            display: flex;
            justify-content: flex-end;
            width: 60%;
        }

        .form-group1>div {
            flex: 1;
            margin-left: 10px;
            /* Adjust spacing between items if needed */
        }

        .form-group1 label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group1 input[type="text"] {
            width: 100%;
            /* Ensure input fields take full width */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            margin-left: -30px;
        }

        .form-group1Label {
            width: 60%;

        }

        .form-group2 {
            visibility: hidden;
            width: 30%;
        }

        .invoiceDiv {
            display: flex;
            align-items: center;
        }

        .passMngIcon {
            width: 50px;
            background-color: rgba(128, 128, 128, 0.339);
            padding-top: 7px;
            padding-bottom: 7px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .passMngIcon:hover {
            background-color: rgba(128, 128, 128, 0.441);
        }
    </style> --}}
    <style>
        .master-form-body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background: rgb(223, 220, 220);
        }

        .invoice-container {
            margin-top: 20px;
            margin-bottom: 20px;
            font-family: "Montserrat", sans-serif;
            background-color: white;
            padding: 20px;
            max-width: 800px;
            width: 100%;
            box-sizing: border-box;
        }

        .invoice-header-div {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            align-items: center;
            padding: 20px;
        }

        .invoice-header-heading {
            border-right: 2px solid #213167;
            color: #213167;
            font-size: 35px !important;
            font-weight: 700;
            text-transform: uppercase;
        }

        .head-label {
            background-color: #f1f1f1 !important;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: 1px solid rgb(142, 140, 140);
            border-left: 1px solid rgb(142, 140, 140);
            padding: 9px 6px 6px 6px;
            text-transform: uppercase;
            text-align: center;
            width: 25%;
            font-size: 10px;
            font-weight: 600;
        }

        .head-input {
            margin-left: -5px;
            width: 70%;
            padding: 3px;
            font-size: 16px;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: 1px solid rgb(142, 140, 140);
            border-right: 1px solid rgb(142, 140, 140);
            border-left: none;
        }

        .head-input-invoice {
            margin-left: -5px;
            width: 56%;
            padding: 3px;
            font-size: 16px;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: 1px solid rgb(142, 140, 140);
            border-right: 1px solid rgb(142, 140, 140);
            border-left: none;
        }

        .passMngIcon {
            margin-left: -5px;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: 1px solid rgb(142, 140, 140);
            border-right: 1px solid rgb(142, 140, 140);
            width: 53px;
            background-color: rgba(235, 235, 235);
            padding-top: 2px;
        }

        .passMngIcon:hover {
            background-color: rgba(190, 188, 188, 0.635);
        }

        label {
            background-color: #f1f1f1 !important;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: 1px solid rgb(142, 140, 140);
            border-left: 1px solid rgb(142, 140, 140);
            font-size: 12px;
            font-weight: 600;
            text-align: center;
            width: 20%;
            padding: 9px 6px 6px 6px;
        }

        .label-1 {
            background-color: #f1f1f1 !important;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: 1px solid rgb(142, 140, 140);
            border-left: 1px solid rgb(142, 140, 140);
            font-size: 12px;
            font-weight: 700;
            text-align: center;
            width: 20%;
            padding: 9px 6px 7px 6px;
        }

        .label-2 {
            background-color: #f1f1f1 !important;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: 1px solid rgb(142, 140, 140);
            border-left: 1px solid rgb(142, 140, 140);
            font-size: 12px;
            font-weight: 700;
            text-align: center;
            width: 28%;
            padding: 9px 6px 7px 6px;
        }

        .label-3 {
            background-color: #f1f1f1 !important;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: none;
            border-right: 1px solid rgb(142, 140, 140);
            border-left: 1px solid rgb(142, 140, 140);
            margin-left: -4px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            width: 100%;
            padding: 9px 6px 7px 6px;
        }

        .label-4 {
            background-color: #21a1eb !important;
            color: white !important;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: 1px solid rgb(142, 140, 140);
            border-left: 1px solid rgb(142, 140, 140);
            font-size: 12px;
            font-weight: 600;
            text-align: center;
            width: 39%;
            margin-bottom: 3px;
            text-transform: uppercase;
        }

        .formInput {
            flex-grow: 1;
            width: 70%;
            padding: 10px;
            font-size: 16px;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: 1px solid rgb(142, 140, 140);
            border-right: 1px solid rgb(142, 140, 140);
            border-left: none;
        }

        .formInput-1 {
            width: 75%;
            padding: 5px;
            font-size: 16px;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: 1px solid rgb(142, 140, 140);
            border-right: 1px solid rgb(142, 140, 140);
            margin-left: -4px;
            border-left: none;
        }

        .form-group .formInput-2[type="text"] {
            width: 71%;
            padding: 5px;
            font-size: 16px;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: 1px solid rgb(142, 140, 140);
            border-right: 1px solid rgb(142, 140, 140);
            margin-left: -4px;
            border-left: none;
        }

        .form-group .formInput-3[type="text"] {
            border-top: none;
            border-bottom: 1px solid rgb(142, 140, 140);
            border-right: 1px solid rgb(142, 140, 140);
            border-left: 1px solid rgb(142, 140, 140);
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            font-size: 14px;
            height: 150px;
            margin-left: -4px;

        }

        .formInput-4[type="text"] {
            width: 60%;
            padding: 5px 0px 4px 0px;
            font-size: 16px;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: 1px solid rgb(142, 140, 140);
            border-right: 1px solid rgb(142, 140, 140);
            border-left: none;
            margin-left: -4px;
        }

        .form-group-single {
            margin-left: -20px;
            background-color: #213167;
            width: 50%;
        }

        .form-group-single div {
            padding: 10px 5px 10px 20px;
        }

        .form-group {
            margin: 10px 0px 10px 0px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-group>div {
            flex: 1;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"] {
            width: 79%;
            padding: 7px 0px 5px 0px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
            border-top: 1px solid rgb(142, 140, 140);
            border-bottom: 1px solid rgb(142, 140, 140);
            border-right: 1px solid rgb(142, 140, 140);
            margin-left: -4px;
            border-left: none;
        }

        .invoice-section2 {
            margin-right: 10px;
        }

        .invoice-section2 input {
            width: 100%;
            padding: 8px;
            border: none;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th {
            text-transform: uppercase;
            font-weight: 400;
            padding: 8px;
            text-align: center;
            background: #21a1eb;
            color: white;
        }

        .invoice-table td {
            margin-bottom: 20px;
            border: 1px solid #d1cdcd;
            text-align: left;
        }

        .amount-section-div {
            display: flex;
            justify-content: space-between;
        }

        .submit-button {
            margin-top: -50px;
            display: block;
            width: 100%;
            padding: 10px;
            background: #213167;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .dateinput {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form-group-1 {
            visibility: hidden;
            width: 50%;
            margin-bottom: 80px;
        }

        .form-group-2 {
            visibility: visible;
            width: 50%;
            margin-bottom: 80px;
        }

        /* Media Query for Small device  */
        @media screen and (max-width: 576px) {
            .invoice-header-div {
                display: grid;
                grid-template-columns: 1fr;
                gap: 20px;
                align-items: center;
            }

            .invoice-header-heading {
                font-size: 30px !important;
                border-right: none;
            }

            .head-input-invoice {
                padding: 29px 0px 16px 0px;
                height: 40px;
                margin-top: 25px;
            }

            .passMngIcon {
                margin-top: -15px;
                padding: 10px 0px 10px 0px;
            }

            .form-group-single {
                margin-left: 0px;
                display: flex;
                justify-content: center;
                width: 100%;
            }

            .label-2 {
                font-size: 10px;
                padding: 11px 6px 8px 6px;
            }

            .invoice-section2,
            .invoice-table {
                overflow: auto !important;
            }

            .form-group-1 {
                visibility: hidden;
                width: 0%;
                margin-bottom: -60px;
            }

            .form-group-2 {
                visibility: visible;
                width: 100%;
                margin-top: 20px;
                margin-bottom: 20px;
            }

            .label-4 {
                width: 37%;
                font-size: 10px;
                margin-bottom: 3px;
            }

            .formInput-4[type="text"] {
                width: 60%;
                padding: 3px 0px 3px 0px;
                font-size: 16px;
            }
        }

        /* Media Query for Medium device  */
        @media (max-width: 768px) {
            .form-group {
                flex-direction: column;
            }

            .form-group>div {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .invoice-section2,
            .invoice-table {
                overflow: auto !important;
            }
        }
    </style>
    <div class="master-form flex-grow-1 main-content-expanded p-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
        @endif
        <div id="result"></div>
        <div class="form-container">
            {{-- <h2 class="text-center mb-4">Form-0</h2>
        <form>
            <div class="form-flex">
                <!-- Invoice Number. input field  -->
                <div class="form-group">
                    <label for="invoiceNo">Invoice Number</label>
                    <input type="text" class="form-control" id="invoiceNo" placeholder="Enter invoice number" required />
                </div>
                <!-- Client Name. input field  -->
                <div class="form-group">
                    <label for="invoiceNo">Client Name</label>
                    <input type="text" class="form-control" id="clientName" placeholder="Enter invoice number"
                        required />
                </div>
            </div>
            <div class="form-flex">
                <!-- Date input field  -->
                <div class="form-group">
                    <label for="invoiceNo">Invoice Date</label>
                    <input type="date" class="form-control" id="date" placeholder="Enter invoice number" required />
                </div>
                <!-- LPO field  -->
                <div class="form-group">
                    <label for="amount">LPO</label>
                    <input type="text" class="form-control" id="lpo" placeholder="Enter amount" required />
                </div>
            </div>
            <div class="form-flex">
                <!-- Amount input field  -->
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="text" class="form-control" id="amount" placeholder="Enter amount" required />
                </div>
                <!-- Credit input field  -->
                <div class="form-group">
                    <label for="amount">Credit</label>
                    <input type="text" class="form-control" id="credit" placeholder="Enter amount" required />
                </div>
            </div>
            <!-- Description input field  -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="textarea" id="description">
                 Enter description</textarea>
            </div>
            <button type="submit" class="submit">Submit</button>
        </form> --}}
            <div id="app"></div>
        </div>
    </div>
@endsection
