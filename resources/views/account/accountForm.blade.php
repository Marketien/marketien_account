@extends('adminMaster')
@section('content')
<style>
    .input-body {
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
        width: 400px;
        margin: auto; /* Centers the form horizontally */
    }

    .submit {
        background: linear-gradient(to top, #37d8a5, #114070);
        width: 100%;
        padding: 10px;
        color: white;
        font-weight: 500;
        border: none;
        border-radius: 5px;
        cursor: pointer; /* Ensure pointer cursor on hover */
    }

    .submit:hover {
        background: linear-gradient(to bottom, #37d8a5, #114070);
    }
</style>

<div class="input-body">

    <div class="form-container">
        <h2 class="text-center mb-4">Account Form</h2>
        <form action="/account-store" method="POST">
            @csrf
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
            <!-- Invoice Number input field -->
            <div class="form-group">
                <label for="invoiceNo">Invoice Number</label>
                <input type="text" name="invoice_no" class="form-control" id="invoiceNo" placeholder="Enter invoice number">
            </div>
            <!-- Description input field -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" placeholder="Enter description" required></textarea>
            </div>
            <!-- Type input field -->
            <div class="form-group">
                <label for="type">Type</label>
                <select class="form-control" id="type"  name="type" required>
                    <option value="">Select type</option>
                    <option value="cash-out">CashOut Debit</option>
                    <option value="cash-in">CashIn Credit</option>
                </select>
            </div>
            <!-- Amount input field -->
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" name="amount" class="form-control" id="amount" placeholder="Enter amount" required>
            </div>
            <button type="submit" class="submit">Submit</button>
        </form>
    </div>
</div>
@endsection
