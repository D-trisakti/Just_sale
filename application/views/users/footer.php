<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin akan logout ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">x</span>
                        </button>
                  </div>
                  <div class="modal-body">Pilih "Logout" Jika anda siap mengakhiri sesi ini.</div>
                  <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                        <a class="btn btn-primary" href="<?= base_url('users/logout') ?>">Logout</a>
                  </div>
            </div>
      </div>
</div>
<footer class="footer footer-default">
      <div class="container">
            <nav class="float-left">
                  <ul>
                        <li>
                              <a href="https://www.creative-tim.com/">
                                    Creative Tim
                              </a>
                        </li>
                        <li>
                              <a href="https://www.creative-tim.com/presentation">
                                    About Us
                              </a>
                        </li>
                        <li>
                              <a href="https://www.creative-tim.com/blog">
                                    Blog
                              </a>
                        </li>
                        <li>
                              <a href="https://www.creative-tim.com/license">
                                    Licenses
                              </a>
                        </li>
                  </ul>
            </nav>
            <div class="copyright float-right">
                  &copy;
                  <script>
                  document.write(new Date().getFullYear())
                  </script>, made with <i class="material-icons">favorite</i> by
                  <a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a> for a better web.
            </div>
      </div>
</footer>
<!--   Core JS Files   -->
<script src="<?= base_url(); ?>assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="<?= base_url(); ?>assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?= base_url(); ?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url(); ?>assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
</body>

</html>