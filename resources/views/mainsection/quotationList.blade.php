@extends('adminMaster')
@section('content')
    <style>
        .emp-body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        /* ------------------------------- */
        .InvoiceTableContainer {
            margin-top: 90px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            overflow-x: auto !important;
        }

        .InvoiceTable-container {
            padding-bottom: 40px;
            overflow-x: auto !important;
            flex: 1;
            margin: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .InvoiceTable-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .InvoiceTable-container th,
        td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid black;
        }

        .InvoiceTable-container th {
            background: #21a1eb;
            color: white;
        }

        .tableButton {
            border-radius: 5px;
            color: white;
            padding: 0px 20px;
            background: #213167 !important;
            justify-self: start;
            align-self: center;
            box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
        }

        .dropdown-menu {
            z-index: 5;
            background-color: #213167 !important;
            font-weight: 600;
            text-transform: uppercase;
        }

        .dropdown-item {
            color: white !important;
        }

        .dropdown-item:hover {
            background-color: #21a1eb !important;
            color: black !important;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .table-container {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
    <div class="flex-grow-1 main-content-expanded p-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
        @endif
        <div class="emp-body">
            <div class="InvoiceTableContainer">


                <div class="InvoiceTable-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Ref. No.</th>
                                <th>Date</th>
                                <th>M/S</th>
                                <th>P.O</th>
                                <th>Tel</th>
                                <th>Email</th>
                                <th>To</th>
                                <th>Project Name</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotations as $quotation)
                                <tr>
                                    <td>{{ $quotation->ref_no }}</td>
                                    <td>{{ $quotation->date }}</td>
                                    <td>{{ $quotation->ms }}</td>
                                    <td>{{ $quotation->po_box }}</td>
                                    <td>{{ $quotation->phone_no }}</td>
                                    <td>{{ $quotation->email }}</td>
                                    <td>{{ $quotation->kind_attn }}</td>
                                    <td>{{ $quotation->project_name }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item editBtn"
                                                        href="/quotation-detail/{{ $quotation->id }}">Detail</a></li>
                                                {{-- <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$account->id}}">Edit</button></li> --}}
                                                <li><a class="dropdown-item"
                                                        href="/quotation-delete/{{ $quotation->id }}">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
