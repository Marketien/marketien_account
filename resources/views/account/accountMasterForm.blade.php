@extends('adminMaster')
@section('content')
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <link rel="stylesheet" href="{{ asset('build/assets/app-l0sNRNKZ.js')}}">
    <script type="module" src="{{ asset('build/assets/app-ZYuboFVO.js')}}"></script>
    <style>
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
            background: #21a1eb;
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
            background: #213167;
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
