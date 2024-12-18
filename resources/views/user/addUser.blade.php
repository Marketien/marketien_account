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

        .select-menu {
            display: flex;
            justify-content: center;
        }

        .span {
            width: 500px;
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

        .submitButton:hover {
            /* background: #21a1eb; */
      background: #21a1eb;
            opacity: 0.9;
            color: white !important;
        }
    </style>

    <body>
        <div class="adminSec flex-grow-1 p-3">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
            @endif
            <!-- Tag and button section  -->
            <section class="section">
                <h1>Create User</h1>
                <div class="tag-section container">
                    <form action="/user-store" method="post">
                        @csrf
                        <div class="parent-form-group row g-3">
                            <span class="form-group col col-lg-4 col-md-6 col-sm-12">
                                <label for="name">Name:</label>
                                <input type="text" class="formInput" id="name" name="name"
                                    placeholder="Enter Name" required />
                            </span>
                            <span class="form-group col col-lg-4 col-md-6 col-sm-12">
                                <label for="email">Email:</label>
                                <input type="text" class="formInput" id="email" name="email"
                                    placeholder="Enter Email" required />
                            </span>
                            <span class="form-group col col-lg-4 col-md-6 col-sm-12">
                                <label for="password">Password:</label>
                                <input type="text" class="formInput" id="password" name="password"
                                    placeholder="Enter Password" required />
                            </span>
                        </div>
                        <div class="res-form row">
                            <!-- *********** change the line*********   -->
                            {{-- <h5>Select Role:</h5> --}}
                            <div class="select-menu ">
                                <!-- *********** change the line*********   -->
                                <span class="span">
                                    <label class="form-check-label" for="javaCheckbox"> Roles: </label>
                                    <select name="roles[]" multiple class="form-control">
                                        <option value="">select roles</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role }}">{{ $role }}</option>
                                        @endforeach

                                    </select>
                                </span>

                            </div>
                        </div>
                        <span class="button-div">
                            <button type="submit" class="submitButton">Submit</button>
                        </span>
                    </form>
                </div>
                <img class="back-button" title="back-button" onclick="window.history.back();" src="{{ asset('image/left-arrow.png') }}" alt="">
            </section>

        </div>
    @endsection
