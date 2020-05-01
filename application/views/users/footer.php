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
                        <a class="btn btn-primary" href="<?=base_url('users/logout')?>">Logout</a>
                  </div>
            </div>
      </div>
</div>
<footer class="footer footer-center">
      <div class=" container ">
            <nav>
                  <ul>
                        <li>
                              <a href="http://presentation.creative-tim.com">
                                    About Us
                              </a>
                        </li>
                        <li>
                              <a href="http://blog.creative-tim.com">
                                    Contact Us
                              </a>
                        </li>
                  </ul>
            </nav>
            <div class="copyright text-center" id="copyright">
                  &copy;
                  <script>
                  document.getElementById('copyright').appendChild(document.createTextNode(
                        new Date().getFullYear()))
                  </script>, Designed by
                  <h6>Deny Trisakti</h6>
            </div>
      </div>
</footer>
</div>
<!--   Core JS Files   -->
<script src="<?= base_url();?>assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?= base_url();?>assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?= base_url();?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="<?= base_url();?>assets/js/plugins/bootstrap-datepicker.js" type="text/javascript">
</script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url();?>assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
<!-- font awsome plugin -->
<script src="<?= base_url();?>assets/js/all.js" type="text/javascript"></script>
</body>

</html>