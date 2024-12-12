<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon p-3 py-3">
            <img src="{{ asset('assets/admin/img/logo-go-explore.png') }}" alt="" class="img-fluid">
        </div>
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

    @canany(['place-category-view', 'place-view'])
        <li
            class="nav-item {{ request()->is('admin/place-categories*') || request()->is('admin/roles*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePlaceManagement"
                aria-expanded="true" aria-controls="collapsePlaceManagement">
                <i class="fas fa-fw fa-map-marked-alt"></i>
                <span>Manajemen Destinasi</span>
            </a>
            <div id="collapsePlaceManagement"
                class="collapse {{ request()->is('admin/place-category*') || request()->is('admin/role*') ? 'show' : '' }}"
                aria-labelledby="headingUserManagement" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @can('user-view')
                        <a class="collapse-item {{ request()->is('admin/place-category*') ? 'active' : '' }}"
                            href="{{ route('admin.place-category.index') }}">Kategori</a>
                    @endcan
                </div>
            </div>
        </li>
    @endcanany

    @canany(['user-view', 'role-view'])
        <li class="nav-item {{ request()->is('admin/users*') || request()->is('admin/roles*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserManagement"
                aria-expanded="true" aria-controls="collapseUserManagement">
                <i class="fas fa-fw fa-users"></i>
                <span>Manajemen User</span>
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


</ul>
