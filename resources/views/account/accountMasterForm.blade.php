@extends('adminMaster')
@section('content')
@vite(['resources/js/app.js','resources/css/app.css'])
<style>
    .master-form-body {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        background: linear-gradient(to top, #3bb890, #114070);
    }

    .invoice-container {
        margin-top: 80px;
        margin-bottom: 20px;
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        padding: 20px;
        max-width: 800px;
        width: 100%;
        box-sizing: border-box;
    }
    .invoice-header{
        margin-bottom: 50px;
    }

    .form-group {
        margin-bottom: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .form-group > div {
        flex: 1;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .form-group > div:last-child {
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

        .form-group > div {
            margin-right: 0;
            margin-bottom: 10px;
        }
    }
    .addressScope{
        height: 150px;
    }
    .invoice-section2 input{
        width: calc(100% - 16px); /* Adjust input width to fit within grid */
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
        background: linear-gradient(to top, #3bb890, #114070);
        color: white;
    }
    .invoice-table td {
        margin-bottom: 20px;
        border: 1px solid #000;
        padding: 8px;
        text-align: left;
    }
    .submit-button {
        margin-top: -50px;
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
      /* Adjusting form-group1 to justify-content-end */
      .form-group1 {
        display: flex;
        justify-content: flex-end;
        width: 60%;
    }

    .form-group1 > div {
        flex: 1;
        margin-left: 10px; /* Adjust spacing between items if needed */
    }

    .form-group1 label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group1 input[type="text"] {
        width: 100%; /* Ensure input fields take full width */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
        margin-left: -30px;
    }
    .form-group1Label{
        width: 60% ;

    }
    .form-group2{
        visibility: hidden;
        width: 30%;
    }
</style>
<div class="master-form flex-grow-1 main-content-expanded p-3">
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
