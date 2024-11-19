@extends('adminMaster')
@section('content')
    <style>
        .emp-body {
            font-family: Arial, sans-serif;
            background-color: white;
            padding: 20px;
            position: relative;
        }
        .back-button {
            position: absolute;
            top: 70px;
            left: 20px;
            width: 25px;
            height: 25px;
            background-color: rgb(176, 176, 176);
            padding: 5px;
            border-radius: 50%
        }


        .back-button:hover {
            background-color: rgb(75, 74, 74);
        }

        /* ------------------------------- */
        .InvoiceTableContainer {
            margin-top: 90px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .InvoiceTable-container {
            position: relative;
            flex: 1;
            margin: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .InvoiceTable-container table {
            width: 100%;
            border-collapse: collapse;

        }

        .dropdown-menu {
            position: absolute !important;
            z-index: 10;
        }

        .InvoiceTable-container th,
        td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid black;
        }

        .InvoiceTable-container th {
            /* background: #21a1eb; */
            background: #21a1eb;
            color: white;
        }

        .tableButton {
            border-radius: 5px;
            color: white;
            padding: 0px 20px;
            /* background: #213167 !important; */
            background: #213167 !important;
            justify-self: start;
            align-self: center;
            box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
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
    <div class="emp-body flex-grow-1 main-content-expanded p-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('fail'))
            <div class="alert alert-danger">
                {{ session('fail') }}
            </div>
        @endif
        <div class="InvoiceTableContainer">
            <div class="InvoiceTable-container">
                <table class="overflow-auto">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Designation</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workers as $worker)
                            <tr>
                                <td>{{ $worker->employee_name }}</td>
                                <td>{{ $worker->designation }}</td>
                                <td>{{ $worker->department }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item editBtn"
                                                    href="/employee-detail/{{ $worker->id }}">Detail</a></li>
                                            {{-- <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$account->id}}">Edit</button></li> --}}
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop{{ $worker->id }}">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                                @include('mainsection.modalEmployeeDelete')
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

            <div class="InvoiceTable-container">
                <table class="overflow-auto">
                    <thead>
                        <tr>
                            <th>Location Name</th>
                            <th>Location Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location)
                            <tr>
                                <td>{{ $location->location_name }}</td>
                                <td>{{ $location->location_code }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item editBtn" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $location->id }}"
                                                    data-id="{{ $location->id }}">Edit</a></li>
                                            {{-- <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$account->id}}">Edit</button></li> --}}
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#staticLBackdrop{{ $location->id }}">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                                @include('mainsection.modalLocationDelete')
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <img class="back-button" title="back-button" onclick="window.history.back();" src="{{ asset('image/left-arrow.png') }}" alt="">

    </div>
@endsection
