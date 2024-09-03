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
            margin-top: 30px;
            margin-bottom: 30px;
            gap: 10px;
        }

        .res-form {
            margin-top: 50px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
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

        .permitButton {
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

        .permitButton:hover {
            background: linear-gradient(to bottom, #3bb890, #114070);
            opacity: 0.9;
            color: white !important;
        }

        @media (max-width: 768px) {
            .form-check {
                flex: 1 1 100%;
                max-width: 100%;
            }
        }
    </style>
    <div class="adminSec flex-grow-1 p-3">
        <!-- Tag and button section  -->
        <section class="section">
            <h1>Add Permission To Role</h1>
            <div class="tag-section container">
                <h3>Role:{{$role->name}}</h3>
                <form>
                    <div class="res-form">
                        @foreach ($permissions as $permission)


                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$permission->id}}" id="javaCheckbox" name="permission[]">
                            <label class="form-check-label" for="javaCheckbox">
                                {{$permission->name}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <span class="button-div">
                        <button class="permitButton">Permit</button>
                    </span>
                </form>
            </div>
        </section>
    </div>
@endsection
