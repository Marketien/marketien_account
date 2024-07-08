@extends('adminMaster')
@section('content')
    <style>
        .textInvoiceBody {
            font-family: Arial, sans-serif;
            background: linear-gradient(to left, #3bb890, #114070);
            margin: 0;
            padding-top: 90px;

            /* Ensure no default margin */
        }

        .invoice-container {

            max-width: 800px;
            /* Adjust max-width as needed */
            margin: auto;
            border: 1px solid #000;
            background-color: white;
            padding: 20px;
        }

        .invoice-header,
        .invoice-footer {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .invoice-section1 {
            margin-bottom: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 10px;
        }

        .invoice-section1 label {
            margin-bottom: 5px;
        }

        .invoice-section1 input,
        .invoice-section1 textarea {
            width: 100%;
            /* Ensure inputs and textareas take full width */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .invoice-section2 input,
        .invoice-section2 textarea,
        .invoice-section3 input,
        .invoice-section3 textarea {
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

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .submit-button {
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
    </style>
    <div class="textInvoiceBody">
        <div class="invoice-container">
            <div class="invoice-header">
                <h1>PURCHASE INVOICE FORM</h1>
            </div>

            <form>
                <div class="invoice-section1">
                    <div class="d-flex justify-content-between gap-2">
                        <span>
                            <label for="to">To:</label>
                            <input type="text" id="to" name="to" required>
                        </span>
                        <span>
                            <label for="date">Date:</label>
                            <input type="text" id="date" name="date" required>
                        </span>

                    </div>
                    <div class="d-flex justify-content-between gap-2">
                        <span>
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" required>
                        </span>
                        <span>
                            <label for="invoice-no">Invoice No:</label>
                            <input type="text" id="invoice-no" name="invoice-no" required>
                        </span>

                    </div>
                    <div class="d-flex  justify-content-between gap-2">
                        <span>
                            <label for="tel">Tel:</label>
                            <input type="tel" id="tel" name="tel" required>
                        </span>
                        <span>
                            <label for="terms">Terms of Payment:</label>
                            <input type="text" id="terms" name="terms" required>
                        </span>

                    </div>
                    <div class="d-flex  justify-content-between gap-2">
                        <span>
                            <label for="attn">Attn:</label>
                            <input type="text" id="attn" name="attn" required>
                        </span>
                        <span>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </span>

                    </div>
                    <div class="d-flex  justify-content-between gap-2">
                        <span>
                            <label for="project-ref">Project Ref:</label>
                            <input type="text" id="project-ref" name="project-ref" required>
                        </span>
                        <span>
                            <label for="trn">TRN:</label>
                            <input type="text" id="trn" name="trn" required>
                        </span>
                    </div>
                    <div>
                        <label for="scope">Scope of Works:</label>
                        <textarea id="scope" name="scope" rows="4" required></textarea>
                    </div>

                </div>
                <div class="invoice-section2">
                    <table class="invoice-table">
                        <thead>
                            <tr>
                                <th>SR.</th>
                                <th>Description</th>
                                <th>Qty.</th>
                                <th>Unit Price</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <textarea id="description" name="description" rows="2" required></textarea>
                                </td>
                                <td><input type="number" id="quantity" name="quantity" required></td>
                                <td><input type="number" id="unit-price" name="unit-price" step="0.01" required></td>
                                <td><input type="number" id="amount" name="amount" step="0.01" required></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- <div class="invoice-section3">
                    <label for="account-name">Account Name</label>
                    <input type="text" id="account-name" name="account-name" required>

                    <label for="account-number">Account Number</label>
                    <input type="text" id="account-number" name="account-number" required>

                    <label for="bank">Bank:</label>
                    <input type="text" id="bank" name="bank" required>
                </div> --}}

                <div class="invoice-footer">
                    <a href="/purchase">
                        <input type="button" value="SUBMIT" class="submit-button">

                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
