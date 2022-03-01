<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="#">Laravel</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">LVL</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">HIGHLIGHT</li>
        <li {{ is_nav_active('dashboard') }}>
            <a class="nav-link" href="#">
                <i class="fas fa-fire"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-header">MASTER</li>
        <li {{ is_nav_active('user') }}>
            <a class="nav-link" href="{{ route('admin.user.index') }}">
                <i class="fas fa-users"></i> <span>User</span>
            </a>
        </li>
        <li>
            <a class="nav-link" href="#">
                <i class="fas fa-sitemap"></i> <span>Menu 1</span>
            </a>
        </li>
        <li class="menu-header">FEATURE</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown">
                <i class="fas fa-list-ol"></i> <span>Dropdown</span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a class="nav-link" href="#">
                        <i class="far fa-circle"></i> Dropdown Menu 1
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>