<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
    <img src="{{ asset('admin_assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> {{ Auth::user()->lname }}  {{ Auth::user()->fname }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('admin-home') }}" class="nav-link {{{ (Request::is('admin-home/*') ? 'active' : '') }}} || {{{ (Request::is('admin-home') ? 'active' : '') }}}"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('user') }}" class="nav-link {{{ (Request::is('user/*') ? 'active' : '') }}} || {{{ (Request::is('user') ? 'active' : '') }}} "><i class="nav-icon fas fa-user-alt"></i><p>User</p></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>