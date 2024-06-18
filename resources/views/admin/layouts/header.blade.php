<header class="header">   
      <nav class="navbar navbar-expand-lg">
            <div class="search-panel">
                  <div class="search-inner d-flex align-items-center justify-content-center">
                        <div class="close-btn">Close <i class="fa fa-close"></i></div>
                        <form id="searchForm" action="#">
                              <div class="form-group">
                                    <input type="search" name="search" placeholder="What are you searching for...">
                                    <button type="submit" class="submit">Search</button>
                              </div>
                        </form>
                  </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-between">
                  <div class="navbar-header">
                        <!-- Navbar Header--><a href="index.html" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dark</strong><strong>Admin</strong></div>
                        <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
                        <!-- Sidebar Toggle Btn-->
                        <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
                  </div>
                  <div class="right-menu list-inline no-margin-bottom">    
                        <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div>
                        <!-- Languages dropdown    -->
                        <div class="list-inline-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="admin/img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                        <div aria-labelledby="languages" class="dropdown-menu"><a rel="nofollow" href="#" class="dropdown-item"> <img src="admin/img/flags/16/DE.png" alt="English" class="mr-2"><span>German</span></a><a rel="nofollow" href="#" class="dropdown-item"> <img src="admin/img/flags/16/FR.png" alt="English" class="mr-2"><span>French  </span></a></div>
                        </div>
                        <!-- Log out               -->
                        <form method="POST" action="{{ route('logout') }}" class="list-inline-item logout">
                        @csrf

                        
                        <a id="logout" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">Logout <i class="icon-logout"></i></a>
                        
                        </form>
                  </div>
            </div>
      </nav>
</header>