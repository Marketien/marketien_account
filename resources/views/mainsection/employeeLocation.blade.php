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
            background: linear-gradient(to left, #37d8a5, #114070);
            color: white;
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
    <div class="emp-body flex-grow-1 main-content-expanded p-3" >
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
                <table>
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
                                            <li><a class="dropdown-item editBtn" href="/employee-detail/{{$worker->id}}">Detail</a></li>
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
                <table>
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
    </div>
@endsection
