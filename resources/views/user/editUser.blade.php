@extends('adminMaster')
@section('content')
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
            margin-top: 30px;
            margin-bottom: 30px;
            gap: 10px;
        }

        .res-form {
            /* *********** change the style *********   */
            margin-top: 50px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 768px) {

            /* *********** change the style *********   */
            .res-form {
                flex: 1 1 100%;
            }
        }

        h5 {
            margin-bottom: 20px;
        }

        .parent-form-group {}

        .formInput {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-check {
            margin-bottom: 15px;
        }

        .form-check-input {
            cursor: pointer;
        }

        .form-check-label {
            font-size: 16px;
            font-weight: 500;
        }

        .button-div {
            display: flex;
            justify-content: center;
        }

        .submitButton {
            margin-top: 23px;
            width: 90px;
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

        .submitButton:hover {
            background: linear-gradient(to bottom, #3bb890, #114070);
            opacity: 0.9;
            color: white !important;
        }
    </style>

    <body>
        <div class="adminSec flex-grow-1 p-3">
            <!-- Tag and button section  -->
            <section class="section">
                <h1>Update User</h1>
                <div class="tag-section container">
                    <form action="/user-update/{{$user->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="parent-form-group row g-3">
                            <span class="form-group col col-lg-4 col-md-6 col-sm-12">
                                <label for="name">Name:</label>
                                <input type="text" class="formInput" id="name" name="name"
                                    value="{{ $user->name }}" placeholder="Enter Name" required />
                            </span>
                            <span class="form-group col col-lg-4 col-md-6 col-sm-12">
                                <label for="email">Email:</label>
                                <input type="text" class="formInput" id="email" name="email"
                                    value="{{ $user->email }}" placeholder="Enter Email" required />
                            </span>
                            <span class="form-group col col-lg-4 col-md-6 col-sm-12">
                                <label for="password">Password:</label>
                                <input type="text" class="formInput" id="password" name="password"
                                    placeholder="Enter Password"  />
                            </span>
                        </div>
                        <div class="res-form row">
                            <!-- *********** change the line*********   -->
                            <div class="select-menu ">
                                <!-- *********** change the line*********   -->
                                <span class="span">
                                    <label class="form-check-label" for="javaCheckbox"> Roles: </label>
                                    <select name="roles[]" multiple class="form-control">
                                        <option value="">select roles</option>
                                        @foreach ($roles as $role)

                                            <option
                                            value="{{ $role }}"
                                            {{in_array($role,$userRoles)?"selected":""}}
                                            >
                                            {{ $role}}
                                        </option>
                                        @endforeach

                                    </select>
                                </span>

                            </div>
                        </div>
                        <span class="button-div">
                            <button type="submit" class="submitButton">Update</button>
                        </span>
                    </form>
                </div>
            </section>
        </div>
    @endsection
