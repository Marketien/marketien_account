@extends('adminMaster')
@section('content')
    <div style="margin-top: 55px;" class="flex-grow-1 p-3">

        <div class=" bg-light p-3 rounded mb-5 mt-3">
            <h1 class="filterText mb-3">
                <span>
                    <img class="filterImg" src="./assets/filter_icon.png" alt="" /></span>
                <span>Filters</span>
            </h1>
            <div class="w-50">
                <select class="form-select" aria-label="Default select example">
                    <option selected>20-08-2024</option>
                    <option value="1">25-08-2024</option>
                    <option value="2">15-08-2024</option>
                    <option value="3">10-08-2024</option>
                </select>
            </div>
        </div>

        <div class="bg-light p-3 rounded mb-5">
            <!-- button and filter section  -->
            <div class="mb-5 d-flex justify-content-between align-items-center gap-2">
                <!-- selector section  -->
                <div class="selector-width d-flex align-items-center gap-2">
                    <span> Show </span>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>10</option>
                        <option value="1">20</option>
                        <option value="2">30</option>
                        <option value="3">40</option>
                    </select>
                    <span> Entries </span>
                </div>
                <!-- button section  -->
                <div class="d-flex align-items-center gap-2">
                    <!-- Export to CSV button -->
                    <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="./assets/document_16509258.png" alt="" /></span>
                        <span>CSV</span>
                    </button>
                    <!-- Export to Excel button -->
                    <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="./assets/document_16509258.png" alt="" /></span>
                        <span> Excel</span>
                    </button>
                    <!-- Print button -->
                    <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="./assets/printer_1041985.png" alt="" /></span>
                        <span>Print</span>
                    </button>
                    <!-- Column visibility  -->
                    <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="./assets/file-storage_8316770.png" alt="" /></span>
                        <span>visibility</span>
                    </button>
                    <!-- Export to PDF button  -->
                    <button class="button-width d-flex align-items-center gap-1">
                        <span><img class="button-img" src="./assets/pdf.png" alt="" /></span>
                        <span>PDF</span>
                    </button>
                </div>
                <!-- search button  -->
                <div>
                    {{-- <form class="d-flex ms-auto me-3">
                        <input class="form-control me-2 w-100" type="search" placeholder="Search" aria-label="Search" />
                    </form> --}}
                    <a href="/account-master-form" class="btn search-button">
                        Add
                    </a>
                </div>
            </div>
            <!-- Table section   -->
            <table class="overflow-auto">
                <thead>
                    <tr>
                        <td>Actions</td>
                        <td>Invoice No.</td>
                        <td>Client Name</td>
                        <td>Project Description</td>
                        <td>Inv. Date</td>
                        <td>LPO</td>
                        <td>Amount(A&D)</td>
                        <td>Credit</td>
                        <td>Balance Amount <br>(A&C)</td>
                        <td>Remarks</td>
                    </tr>
                </thead>
                <tbody>
                    <!-- table row 1  -->
                    <tr>
                        <!-- Dropdown button   -->
                        <td>
                            <div class="dropdown">
                                <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Details </a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>INV-QAK-23-128</td>
                        <td>Prominent star cont. LLC</td>
                        <td>AL mukathra</td>
                        <td>25/02/2023</td>
                        <td>QAK-QTN-/022-0254</td>
                        <td>16613.27</td>
                        <td></td>
                        <td>16613.27</td>
                        <td></td>
                    </tr>
                    <!-- table row 1  -->
                    <tr>
                        <!-- Dropdown button   -->
                        <td>
                            <div class="dropdown">
                                <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Details </a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>INV-QAK-23-128</td>
                        <td>Prominent star cont. LLC</td>
                        <td>AL mukathra</td>
                        <td>25/02/2023</td>
                        <td>QAK-QTN-/022-0254</td>
                        <td>16613.27</td>
                        <td></td>
                        <td>16613.27</td>
                        <td></td>
                    </tr>
                    <!-- table row 2  -->
                    <tr>
                        <!-- Dropdown button   -->
                        <td>
                            <div class="dropdown">
                                <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Details </a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>INV-QAK-23-128</td>
                        <td>Prominent star cont. LLC</td>
                        <td>AL mukathra</td>
                        <td>25/02/2023</td>
                        <td>QAK-QTN-/022-0254</td>
                        <td>16613.27</td>
                        <td></td>
                        <td>16613.27</td>
                        <td></td>
                    </tr>
                    <!-- table row 3  -->
                    <tr>
                        <!-- Dropdown button   -->
                        <td>
                            <div class="dropdown">
                                <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Details </a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>INV-QAK-23-128</td>
                        <td>Prominent star cont. LLC</td>
                        <td>AL mukathra</td>
                        <td>25/02/2023</td>
                        <td>QAK-QTN-/022-0254</td>
                        <td>16613.27</td>
                        <td></td>
                        <td>16613.27</td>
                        <td></td>
                    </tr>
                    <!-- table row 4  -->
                    <tr>
                        <!-- Dropdown button   -->
                        <td>
                            <div class="dropdown">
                                <button class="tableButton dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Details </a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>INV-QAK-23-128</td>
                        <td>Prominent star cont. LLC</td>
                        <td>AL mukathra</td>
                        <td>25/02/2023</td>
                        <td>QAK-QTN-/022-0254</td>
                        <td>16613.27</td>
                        <td></td>
                        <td>16613.27</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="font-family: 'Montserrat', sans-serif; font-weight: bold;"
            class="bg-light p-3 rounded mb-3 text-center lh-lg">
            <p class="d-flex justify-content-between"><span>Total Bill Submitted :</span> <span>570</span> </p>
            <p class="d-flex justify-content-between"><span>Total Amount REcieved :</span> <span
                    class="text-success">570</span> </p>
            <p class="d-flex justify-content-between"><span>Total OutStanding:</span> <span class="text-danger">570</span>
            </p>
        </div>
    </div>
@endsection
