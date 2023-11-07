<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('./sidebar/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  </head>
  <body>
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar" class="active">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
        </div>
        <div class="p-4">
          <h1><a href="{{ route('home') }}" class="logo">Cloud Movie</a></h1>
          <ul class="list-unstyled components mb-5">
            <li class="active">
              <a href="{{ route('admin.dashboard') }}"><span class="fa fa-home mr-3"></span>Dashboard</a>
            </li>
            <li>
              <a href="{{ route('category-admin.index') }}"><span class="fa fa-user mr-3"></span>Kategori</a>
            </li>
            <li>
              <a href="{{ route('genre-admin.index') }}"><span class="fa fa-briefcase mr-3"></span>Genre</a>
            </li>
            <li>
              <a href="{{ route('link-admin.index') }}"><span class="fa fa-sticky-note mr-3"></span>Link</a>
            </li>
            <li>
              <a href="{{ route('role-admin.index') }}"><span class="fa fa-paper-plane mr-3"></span>Movie</a>
            </li>
            <li>
              <a href="{{ route('contact-admin.index') }}"><span class="fa fa-briefcase mr-3"></span>Contact</a>
            </li>
            <li>
              <a href="{{ route('user-admin.index') }}"><span class="fa fa-user mr-3"></span>Role</a>
            </li>
            <li>
              <a href="{{ route('user-admin.index') }}"><span class="fa fa-user mr-3"></span>Manage User</a>
            </li>
            <li>
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="fa fa-sign-out mr-3"></span>Logout
              </a>
            </li>
          </ul>
          <div class="footer">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <i class="icon-heart" aria-hidden="true"></i> by <a href="https://cloud-movie.xenulis.my.id" target="_blank">Cloud Movie</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </nav>
      <!-- Page Content  -->
      @yield('content')
    </div>
    @stack('before-script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('./sidebar/js/popper.js') }}"></script>
    <script src="{{ asset('./sidebar/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('./sidebar/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js') }}"></script>
    @stack('after-script')
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </body>
</html>
