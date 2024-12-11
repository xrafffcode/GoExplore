<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @can('dashboard-view')
        <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    @endcan

    @canany(['user-view', 'role-view'])
        <li class="nav-item {{ request()->is('admin/users*') || request()->is('admin/roles*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserManagement"
                aria-expanded="true" aria-controls="collapseUserManagement">
                <i class="fas fa-fw fa-users"></i>
                <span>User Management</span>
            </a>
            <div id="collapseUserManagement"
                class="collapse {{ request()->is('admin/user*') || request()->is('admin/role*') ? 'show' : '' }}"
                aria-labelledby="headingUserManagement" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @can('user-view')
                        <a class="collapse-item {{ request()->is('admin/user*') ? 'active' : '' }}"
                            href="{{ route('admin.user.index') }}">User</a>
                    @endcan
                    @can('role-view')
                        <a class="collapse-item {{ request()->is('admin/role*') ? 'active' : '' }}"
                            href="{{ route('admin.role.index') }}">Role</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="{{ asset('assets/img/undraw_rocket.svg') }}" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
            and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
            Pro!</a>
    </div>

</ul>
