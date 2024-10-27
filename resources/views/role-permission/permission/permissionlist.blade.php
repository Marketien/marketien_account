@extends('adminMaster')
@section('content')
    <!-- bootstrap CDN  -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script> --}}
    <!-- font CDN  -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <style>
        .adminBody {
            height: 100vh;
            width: 100%;
            background: rgb(220, 219, 219);
            display: flex;
            flex-direction: column;
        }

        .section {
            background-color: white;
            margin: 50px 20px 0;
            padding: 10px;
            border-radius: 6px;
        }

        .tag-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .addPermissionButton {
            text-decoration: none;
            width: 50px;
            font-family: "Montserrat", sans-serif;
            background: #213167;
            color: white !important;
            border: none;
            padding: 5px;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            font-family: "Montserrat", sans-serif;
            transition: background 0.3s ease;
        }

        .addPermissionButton:hover {
            background: #21a1eb;
            opacity: 0.9;
            color: white !important;
        }

        /****************************** Table section ***************************** */
        .table-responsive {
            margin-top: 50px;
            margin-bottom: 50px;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            /* Enables smooth scrolling on iOS */

        }

        table {
            width: 100%;
            border: 1px solid black;
            padding: 5%;
            overflow: visible;
            position: relative;
        }

        thead {
            color: white;
            background: #21a1eb;
            font-weight: 600;
            border-bottom: 1px solid black;
        }

        table tr {
            border: 1px solid black;
            text-align: center;
        }

        table td {
            border: 1px solid black;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
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

        .tableButton:hover {
            background: #21a1eb;
            opacity: 0.9;
            color: white !important;
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
    </style>


    <div class="adminBody flex-grow-1 p-3">
        <!-- Tag and button section  -->
        <section class="section">
            <div class="tag-section">

                <span>
                    <h1>Permission List</h1>
                </span>
                <span>
                    <a href="/permission-form" class="addPermissionButton">Add</a>
                </span>
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
            @endif
            <!-- Table section   -->
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <td>Sl No</td>
                            <td>Name</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- table row 1  -->
                        @foreach ($permissions as $permission)
                            <tr>
                                <!-- Dropdown button   -->
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a href="/permission-edit/{{ $permission->id }}" class="dropdown-item">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/permission-delete/{{ $permission->id }}" class="dropdown-item">
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <!-- table row 2  -->


                    </tbody>
                </table>
                <!--Edit Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Input</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group  mb-3">
                                        <label for="cashOutDebit">CashOut Debit:</label>
                                        <input type="text" class="formInput" id="cashOutDebit" placeholder="Enter amount"
                                            required>
                                    </div>
                                    <div class="form-group  mb-3">
                                        <label for="cashInCredit">CashIn Credit:</label>
                                        <input type="text" class="formInput" id="cashInCredit" placeholder="Enter amount"
                                            required>
                                    </div>
                                    <div class="form-group  mb-3">
                                        <label for="description">Description:</label>
                                        <input type="text" class="formInput" id="description"
                                            placeholder="Enter description" required />
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn tableButton" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn tableButton">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Delete Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel ">Do You Agree?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn tableButton">Yes</button>
                                <button type="button" class="btn tableButton">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
