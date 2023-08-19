<div class="navbar-collapse collapse" id="navbarSupportedContent">
    <!-- ============================================================== -->
    <!-- toggle and nav items -->
    <!-- ============================================================== -->
    <ul class="float-left mr-auto navbar-nav">
        <li class="nav-item d-none d-md-block">
            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                data-sidebartype="mini-sidebar">
                <i class="sl-icon-menu font-20"></i>
            </a>
        </li>
    </ul>
    <!-- ============================================================== -->
    <!-- Right side toggle and nav items -->
    <!-- ============================================================== -->
    <ul class="float-right navbar-nav">
        <!-- ============================================================== -->
        <!-- Search -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('admin/assets/images/users/1.jpg') }}" alt="user" class="rounded-circle"
                    width="31">
            </a>
            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                {{-- <span class="with-arrow">
                    <span class="bg-primary"></span>
                </span> --}}
                <div class="text-white d-flex no-block align-items-center p-15 bg-primary m-b-10">
                    <div class="">
                        <img src="{{ asset('admin/assets/images/users/1.jpg') }}" alt="user" class="img-circle"
                            width="60">
                    </div>
                    <div class="m-l-10">
                        <h4 class="m-b-0">{{ Auth::user()->name }}</h4>
                        <p class=" m-b-0">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <a class="dropdown-item" href="javascript:void(0)">
                    <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                <a class="dropdown-item" href="javascript:void(0)">
                    <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                <a class="dropdown-item" href="javascript:void(0)">
                    <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)">
                    <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="border-transparent dropdown-item">
                        <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</button>
                    <div class="dropdown-divider"></div>
                </form>
                <div class="p-10 p-l-30">
                    <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View
                        Profile</a>
                </div>
            </div>
        </li>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
    </ul>
</div>
