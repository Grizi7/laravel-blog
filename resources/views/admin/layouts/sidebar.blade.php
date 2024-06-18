<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('storage/'. auth()->user()->image)}}" alt="admin" class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">{{auth()->user()->name}}</h1>
            <p>Admiv</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="{{ request()->routeIs('admin') ? 'active' : '' }}">
            <a href="{{ route('admin') }}">
                <i class="icon-home"></i>Dashboard
            </a>
        </li>
        <li class="{{ request()->routeIs('users') ? 'active' : '' }}">
            <a href="{{ route('users') }}">
                <i class="fa fa-user"></i>Users
            </a>
        </li>
        <li class="{{ request()->routeIs('posts') ? 'active' : '' }}">
            <a href="{{ route('posts') }}">
                <i class="icon-grid"></i>Posts
            </a>
        </li>
        <li class="{{ request()->routeIs('call-requests') ? 'active' : '' }}">
            <a href="{{ route('call-requests') }}">
                <i class="fa fa-envelope"></i>Call Requests
            </a>
        </li>
    </ul>

</nav>
            