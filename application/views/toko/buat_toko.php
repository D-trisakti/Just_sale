<div class="page-header clear-filter" filter-color="orange">
      <div class="page-header-image" data-parallax="true"
            style="background-image:url(<?=base_url();?>/assets/img/bg1.jpg)">
      </div>
      <?php echo form_open_multipart('welcome/register');?>
      <div class="card-warpper">
            <div class="container">
                  <div class="card-body">
                        <h2 class="title">Buat Toko</h2>
                        <hr>
                        <div class="form-row">
                              <!-- form nama toko -->
                              <div class="form-group col-sm-6">
                                    <div class="card-body">
                                          <Label class="col col-label text-left">
                                                <h6>Nama Toko</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <i class="fas fa-user"></i>
                                                      </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Nama Toko"
                                                      name="nama_toko" value="<?= set_value ('nama_toko');?>" required>
                                          </div>
                                          <?= form_error('nama_toko','<h6 class ="text-danger pl-3">','</h6>'); ?>
                                    </div>
                              </div>

                              <div class="form-group col-sm-6">
                                    <div class="card-body">
                                          <Label class="col col-label text-left">
                                                <h6>Deskripsi Toko</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg">
                                                <textarea class="form-control" placeholder="Deskripsi Toko"
                                                      name="deskripsi toko" value="<?= set_value ('deskripsi_toko');?>"
                                                      row="2" required></textarea>
                                          </div>
                                          <?= form_error('nama_toko','<h6 class ="text-danger pl-3">','</h6>'); ?>
                                    </div>
                              </div>
                              <div class="form-group col-sm-6 mt-4">
                                    <div class="card-body">
                                          <div class="input-group">
                                                <div class="input-group-prepend">

                                                      <span class="col col-label text-left mt-2"
                                                            id="inputGroupFileAddon01">
                                                            <h6>Logo Toko</h6>
                                                      </span>
                                                </div>
                                                <div class="custom-file">
                                                      <input type="file" class="form-control" id="image" name="image"
                                                            accept=".png, .jpg, .jpeg" onchange="loadFile(event)">
                                                      <label class="custom-file-label text-left"
                                                            for="inputGroupFile01">Pilih
                                                            File</label>
                                                </div>
                                          </div>
                                          <?= form_error('nama_toko','<h6 class ="text-danger pl-3">','</h6>'); ?>
                                    </div>
                              </div>
                              <div class="form-group col-sm-3">
                                    <div class="container">
                                          <div class="photo-container">
                                                <img width="350" height="auto" id="output" class="rounded" />
                                                <script>
                                                var loadFile = function(event) {
                                                      var reader = new FileReader();
                                                      reader.onload = function() {
                                                            var output = document.getElementById('output');
                                                            output.src = reader.result;
                                                      };
                                                      reader.readAsDataURL(event.target.files[0]);
                                                };
                                                </script>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <div class="text-center">
                              <div class="col-md-4 ml-auto mr-auto text-center">
                                    <button class="btn btn-primary btn-round btn-lg btn-block btn-submit"
                                          value="submit">Buat Toko</button>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
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