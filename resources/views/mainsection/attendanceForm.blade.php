@extends('adminMaster')
@section('content')
    <style>
        .attend-body {
            /* background: linear-gradient(to right, #3bb890, #114070); */
            color: #fff;
            padding: 20px;
        }

        .container-attend {

            margin: 0 auto;
            /* Center the container horizontally */
            max-width: 960px;
            padding-top: 90px;
            /* Optionally, set a max-width for the centered container */
        }

        .section-container {
            margin-bottom: 40px;
            border-radius: 10px;
            background-color: white;
            color: black;
            padding: 20px;
        }

        .section-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control1 {
            margin-bottom: 15px;
            width: 220px;
            padding: 1%;
            border-radius: 5px;
        }

        .form-control2 {
            gap: 10px;
            width: 100px;
            padding: 1%;
            border-radius: 5px;
        }

        .addButton {
            margin-top: 30px;
            display: block;
            height: 40px;
            width: 50px;
            padding: 10px;
            background: linear-gradient(to top, #3bb890, #114070);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .submit-btn{
            margin-top: 30px;
            display: block;
            height: 40px;
            width: 80px;
            padding: 10px;
            background: linear-gradient(to top, #3bb890, #114070);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .addButton:hover {
            background: linear-gradient(to bottom, #3bb890, #114070);
        }
    </style>


    <div class="attend-body flex-grow-1 main-content-expanded p-3">
        <div class="container-attend">
            <!-- Section 1 -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
            @endif
            <section class="section-container">
                <h2 class="section-title"></h2>
                <form action="/employee-store" method="POST">
                    <div class="row">
                        @csrf

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="employeeName">Employee Name</label>
                                <input type="text" class="form-control" id="employeeName" name="employee_name" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" id="department" name="department" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="addButton">Add</button>
                        </div>
                    </div>
                </form>
                <form action="/location-store" method="POST">
                    <div class="row">
                        @csrf


                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="projectLocation">Project Location</label>
                                <input type="text" class="form-control" id="projectLocation" name="location_name" />
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="projectCode">Project Code</label>
                                <input type="text" class="form-control" id="projectCode" name="location_code" />
                            </div>
                        </div>
                        <div class="col-md-2 ">
                            <button type="submit" class="addButton">Add</button>
                        </div>
                    </div>
                </form>
                <!-- <div class="row mt-3">
                                <div class="form-group col-md-5">
                                  <label for="projectLocation">Project Location</label>
                                  <input type="text" class="form-control" id="projectLocation" />
                              </div>
                              <div class="col-md-4 ">
                                  <button class="addButton">Add</button>
                                </div>
                        </div> -->
            </section>
            <!-- Section 2 -->
            <section class="section-container">
                <h2 class="section-title"></h2>
                <form action="/attendance-store" method="POST">
                    <div class="row">
                        @csrf

                        <div class="form-group col-md-3">
                            <label for="employeeDropdown">Employee Name:</label>
                            <select class="form-control1" id="employeeDropdown" name="employee_name">
                                <option value = "" selected>select an employee</option>
                                @foreach ($workers as $worker)

                                <option value="{{$worker->employee_name}}">{{$worker->employee_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="projectDropdown">Project Location :</label>
                            <select class="form-control1" id="projectDropdown" name="location_name">
                                <option value = "" selected>select an location</option>
                                @foreach ($locations as $location)

                                <option value="{{$location->location_name}}">{{$location->location_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- </div>
                               <div class="row"> -->
                        <!-- ATTD section  -->
                        <div class="form-group col-md-2">
                            <label class="label2" for="attd">ATTD:</label>
                            <select class="form-control2" id="attd" name="attd">
                                <option value="P">P</option>
                                <option value="A">A</option>
                            </select>
                        </div>
                        <!-- Std Hrs section  -->
                        <div class="form-group col-md-2">
                            <label class="label2" for="stdHrs">Std Hrs:</label>
                            <select class="form-control2" id="stdHrs" name="std_hour">
                                <option value="" selected>select an option</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <!-- OT section  -->
                        <div class="form-group col-md-2 ot-class">
                            <label class="label2" for="ot">OT:</label><br>
                            <select class="form-control2" id="ot" name="ot">
                                <option value="" selected>select an option</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="submit-btn">Submit</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
