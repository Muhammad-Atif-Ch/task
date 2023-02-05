<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('user.index') }}"> <img alt="image" src="{{ asset('public/assets/img/logo.png')}}" class="header-logo"/> <span
                    class="logo-name">Agency</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown @if (request()->routeIs('user.*')) active @endif">
                <a href="{{ route('user.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Persons</span></a>
            </li>
            <li class="dropdown @if (request()->routeIs('user.*')) active @endif">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="users"></i><span>File Manage</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link " href="{{ route('file.index') }}">File</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
