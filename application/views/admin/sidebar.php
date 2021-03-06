<body id="page-top">

      <!-- Page Wrapper -->
      <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

                  <!-- Sidebar - Brand -->
                  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>admin">
                        <div class="sidebar-brand-icon ">
                              <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3">Admin </div>
                  </a>

                  <!-- Divider -->
                  <hr class="sidebar-divider my-0">

                  <!-- Nav Item - Dashboard -->
                  <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url(); ?>admin/dashboard">
                              <i class="fas fa-fw fa-tachometer-alt"></i>
                              <span>Dashboard</span></a>
                  </li>

                  <!-- Divider -->
                  <hr class="sidebar-divider">

                  <!-- Heading -->
                  <div class="sidebar-heading">
                        Kelola
                  </div>

                  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                              <i class="fas fa-tshirt"></i>
                              <span>Pengguna</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                              <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item" href="<?= base_url(); ?>admin/user">Kelola user</a>
                                    <a class="collapse-item" href="<?= base_url(); ?>admin/user_not_active">Pengguna
                                          Non-aktif</a>
                                    <!-- <a class="collapse-item" href="cards.html">Supplier</a> -->
                              </div>
                        </div>
                  </li>

                  <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseorder" aria-expanded="true" aria-controls="collapseTwo">
                              <i class="fas fa-fw fa-chart-area"></i>
                              <span>Toko</span>
                        </a>
                        <div id="collapseorder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                              <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item" href="<?= base_url(); ?>admin/toko">Kelola Toko</a>
                                    <a class="collapse-item" href="<?= base_url(); ?>admin/toko_nonaktif">Kelola Toko
                                          Non-aktif</a>
                                    <a class="collapse-item" href="<?= base_url(); ?>admin/product">Kelola Produk</a>
                                    <!-- <a class="collapse-item" href="cards.html">Supplier</a> -->
                              </div>
                        </div>
                  </li>

                  <!-- Nav Item - Utilities Collapse Menu -->
                  <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                              <i class="far fa-file-excel"></i>
                              <span>Transaksi</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                              <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item" href="<?= base_url(); ?>admin/transaksi">Kelola
                                          Pemesanan</a>
                                    <a class="collapse-item" href="<?= base_url(); ?>admin/payment">Kelola
                                          Payment</a>
                                    <a class="collapse-item" href="<?= base_url(); ?>admin/riwayat">Riwayat
                                          Transaksi</a>
                              </div>
                        </div>
                  </li>

                  <!-- Divider -->
                  <hr class="sidebar-divider">

                  <!-- Heading -->
                  <div class="sidebar-heading">
                        Pengaturan
                  </div>

                  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                              <i class="fas fa-users"></i>
                              <span>Laporan</span>
                        </a>
                        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                              <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Kelola:</h6>
                                    <a class="collapse-item" href="<?= base_url('admin/user'); ?>">Penyalahgunaan
                                          akun</a>
                                    <a class="collapse-item" href="<?= base_url('admin/pegawai'); ?>">Iklan palsu</a>
                                    <a class="collapse-item" href="<?= base_url('admin/pegawai'); ?>">Lainnya</a>

                              </div>
                        </div>
                  </li>
                  <!-- Divider -->
                  <hr class="sidebar-divider d-none d-md-block">

                  <!-- Sidebar Toggler (Sidebar) -->
                  <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                  </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                  <!-- Main Content -->
                  <div id="content">

                        <!-- Topbar -->
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top">

                              <!-- Sidebar Toggle (Topbar) -->
                              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                    <i class="fa fa-bars"></i>
                              </button>
                              <ul class="navbar-nav ml-auto">


                                    <!-- <li class="nav-item dropdown no-arrow mx-1">
                                          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-bell fa-fw"></i>
                                          
                                                <span class="badge badge-danger badge-counter">+</span>
                                          </a>
                                          
                                          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                                aria-labelledby="alertsDropdown">
                                                <h6 class="dropdown-header">
                                                      Pemberitahuan Pesanan
                                                </h6>

                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                      <div class="mr-3">
                                                            <div class="icon-circle bg-success">
                                                                  <i class="fas fa-donate text-white"></i>
                                                            </div>
                                                      </div>
                                                      <div>
                                                            <div class="small text-gray-500"></div>
                                                            Pemesanan Dengan Nomor
                                                      </div>
                                                </a>

                                                <a class="dropdown-item text-center small text-gray-500"
                                                      href="<?= base_url(); ?>transaksi">Lihat Semua Pesanan</a>
                                          </div>
                                    </li>
                                    <div class="topbar-divider d-none d-sm-block"></div> -->

                                    <!-- Nav Item - User Information -->
                                    <li class="nav-item dropdown no-arrow">
                                          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                                <h5>Admin</h5>
                                          </a>
                                          <!-- Dropdown - User Information -->
                                          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                                <!-- <a class="dropdown-item" href="<?= base_url(); ?>admin/edit_profile">
                                                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                      Profile
                                                </a> -->
                                                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                                                <div class="dropdown"></div>
                                                <a class="dropdown-item" href="<?= base_url('admin/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                                                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                      Logout
                                                </a>
                                          </div>
                                    </li>

                              </ul>

                        </nav>
                        <!-- End of Topbar -->
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                              <!-- Page Heading -->
                              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 text-gray-800"></h1>
                              </div>