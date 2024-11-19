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

        .section {
            background-color: white;
            margin: 50px 20px 0;
            padding: 10px;
            border-radius: 6px;
            position: relative;
        }

        .tag-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .addRoleButton {
            text-decoration: none;
            width: 50px;
            font-family: "Montserrat", sans-serif;
            /* background: #213167; */
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

        .addRoleButton:hover {
            /* background: #21a1eb; */
      background: #21a1eb;
            opacity: 0.9;
            color: white !important;
        }

        /****************************** Table section ***************************** */
        .table-user {
            margin-top: 50px;
            margin-bottom: 50px;
            position: relative !important;
            /* Enables smooth scrolling on iOS */

        }

        table {
            width: 100%;
            border: 1px solid black;
            padding: 5%;
            position: relative;
        }

        thead {
            color: white;
            /* background: #21a1eb; */
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
            /* background: #213167 !important; */
            background: #213167 !important;
            justify-self: start;
            align-self: center;
            box-shadow: 2px 2px rgba(2, 2, 2, 0.764);
        }

        .tableButton:hover {
            /* background: #21a1eb; */
      background: #21a1eb;
            opacity: 0.9;
            color: white !important;
        }

        .dropdown-menu {
            position: absolute !important;
            z-index: 10 !important;
            z-index: 10;
            /* background: #213167 !important; */
            background: #213167 !important;
            font-weight: 600;
            text-transform: uppercase;
        }

        .dropdown-item {
            color: white !important;
        }

        .dropdown-item:hover {
            /* background-color: #21a1eb !important; */
            background-color: ##21a1eb !important;
            color: black !important;
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
            <div class="table-user">
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
            <img class="back-button" title="back-button" onclick="window.history.back();" src="{{ asset('image/left-arrow.png') }}" alt="">


        </section>
    </div>
@endsection
