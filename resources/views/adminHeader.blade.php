<header>
    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light NAV position-fixed w-100">
        <div class="container-fluid">
          <!--+++++++++++++++++++++++++++++ button and admin text +++++++++++++++++++++++++-->
            <!-- Menu button for large devices -->
               <button
                 class="btn menu-button d-none d-lg-block text-white"
                 id="sidebarToggle"
                 aria-controls="sidebar"
                 aria-expanded="false"
                 aria-label="Toggle sidebar"
               >
                 <img
                   class="menu-button-img"
                   style="height: 20px"
                   src="{{asset('image/menu.png')}}"
                   alt=""
                   srcset=""
                 />
               </button>
                 <a class="navbar-brand text-white adminPanelText" href="#">AdminPanel</a>
           <!--+++++++++++++++++++++++++++++ button and admin text +++++++++++++++++++++++++-->
            <!-- menu button  for medium and small device-->
               <button
                 class="navbar-toggler"
                 type="button"
                 data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent"
                 aria-controls="navbarSupportedContent"
                 aria-expanded="false"
                 aria-label="Toggle navigation"
                 id="menuButton"
               >
                 <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav">
                   <li class="nav-item">
                     <a class="nav-link" href="#">
                       <img
                         src="{{asset('https://i.pinimg.com/564x/6a/44/f0/6a44f0e35b10e6ed063eeebf7ed844f9.jpg')}}"
                         alt="Profile"
                         class="rounded-circle"
                         width="30"
                         height="30"
                       />
                     </a>
                   </li>
                   <li class="nav-item">
                     <button class="btn logout-btn mt-1" href="/logout">Logout</button>
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
                <div class="dropdown">
                    <button class="list-group-item list-group-item-action dropdown-toggle" type="button"
                        id="accountsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Accounts
                    </button>
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
                    <button class="list-group-item list-group-item-action dropdown-toggle" type="button"
                        id="accountsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Attendance
                    </button>
                    <ul class="dropdown-menu " aria-labelledby="accountsDropdown">
                        <li><a class="dropdown-item fst-italic" href="/employee-location">Employee & Location</a></li>
                        <li><a class="dropdown-item fst-italic" href="/attendance-form">Attendance Form</a></li>
                    </ul>
                </div>
                <a href="#" class="list-group-item list-group-item-action">Role</a>
                <a href="#" class="list-group-item list-group-item-action">Settings</a>
                <a href="#" class="list-group-item list-group-item-action">Notification</a>
                <a href="#" class="list-group-item list-group-item-action">SMS</a>
                <div class="dropdown">
                    <button class="list-group-item list-group-item-action dropdown-toggle" type="button"
                        id="accountsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Quotation
                    </button>
                    <ul class="dropdown-menu " aria-labelledby="accountsDropdown">
                        <li><a class="dropdown-item fst-italic" href="/quotation">Quotation Form</a></li>
                        <li><a class="dropdown-item fst-italic" href="/quotation-list">Quotation List</a></li>
                    </ul>
                </div>
                {{-- <a href="quotation" class="list-group-item list-group-item-action">Quotation</a> --}}
            </div>
            <div class="text-center">
                <button class="btn small-logout-btn mt-1 d-lg-none" href="/logout">Logout</button>
            </ul>
          </div>
        </div>
        <!--***************************** Main ****************************************** -->

    </div>
</header>
