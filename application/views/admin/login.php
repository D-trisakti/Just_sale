<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8" />
      <link rel="store-icon" sizes="64x64" href="<?= base_url('assets/img/store-icon.png') ?>">
      <!-- Icons made by www.flaticon.com/authors/freepik -->
      <link rel="icon" type="image/png" href="<?= base_url('assets/img/store-icon.png') ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>Tria Anugerah Shop</title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=yes'
            name='viewport' />
      <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
      <!-- CSS Files -->
      <link href="<?= base_url('assets/css/material-kit.css?v=2.0.6'); ?>" rel="stylesheet" />
</head>
<div class="page-header header-filter" style="background-image: url(<?=base_url();?>/assets/img/bg7.jpg)">
      <div class="container">
            <br><br>
            <h2 class="title text-center md-5">Hello Admin !</h2>
            <?= $this -> session -> flashdata('pesan');?>
            <div class="rows">
                  <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                        <div class="container">
                              <div class="card card-login">
                                    <form class="form" method="post" action="<?= base_url('admin/admin_login');?>">
                                          <div class="card-header card-header-primary text-center">
                                                <h4 class="card-title">Sign In</h4>
                                          </div>
                                          <div class="card-body">
                                                <div class="input-group">
                                                      <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                  <i class="material-icons">people</i>
                                                            </span>
                                                      </div>
                                                      <input type="text" id="username" name="username"
                                                            class="form-control" placeholder="Username"
                                                            value="<?= set_value ('username');?>" required>
                                                </div>
                                                <?= form_error('username','<small class ="text-danger">','</small>');?>
                                                <div class="input-group">
                                                      <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                  <i class="material-icons">lock_outline</i>
                                                            </span>
                                                      </div>
                                                      <input type="password" id="password" name="password"
                                                            class="form-control" placeholder="Password..."
                                                            value="<?= set_value ('email');?>" required>
                                                </div>
                                                <?= form_error('password','<small class ="text-danger">','</small>');?>
                                          </div>
                                          <div class="footer text-center">
                                                <button type="submit" class="btn btn-primary btn-round"
                                                      value="submit">Login</button>
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<footer class="footer footer-default fix-bottom">
      <div class="container">
            <nav class="float-center">
                  <ul>
                        <li>
                              <h4>
                                    &copy;<script>
                                    document.write(new Date().getFullYear())
                                    </script>
                                    Created By Creative Tim & Designed By D_Rector's
                              </h4>
                        </li>
                  </ul>
            </nav>
      </div>
</footer>
<!--   Core JS Files   -->
<script src="<?= base_url('assets/js/core/jquery.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/core/popper.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/core/bootstrap-material-design.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/plugins/moment.min.js') ?>"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="<?= base_url('assets/js/plugins/bootstrap-datetimepicker.js') ?>" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?= base_url('assets/js/plugins/nouislider.min.js') ?>" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url('assets/js/material-kit.js?v=2.0.6') ?>" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
</body>

</html>