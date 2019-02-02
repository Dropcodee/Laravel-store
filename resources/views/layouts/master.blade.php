<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>CompuDavid</title>
<!-- CSS LINKS-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bg.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
<!-- CSS LINKS-->
</head>
<!--
BODY TAG OPTIONS:
=================
Find What your looking for ?
You must be a programmer or Nerd to be here HMMMMM ?
Well Nothing to See here
|---------------------------------------------------------|
| Code Wriiten By Owolabi Joshua A.K.A DropCode           |
| WebSite              |  http://www.surgecode.ng         |
| YouTube Channel      |  DropCode                        |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- navbar icon -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="/" class="nav-link" data-widget="pushmenu"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    <!-- navbar icon -->
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{ asset('svg/cd.jpg') }}" alt="Company Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CompuDavid</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset("svg/user.png") }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/home" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <!-- LINKS FOR ALL USERS -->
    @if(auth()->User()->type === 'admin' || auth()->User()->type === 'author' || auth()->User()->type === 'user')
          <li class="nav-item">
              <router-link to="/sales" class="nav-link ">
                  <i class=" nav-icon fas fa-cart-plus"></i>
                <p>
                  Sale
                </p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/company" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Company Info
                </p>
              </router-link>
            </li>
            <li class="nav-item">
              <router-link to="/profile" class="nav-link ">
                  <i class=" nav-icon fas fa-user"></i>
                <p>
                 Profile
                </p>
              </router-link>
          </li>
            @else
            @endif
            @if(auth()->check())
                  @if(auth()->User()->type == 'admin'  || auth()->User()->type === 'author')
                        <li class="nav-item">
                          <router-link to="/category" class="nav-link ">
                              <i class=" nav-icon fas fa-cookie-bite"></i>
                            <p>
                            Category
                            </p>
                          </router-link>
                      </li>
                      <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-cogs"></i>
                          <p>
                            Management
                            <i class="right fa fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/users" class="nav-link">
                                    <i class=" fas fa-users"></i>
                                  <p>
                                    Staffs
                                  </p>
                                </router-link>
                            </li>
                            <li class="nav-item has-treeview">
                              <router-link to="developer" class="nav-link">
                                <i class="fas fa-terminal"></i>
                                <p>Developers</p>
                              </router-link>
                            </li>
                        </ul>
                      </li>
                      @else

                      @endif
            @endif
            <!--IF STATEMENTS FOR ADMIN AND MANAGER -->
                @if (Auth::User()->type === 'admin')
                <li class="nav-item">
                  <router-link to="/products" class="nav-link ">
                      <i class=" nav-icon fas fa-cookie-bite"></i>
                    <p>
                     Products
                    </p>
                  </router-link>
              </li>
                <li class="nav-item">
                  <router-link to="/store" class="nav-link ">
                      <i class=" nav-icon fas fa-store"></i>
                    <p>
                     Stores
                    </p>
                  </router-link>
              </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-cogs"></i>
                      <p>
                          Reports
                        <i class="right fa fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                       <!-- User is manager or admin-->
                       <li class="nav-item has-treeview">
                          <router-link to="/salesReport" class="nav-link">
                              <i class=" fas fa-users"></i>
                            <p>
                              Sales Reports
                            </p>
                          </router-link>
                      </li>

                    <li class="nav-item has-treeview">
                      <router-link to="developer" class="nav-link">
                        <i class="fas fa-terminal"></i>
                        <p>Statistics</p>
                      </router-link>
                    </li>
                    <li class="nav-item has-treeview">
                        <router-link to="developer" class="nav-link">
                          <i class="fas fa-terminal"></i>
                          <p>Customer's Accounts</p>
                        </router-link>
                      </li>
                      <li class="nav-item has-treeview">
                        <router-link to="developer" class="nav-link">
                          <i class="fas fa-terminal"></i>
                          <p>Customer's Revenue</p>
                        </router-link>
                      </li>
                      <li class="nav-item has-treeview">
                        <router-link to="developer" class="nav-link">
                          <i class="fas fa-terminal"></i>
                          <p>Accout Reports</p>
                        </router-link>
                      </li>
                    </ul>
                  </li>
                @elseif (auth()->User()->type === 'author')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-cogs"></i>
                      <p>
                          Reports
                        <i class="right fa fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                       <!-- User is manager or admin-->
                       <li class="nav-item has-treeview">
                          <router-link to="/salesReport" class="nav-link">
                              <i class=" fas fa-users"></i>
                            <p>
                              Sales Reports
                            </p>
                          </router-link>
                      </li>

                    <li class="nav-item has-treeview">
                      <router-link to="developer" class="nav-link">
                        <i class="fas fa-terminal"></i>
                        <p>Statistics</p>
                      </router-link>
                    </li>
                    </ul>
                  </li>
                  @else
                @endif
            <!--IF STATEMENTS FOR ADMIN AND MANAGER -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class=" nav-icon fas fa-power-off"></i>
                              <p>
                                {{ __('Logout') }}
                              </p>
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <router-view></router-view>

        <vue-progress-bar></vue-progress-bar>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-block-down">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@auth
<script>
  window.user = @json(auth()->user());
</script>
@endauth
<script src="{{ asset('js/app.js') }}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.6.3/js/all.js" integrity="sha384-EIHISlAOj4zgYieurP0SdoiBYfGJKkgWedPHH4jCzpCXLmzVsw1ouK59MuUtP4a1" crossorigin="anonymous"></script>
</body>
</html>
