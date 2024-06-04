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
        <li class="active"><a href="index.html"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{route('users')}}"> <i class="fa fa-user"></i>Users</a></li>
        <li><a href="{{route('posts')}}"> <i class="icon-grid"></i>Posts</a></li>
        <li><a href="{{route('call-requests')}}"> <i class="fa fa-envelope"></i>Call Requests</a></li>
        <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
        <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>
    </ul>
</nav>
            