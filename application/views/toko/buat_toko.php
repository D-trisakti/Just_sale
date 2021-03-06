<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="card card-nav-tabs">
            <div class="card-header card-header-primary">
                  <h3 class="card-title text-center">Buat Toko</h3>
                  <form action="<?= base_url() ?>toko/create_toko" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
            </div>
            <div class="container">
                  <div class="card-body">
                        <div class="form-row">
                              <!-- form nama Toko -->
                              <div class="form-group col-sm-6">
                                    <div class="card-body">
                                          <Label class="col col-label text-left">
                                                <h6>Nama Toko</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg mt-4">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <i class="fas fa-user"></i>
                                                      </span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Nama Toko" name="nama_toko" value="<?= set_value('nama_toko'); ?>">
                                          </div>
                                          <?= form_error('nama_toko', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                                    </div>
                              </div>
                              <!-- form deskripsi toko -->
                              <div class="form-group col-sm-6">
                                    <div class="card-body">
                                          <Label class="col col-label text-left">
                                                <h6>Deskripsi toko</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <i class="fas fa-user"></i>
                                                      </span>
                                                </div>
                                                <textarea placeholder="Deskripsi_toko" class="form-control" name="Deskripsi_toko" value="<?= set_value('deskripsi_toko'); ?>" row="2"></textarea>
                                          </div>
                                          <?= form_error('Deskripsi_toko', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                                    </div>
                              </div>
                              <!-- form no telefon -->
                              <div class="form-group col-sm-4">
                                    <div class="card-body">
                                          <Label class="col col-label text-left">
                                                <h6>Nomor Telepon</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <i class="fas fa-phone-square-alt"></i>
                                                      </span>
                                                </div>
                                                <input type="number" placeholder="Nomor Telepon" class="form-control" name="notelepon" value="<?= set_value('notelepon'); ?>">
                                          </div>
                                          <?= form_error('notelepon', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                                    </div>
                              </div>
                              <!-- form-kode pos -->
                              <!-- <div class="form-group col-sm-6">
                                    <div class="card-body">
                                          <Label class="text-left">
                                                <h6>Kode Pos</h6>
                                          </Label>
                                          <input type="number" placeholder="Kode Pos" class="form-control" name="kode_pos" value="<?= set_value('kode_pos'); ?>">
                                          <?= form_error('kode_pos', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                                    </div>
                              </div> -->
                              <!-- form-alamat -->
                              <div class="form-group col-sm-8">
                                    <div class="card-body">
                                          <Label class="col col-label text-left">
                                                <h6>Alamat</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <i class="fas fa-home"></i>
                                                      </span>
                                                </div>
                                                <input type="text" placeholder="Alamat" class="form-control" name="alamat" value="<?= set_value('alamat'); ?>">
                                          </div>
                                          <?= form_error('alamat', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                                    </div>
                              </div>
                              <!-- form-provinsi -->
                              <div class="form-group col-sm-3">
                                    <div class="card-body">
                                          <Label class="col col-label text-left">
                                                <h6>Provinsi</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <i class="fas fa-map"></i>
                                                      </span>
                                                </div>
                                                <select class="form-control alamatp" id="provinsi" name="provinsi">
                                                      <option value="0">Pilih Provinsi</option>
                                                      <?php
                                                      for ($i = 0; $i < count($api_province); $i++) : ?>
                                                            <option value="<?= $api_province[$i]->province_id ?>">
                                                                  <?= $api_province[$i]->province ?></option>
                                                      <?php
                                                      endfor;
                                                      ?>
                                                </select>
                                          </div>
                                    </div>
                                    <?= form_error('provinsi', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                              </div>
                              <!-- form-kota -->
                              <div class="form-group col-sm-3">
                                    <div class="card-body">
                                          <Label class="col col-label text-left" for="kabupaten / kota">
                                                <h6>kabupaten/ Kota</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <i class="fas fa-map-marked"></i>
                                                      </span>
                                                </div>
                                                <select class="form-control kota" id="kota" name="kota" required>
                                                      <option value="">Pilih kabupaten/ Kota</option>
                                                </select>
                                          </div>
                                    </div>
                                    <?= form_error('kotas', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                              </div>
                              <div class="col-md-3">
                                    <label for="image">Gambar Produk</label>
                                    <input type='file' id="image" name="image" accept=".png, .jpg, .jpeg" onchange="loadFile(event)">
                              </div>
                              <div class="col-md-3">
                                    <div class="card bordered">
                                          <img width="350" height="auto" id="output" />
                                    </div>

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
                        <div class="text-center">
                              <div class="col-md-4 ml-auto mr-auto text-center">
                                    <button class="btn btn-primary btn-round btn-lg btn-block btn-submit" value="submit">Buat Toko</button>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<!-- Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<script src="<?= base_url(); ?>assets/js/core/bootstrap-material-design.min.js" type="text/javascript">
</script>
<script src="<?= base_url(); ?>assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="<?= base_url(); ?>assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript">
</script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="<?= base_url(); ?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url(); ?>assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>

<script type="text/javascript">
      $('#provinsi').change(function() {
            var province_id = $(this).val();
            $.ajax({
                  url: " <?= base_url('toko/get_kota') ?>",
                  method: "POST",
                  data: {
                        province_id: province_id
                  },
                  async: false,
                  dataType: 'json',
                  success: function(data) {
                        console.log(data);
                        var html =
                              '     <option value="">Pilih kota/kabupaten</option>';
                        var i;
                        for (i = 0; i < data.length; i++) {

                              html += '<option  value="' + data[i].city_id + '/' + data[i].postal_code + '">' + data[i].type + ' ' + data[i].city_name + '</option>';
                        }
                        $('#kota').html(html);

                  }
            });
      });

      $('#kota').change(function() {
            var id = $(this).val();
            id = id.split('/');
            var city_id = id[0];
            var postal_code = id[1];
            $('#kode_pos').val(postal_code);

      });
</script>
</body>

< /html>