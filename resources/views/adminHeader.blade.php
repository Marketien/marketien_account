<header>
    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light NAV position-fixed w-100">
        <div class="container-fluid">
            <!--+++++++++++++++++++++++++++++ button and admin text +++++++++++++++++++++++++-->
            <!-- Menu button for large devices -->
            <button class="btn menu-button d-none d-lg-block text-white" id="sidebarToggle" aria-controls="sidebar"
                aria-expanded="false" aria-label="Toggle sidebar">
                <img class="menu-button-img" style="height: 20px" src="{{ asset('image/menu.png') }}" alt=""
                    srcset="" />
            </button>
            <a class="navbar-brand text-white adminPanelText" href="/dashboard">AdminPanel</a>
            <!--+++++++++++++++++++++++++++++ button and admin text +++++++++++++++++++++++++-->
            <!-- menu button  for medium and small device-->
            <div class="cloud-sm-btn">

                {{-- for small device --}}
                <a class="nav-link cloud-image d-lg-none" href="/sync-test">
                    <img src="{{ asset('image/sync_black.png') }}" alt="Profile" title="Sync from cloud"
                        class="rounded-circle" width="30" height="30" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation" id="menuButton">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        {{-- for large and medium device --}}
                        <a class="nav-link cloud-image" href="/sync-test">
                            <img src="{{ asset('image/sync_black.png') }}" alt="Profile" class="rounded-circle"
                                width="30" height="30" />
                        </a>
                    </li>
                    <li class="nav-item">

                        <a class="btn logout-btn mt-1" href="/logout">Logout({{ auth()->user()->name }})</a>
                    </li>
                </ul>
            </div>
        </div>

        </div>
    </nav>

    <!-- Sidebar -->
    <div class="d-flex">
        <div class="sidebar-hidden sidebar-expanded" id="sidebar">
            <div class="list-group list-group-flush">
                <!-- Accounts dropdown -->
                @php
                    $user = auth()->user();
                    $userRoles = $user->roles->pluck('name', 'name')->all();

                @endphp


                <div class="dropdown">
                    @if (in_array('Admin', $userRoles) || in_array('Accountant', $userRoles))
                        <button class="list-group-item list-group-item-action dropdown-toggle" type="button"
                            id="accountsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Accounts
                        </button>
                    @endif
                    <ul class="dropdown-menu " aria-labelledby="accountsDropdown">
                        <li><a class="dropdown-item fst-italic" href="/account-table">Accounts</a></li>
                        <li><a class="dropdown-item fst-italic" href="/account-master-table">Account master</a></li>
                        <li><a class="dropdown-item fst-italic" href="/account-master-form">Create Invoice</a></li>
                        {{-- <li><a class="dropdown-item fst-italic" href="/purchase-invoice">Purchase Order</a></li>
                        <li><a class="dropdown-item fst-italic" href="/invoice">Text Invoice</a></li>
                        <li><a class="dropdown-item fst-italic" href="/payslip">PaySlip</a></li> --}}
                    </ul>
                </div>

                <div class="dropdown">
                    @if (in_array('Admin', $userRoles) || in_array('storekeeper', $userRoles))
                        <button class="list-group-item list-group-item-action dropdown-toggle" type="button"
                            id="accountsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Attendance
                        </button>
                    @endif
                    <ul class="dropdown-menu " aria-labelledby="accountsDropdown">
                        <li><a class="dropdown-item fst-italic" href="/employee-location">Employee & Location</a>
                        </li>
                        <li><a class="dropdown-item fst-italic" href="/attendance-form">Attendance Form</a></li>
                    </ul>
                </div>
                <div class="dropdown">
                    @if (in_array('Admin', $userRoles))
                        <button class="list-group-item list-group-item-action dropdown-toggle" type="button"
                            id="accountsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Role-Permission
                        </button>
                    @endif
                    <ul class="dropdown-menu " aria-labelledby="accountsDropdown">
                        <li><a class="dropdown-item fst-italic" href="/role-index">Role</a></li>
                        <li><a class="dropdown-item fst-italic" href="/permission-index">Permission</a></li>
                        <li><a class="dropdown-item fst-italic" href="/user-list">User</a></li>
                    </ul>
                </div>
                @if (in_array('Admin', $userRoles))
                    <a href="#" class="list-group-item list-group-item-action">Settings</a>
                    <a href="#" class="list-group-item list-group-item-action">Notification</a>
                    <a href="#" class="list-group-item list-group-item-action">SMS</a>
                @endif
                <div class="dropdown">
                    @if (in_array('Admin', $userRoles) || in_array('Accountant', $userRoles))
                        <button class="list-group-item list-group-item-action dropdown-toggle" type="button"
                            id="accountsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Quotation
                        </button>
                    @endif
                    <ul class="dropdown-menu " aria-labelledby="accountsDropdown">
                        <li><a class="dropdown-item fst-italic" href="/quotation">Quotation Form</a></li>
                        <li><a class="dropdown-item fst-italic" href="/quotation-list">Quotation List</a></li>
                    </ul>
                </div>
                {{-- <a href="quotation" class="list-group-item list-group-item-action">Quotation</a> --}}
            </div>
            <div class="text-center">
                <a class="btn small-logout-btn mt-1 d-lg-none" href="/logout">Logout</a>
            </div>
            </ul>
        </div>

        <!--***************************** Main ****************************************** -->

    </div>

</header>
