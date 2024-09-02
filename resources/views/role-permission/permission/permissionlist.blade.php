@extends('adminMaster')
@section('content')
    <!-- bootstrap CDN  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
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
            width: 50px;
            font-family: "Montserrat", sans-serif;
            background: linear-gradient(to top, #3bb890, #114070);
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
            background: linear-gradient(to bottom, #3bb890, #114070);
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
            background: linear-gradient(to top, #3bb890, #114070);
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
            background: linear-gradient(to top, #b83b3b, #114070);
            color: white !important;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: small;
            font-family: "Montserrat", sans-serif;
            transition: background 0.3s ease;
            padding: 5px;
        }

        .tableButton:hover {
            background: linear-gradient(to bottom, #b83b3b, #0d3050);
            opacity: 0.9;
            color: white !important;
        }

        .dropdown-menu {
            background: linear-gradient(to right, #ffffff, #b8b8b8);
        }
    </style>


    <div class="adminBody">
        <!-- Tag and button section  -->
        <section class="section">
            <div class="tag-section">
                <span>
                    <h1>Permission List</h1>
                </span>
                <span>
                    <button class="addPermissionButton">Add</button>
                </span>
            </div>
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
                        <tr>
                            <!-- Dropdown button   -->
                            <td>01</td>
                            <td>Shahabagi</td>
                            <td>
                                <div class="dropdown">
                                    <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <!-- table row 2  -->
                        <tr>
                            <!-- Dropdown button   -->
                            <td>01</td>
                            <td>Shahabagi</td>
                            <td>
                                <div class="dropdown">
                                    <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <!-- table row 3  -->
                        <tr>
                            <!-- Dropdown button   -->
                            <td>01</td>
                            <td>Shahabagi</td>
                            <td>
                                <div class="dropdown">
                                    <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <!-- table row 4  -->
                        <tr>
                            <!-- Dropdown button   -->
                            <td>01</td>
                            <td>Shahabagi</td>
                            <td>
                                <div class="dropdown">
                                    <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Edit
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

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
                                        <input type="text" class="formInput" id="cashInCredit"
                                            placeholder="Enter amount" required>
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
