<div class="top_nav">
    <button class="top_nav_toggle" id="nav_toggle">
        <span></span>
        <span></span>
        <span></span>
    </button>
    {{-- <a href="index.html" class="hidden_home">ADMIN PANEL</a> --}}

    <div class="d-flex justify-content-between flex-grow-1 align-items-center">
        <div class="drop_container ms-3">
            <button class="drop btn btn-success"><i class="fa fa-plus"></i></button>
            <ul class="drop_element drop_left">
                <li>
                    <a href="{{ route('admin.dashboard') }}"><i class="fa fa-plus"></i>Sales</a>
                </li>
            </ul>
        </div>
        
        <div class="d-flex align-items-center">
            <div class="drop_container">
                <button class="drop btn">
                    <span class="badge bg-danger notice">2</span>
                    <i class="fas fa-envelope-open-text"></i>
                </button>
                <ul class="drop_element drop_right" style="min-width: 300px;">
                    <li>
                        <a href="#" class="d-flex align-items-center py-1">
                            <div class="p-2">
                                <img src="{{ asset('backend/assets/image/user.svg') }}" width="40px" alt="">
                            </div>
                            <div>
                                <strong>User name</strong><br>
                                <small class="mb-0">Call me whenever you can...</small><br>
                                <small class="mb-0"><i class="far fa-clock"></i> 4 Hours ago</small>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex align-items-center py-1">
                            <div class="p-2">
                                <img src="{{ asset('backend/assets/image/user.svg') }}" width="40px" alt="">
                            </div>
                            <div>
                                <strong>User name</strong><br>
                                <small class="mb-0">Call me whenever you can...</small><br>
                                <small class="mb-0"><i class="far fa-clock"></i> 4 Hours ago</small>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="drop_container">
                <button class="drop btn">
                    <span class="badge bg-warning notice">3</span>
                    <i class="far fa-bell"></i>
                </button>
                <ul class="drop_element drop_right">
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-cogs"></i>Vew profile</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-users"></i>All Admin</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-user"></i>Create profile</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-adjust"></i>Panel layout</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><i class="fa fa-sign-out-alt"></i>Logout</a>
                    </li>
                </ul>
            </div>
            <div class="setting_drop">
                <div class="drop_container">
                    <button class="drop"><i class="fa fa-cog"></i></button>
                    <ul class="drop_element drop_right">
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-cogs"></i>Vew profile</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-users"></i>All Admin</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-user"></i>Create profile</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-adjust"></i>Panel layout</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" onclick="document.getElementById('logout').submit()"><i class="fa fa-sign-out-alt"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>