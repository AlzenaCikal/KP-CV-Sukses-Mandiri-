<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SUKSES MANDIRI TEKNIK</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('./foto/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
  <style>


  .main-content {
    margin-left: 0;
    overflow-x: auto;
    min-height: 100vh;
  }

  @media (min-width: 992px) {
    .main-content {
      margin-left: 250px; /* Lebar sidebar */
    }
  }

  .app-header {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1030;
}

.body-wrapper {
  margin-top: 70px; /* Sesuaikan dengan tinggi header */
}

.left-sidebar {
  margin-top: -70px;

}

  
</style>
  
</head>

<body>
  

  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!--  App Topstrip -->
    
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="{{ asset('foto/logos/logo.svg') }}" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->
            <li class="sidebar-item">
              <a class="sidebar-link justify-content-between"
                href="{{ route('transactions') }}">
                <div class="d-flex align-items-center gap-3">
                  <span class="d-flex">
                    <i class="ti ti-aperture"></i>
                  </span>
                  <span class="hide-menu">Transactions</span>

      </div>

      </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link justify-content-between"
          href="{{ route('services') }}" aria-expanded="false">
          <div class="d-flex align-items-center gap-3">
            <span class="d-flex">
              <i class="ti ti-shopping-cart"></i>
            </span>
            <span class="hide-menu">Services</span>
          </div>

        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link justify-content-between has-arrow"  aria-expanded="false">
          <div class="d-flex align-items-center gap-3">
            <span class="d-flex">
              <i class="ti ti-layout-grid"></i>
            </span>
            <span class="hide-menu">Front Pages</span>
          </div>

        </a>
        <ul aria-expanded="false" class="collapse first-level">
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between " href="{{ route('laporan') }}"
              href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Homepage</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">About Us</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Blog</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Blog Details</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Contact Us</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Portfolio</span>
              </div>

            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between"
              href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Pricing</span>
              </div>

            </a>
          </li>
        </ul>
      </li>

      <li>
        <span class="sidebar-divider lg"></span>
      </li>
      <li class="nav-small-cap">
        <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
      </li>
      </ul>
      </nav>
      <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->
  <!--  Main wrapper -->
  <div class="body-wrapper">
    <!--  Header Start -->
      
    <header class="app-header">
      <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item d-block d-xl-none">
            <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-bell"></i>
              <div class="notification bg-primary rounded-circle"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
              <div class="message-body">
                <a href="javascript:void(0)" class="dropdown-item">
                  Item 1
                </a>
                <a href="javascript:void(0)" class="dropdown-item">
                  Item 2
                </a>
              </div>
            </div>
          </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

            <li class="nav-item dropdown">
              <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="{{ asset('./foto/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                <div class="message-body">
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-user fs-6"></i>
                    <p class="mb-0 fs-3">My Profile</p>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-mail fs-6"></i>
                    <p class="mb-0 fs-3">My Account</p>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-list-check fs-6"></i>
                    <p class="mb-0 fs-3">My Task</p>
                  </a>
                  <a href="{{ route('login') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!--  Header End -->
   @yield('content')
  </div>

  </div>
  <script src="libs/jquery/dist/jquery.min.js"></script>
  <script src="libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/sidebarmenu.js"></script>
  <script src="js/app.min.js"></script>
  <script src="libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="libs/simplebar/dist/simplebar.js"></script>
  <script src="js/dashboard.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>


  <div class="content">
        <!-- @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif -->

        
</div>

  
 