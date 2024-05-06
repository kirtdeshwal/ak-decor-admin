<nav class="sidebar sidebar-offcanvas bg-dark" id="sidebar">
<div class="user-profile">
    <div class="user-image">
    <img src="{{ asset('admin/images/faces/face28.png') }}">
    </div>
    <div class="user-name">
        {{ucwords(auth()->user()->first_name.' '.auth()->user()->last_name)}}
    </div>
    <div class="user-designation">
        {{auth()->user()->email}}
    </div>
</div>
<ul class="nav" >
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}" style="border-top:1px solid #001737">
            <i class="icon-box menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('users') }}">
            <i class="icon-head menu-icon"></i>
            <span class="menu-title">Users</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('orders') }}">
            <i class="icon-paper-stack menu-icon"></i>
            <span class="menu-title">Orders</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('coupons') }}">
            <i class="icon-ribbon menu-icon"></i>
            <span class="menu-title">Coupons</span>
        </a>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="icon-briefcase menu-icon"></i>
            <span class="menu-title">Categories</span>
        </a>
    </li> -->

    <li class="nav-item">
        <a class="nav-link" href="{{ route('products') }}">
            <i class="icon-bag menu-icon"></i>
            <span class="menu-title">Inventories</span>
        </a>
    </li>







    <!-- <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-disc menu-icon"></i>
        <span class="menu-title">UI Elements</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
        <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="pages/forms/basic_elements.html">
        <i class="icon-file menu-icon"></i>
        <span class="menu-title">Form elements</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="pages/charts/chartjs.html">
        <i class="icon-pie-graph menu-icon"></i>
        <span class="menu-title">Charts</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="pages/tables/basic-table.html">
        <i class="icon-command menu-icon"></i>
        <span class="menu-title">Tables</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="pages/icons/feather-icons.html">
        <i class="icon-help menu-icon"></i>
        <span class="menu-title">Icons</span>
    </a>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
        <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
        <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
        <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
        <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
        </ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="docs/documentation.html">
        <i class="icon-book menu-icon"></i>
        <span class="menu-title">Documentation</span>
    </a>
    </li> -->
</ul>
</nav>
