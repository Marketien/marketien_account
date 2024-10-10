@extends('adminMaster')
@section('content')
    <style>
        .adminSec {
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

        .addRoleButton {
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

        .addRoleButton:hover {
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



    <div class="adminSec flex-grow-1 p-3">
        <!-- Tag and button section  -->
        <section class="section">
            <div class="tag-section">
                <span>
                    <h1>User List</h1>
                </span>
                <span>
                    <a href="/user-form" class="addRoleButton">Add </a>
                </span>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <!-- Table section   -->
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <td>SLNo.</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <!-- table row 1  -->
                            <tr>
                                <!-- Dropdown button   -->

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $roleName)
                                            <label class="badge bg-primary">{{ $roleName }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a href="/user-edit/{{ $user->id }}" class="dropdown-item">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/user-delete/{{ $user->id }}" class="dropdown-item">
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </section>
    </div>
@endsection
