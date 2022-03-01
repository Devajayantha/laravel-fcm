<ul class="navbar-nav mr-auto">
    <li>
        <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
            <i class="fas fa-bars"></i>
        </a>
    </li>
</ul>
<ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle">
        <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep">
            <i class="far fa-bell"></i>
        </a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Notifications
                <div class="float-right">
                    {{-- <a href="#">Mark All As Read</a> --}}
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-icon bg-success text-white">
                        <i class="fas fa-message"></i> 
                    </div>
                    <div class="dropdown-item-desc">
                        notification body
                        <div class="time text-primary">1 hour ago</div>
                    </div>
                </a>
            </div>
            <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </li>
    <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('image/user.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi,
                {{ auth()->user()->name ?? '' }}
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            {{-- <a href="{{ route('profile.show') }}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
            </a> --}}
            <div class="dropdown-divider"></div>
            <a href="javascript:;" class="dropdown-item has-icon text-danger"
                onclick="document.querySelector('#logout_form').submit()">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            {{-- {{ Form::open(['route' => 'logout', 'id' => 'logout_form']) }}
            {{ Form::close() }} --}}
        </div>
    </li>
</ul>