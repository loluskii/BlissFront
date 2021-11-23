{{-- <aside class="main-sidebar sidebar-dark-success elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ asset('hotel/logo.png') }}" alt={{ config('app.name') }}
            class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            </ul>
        </nav>
    </div>

</aside>
 --}}




<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    @include('admin.layouts.menu')
</ul>
<!-- End of Sidebar -->
