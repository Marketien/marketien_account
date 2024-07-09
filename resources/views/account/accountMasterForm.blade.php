@extends('adminMaster')
@section('content')
    <style>
     .master-form {
            background: linear-gradient(to left, #37d8a5, #114070);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        .submit {
            background: linear-gradient(to top, #37d8a5, #114070);
            width: 100%;
            padding: 2%;
            color: white;
            font-weight: 500;
            border: none;
            border-radius: 2%;
        }

        .submit:hover {
            background: linear-gradient(to bottom, #37d8a5, #114070);
        }

        /* Style for the Description Textarea */
        .textarea {
            width: 100%;
        }

        /* Media Query for Medium and Large Devices */
        @media (min-width: 768px) {
            .textarea {
                width: 210%;
                border: 1px solid rgb(195, 194, 194);
                border-radius: 5px;
                color: gray;
            }

            .form-flex {
                display: flex;
                justify-content: space-between;
                /* Adjust alignment as per your design */
            }

            .form-group {
                width: 48%;
                /* Adjust width of form groups as per your layout */
            }
        }
    </style>
<div class="master-form">
    <div class="form-container">
        <h2 class="text-center mb-4">Form-0</h2>
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
        </form>
    </div>
</div>
@endsection
