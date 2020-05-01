<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
      <link rel="icon" type="image/png" href="../assets/img/favicon.png">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>
            Now UI Kit by Creative Tim
      </title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
            name='viewport' />
      <!--     Fonts and icons     -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      <link rel="stylesheet" href="<?= base_url();?>assets/css/all.css">
      <!-- integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
      <!-- CSS Files -->
      <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
      <!-- <link href="<?= base_url();?>assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" /> -->
      <link href="<?= base_url();?>assets/css/material-kit.css" rel="stylesheet" />
</head>

<body class="landing-page sidebar-collapse">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg bg-info fixed-top navbar-transparent " color-on-scroll="400">
            <div class="container">
                  <div class="navbar-translate">
                        <a class="navbar-brand" href="<?= base_url();?>welcome/">
                              Just Sale
                        </a>
                  </div>
                  <div class="collapse navbar-collapse justify-content-end" id="navigation"
                        data-nav-image="../assets/img/blurred-image-1.jpg">
                        <ul class="navbar-nav">
                              <li class="nav-item ">
                                    <a class="nav-link" href="<?= base_url();?>welcome/catalog">Katalog</a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url();?>users">Profile</a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                                          Keluar
                                    </a>
                              </li>
                        </ul>
                  </div>
            </div>
      </nav>
      <!-- End Navbar -->