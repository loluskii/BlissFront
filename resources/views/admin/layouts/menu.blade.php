<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">

    <div class="sidebar-brand-text mx-3">BLISS EXPLORERs</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider m-0">



<!-- Nav Item - Pages Collapse Menu -->
{{-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-user"></i>
        <span>User Management</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.users.index') }}">All Users</a>
            <a class="collapse-item" href="">Manage Users</a>
            <a class="collapse-item" href="">Send Bulk Email</a>
            <a class="collapse-item" href="">Trashed Users</a>
        </div>
    </div>
</li> --}}
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.users.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Users</span></a>
</li>
<hr class="sidebar-divider d-none d-md-block m-0">
<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.orders.index') }}">
        <i class="fas fa-fw fa-shopping-cart"></i>
        <span>Orders</span></a>
</li>
<hr class="sidebar-divider d-none d-md-block m-0">
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fas fa-fw fa-box"></i>
        <span>Product Management</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.products.index') }}">All Products</a>
            <a class="collapse-item" href="{{ route('admin.category.view') }}">All Categories</a>
        </div>
    </div>
</li>




<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
