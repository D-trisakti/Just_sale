<div class="page-header header-filter" data-parallax="true"
      style="background-image: url('<?= base_url();?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="card card-nav-tabs">
            <div class="card-header card-header-primary">
                  <h3 class="card-title text-center">Buat Toko</h3>
            </div>
            <div class="container">
                  <div class="card-body">
                        <div class="form-row">
                              <!-- form nama depan -->
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
                                                <input type="text" class="form-control" placeholder="Nama Depan"
                                                      name="nama_toko" value="<?= set_value ('nama_toko');?>">
                                          </div>
                                          <?= form_error('nama_depan','<h6 class ="text-danger pl-3">','</h6>'); ?>
                                    </div>
                              </div>
                              <!-- form nama belakang -->
                              <div class="form-group col-sm-6">
                                    <div class="card-body">
                                          <Label class="col col-label text-left">
                                                <h6>Nama Belakang</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <i class="fas fa-user"></i>
                                                      </span>
                                                </div>
                                                <textarea placeholder="Deskripsi_toko" class="form-control"
                                                      name="Deskripsi_toko" value="<?=set_value('deskripsi_toko');?>"
                                                      row="2"></textarea>
                                          </div>
                                          <?= form_error('nama_belakang','<h6 class ="text-danger pl-3">','</h6>'); ?>
                                    </div>
                              </div>
                              <!-- form email -->
                              <div class=" form-group col-sm-8">
                                    <div class="card-body">
                                          <Label class="col col-label text-left">
                                                <h6>Email</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                      </span>
                                                </div>
                                                <input type="email" placeholder="Email Anda" class="form-control"
                                                      name="email" value="<?= $user['email'];?>" readonly>
                                          </div>
                                          <?= form_error('email','<h6 class ="text-danger pl-3">','</h6>'); ?>
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
                                                <input type="number" placeholder="Nomor Telepon" class="form-control"
                                                      name="notelepon" value="<?=$user['phone'];?>">
                                          </div>
                                          <?= form_error('notelepon','<h6 class ="text-danger pl-3">','</h6>'); ?>
                                    </div>
                              </div>
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
                                                <input type="text" placeholder="Alamat" class="form-control"
                                                      name="alamat" value="<?= $user['address'];?>">
                                          </div>
                                          <?= form_error('alamat','<h6 class ="text-danger pl-3">','</h6>'); ?>
                                    </div>
                              </div>
                              <!-- form-kode pos -->
                              <div class="form-group col-sm-4">
                                    <div class="card-body">
                                          <Label class="col col-label text-left">
                                                <h6>Kode Pos</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <i class="fab fa-usps"></i>
                                                      </span>
                                                </div>
                                                <input type="number" placeholder="Kode Pos" class="form-control"
                                                      name="kode_pos" value="<?= $user['postal_code'];?>">
                                          </div>
                                          <?= form_error('kode_pos','<h6 class ="text-danger pl-3">','</h6>'); ?>
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
                                                <select class="form-control" id="provinsi" name="provinsi" required>
                                                      <option value="<?= $user['provinsi'];?>">
                                                            <?= $prov_name['nama'];?>
                                                      </option>
                                                      <?php foreach ($province as $prov ): ?>
                                                      <option value="<?= $prov['id_propinsi'];?>">
                                                            <?= $prov['nama_propinsi'];?>
                                                      </option>
                                                      <?php endforeach ?>


                                                </select>
                                          </div>
                                    </div>
                                    <?= form_error('provinsis','<h6 class ="text-danger pl-3">','</h6>'); ?>
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
                                                      <option value="<?= $user['kota'];?>"><?= $kota_name['nama'];?>
                                                      </option>
                                                </select>
                                          </div>
                                    </div>
                                    <?= form_error('kotas','<h6 class ="text-danger pl-3">','</h6>'); ?>
                              </div>
                              <!-- form-kecamatan -->
                              <div class="form-group col-sm-3">
                                    <div class="card-body">
                                          <Label class="col col-label text-left" for="kecamatan">
                                                <h6>kecamatan</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <i class="fas fa-map-marked-alt"></i>
                                                      </span>
                                                </div>
                                                <select class="form-control" id="kecamatan" name="kecamatan" required>
                                                      <option value="<?= $user['kecamatan'];?>">
                                                            <?= $kecamatan_name['nama'];?>
                                                      </option>
                                                </select>
                                          </div>
                                    </div>
                                    <?= form_error('kecamatan','<h6 class ="text-danger pl-3">','</h6>'); ?>
                              </div>
                              <!-- form-kelurahan -->
                              <div class="form-group col-sm-3">
                                    <div class="card-body">
                                          <Label class="col col-label text-left" for="kelurahan">
                                                <h6>Kelurahan</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <i class="fas fa-map-marker"></i>
                                                      </span>
                                                </div>
                                                <select class="form-control" id="kelurahan" name="kelurahan" required>
                                                      <option value="<?= $user['kelurahan'];?>">
                                                            <?= $kelurahan_name['nama'];?>
                                                      </option>
                                                </select>
                                          </div>
                                    </div>
                                    <?= form_error('kelurahan','<h6 class ="text-danger pl-3">','</h6>'); ?>
                              </div>
                              <!-- form TTL -->
                              <div class="form-group col-sm-3">
                                    <div class="card-body">
                                          <Label class="col col-label text-left">
                                                <h6>Tanggal Lahir</h6>
                                          </Label>
                                          <div class="input-group no-border input-lg">
                                                <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                            <i class="fas fa-birthday-cake"></i>
                                                      </span>
                                                </div>
                                                <input type="date" placeholder="Tanggal lahir" class="form-control"
                                                      name="TTL" value="<?= $user['TTL'];?>">
                                          </div>
                                          <?= form_error('TTL','<h6 class ="text-danger pl-3">','</h6>'); ?>
                                    </div>
                              </div>
                              <!-- form password -->

                        </div>
                        <div class="text-center">
                              <div class="col-md-4 ml-auto mr-auto text-center">
                                    <button class="btn btn-primary btn-round btn-lg btn-block btn-submit"
                                          value="submit">Update Data</button>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>

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
                                    <button class="btn btn-secondary" type="button"
                                          data-dismiss="modal">Kembali</button>
                                    <a class="btn btn-primary" href="<?=base_url('users/logout')?>">Logout</a>
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
            <script src="<?= base_url();?>assets/js/core/jquery.min.js" type="text/javascript"></script>
            <script src="<?= base_url();?>assets/js/core/popper.min.js" type="text/javascript"></script>
            <script src="<?= base_url();?>assets/js/core/bootstrap-material-design.min.js" type="text/javascript">
            </script>
            <script src="<?= base_url();?>assets/js/plugins/moment.min.js"></script>
            <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
            <script src="<?= base_url();?>assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript">
            </script>
            <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
            <script src="<?= base_url();?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
            <!--  Google Maps Plugin    -->
            <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
            <script src="<?= base_url();?>assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
            <script type="text/javascript">
            $(document).ready(function() {
                  $('#provinsi').change(function() {
                        var id = $(this).val();
                        $.ajax({
                              url: "<?php echo base_url();?>welcome/get_city",
                              method: "POST",
                              data: {
                                    id: id
                              },
                              async: false,
                              dataType: 'json',
                              success: function(data) {
                                    console.log(data);
                                    var html =
                                          ' <option value="">Pilih kabupaten/ Kota</option>';
                                    var i;
                                    for (i = 0; i < data.length; i++) {
                                          html += '<option  value="' + data[i]
                                                .id_kabkota + '">' + data[i]
                                                .nama_kabkota + '</option>';
                                    }
                                    $('#kota').html(html);
                              }
                        });
                  });
                  $('#kota').change(function() {
                        var
                              id = $(this).val();
                        $.ajax({
                              url: "<?php echo base_url();?>welcome/get_kecamatan",
                              method: "POST",
                              data: {
                                    id: id
                              },
                              async: false,
                              dataType: 'json',
                              success: function(data) {
                                    console.log(data);
                                    var
                                          html =
                                          '     <option value="">Pilih kecamatan</option>';
                                    var i;
                                    for (i = 0; i < data.length; i++) {
                                          html
                                                += '<option  value="' + data[
                                                      i].id_kecamatan + '">' +
                                                data[i].nama_kecamatan +
                                                '</option>';
                                    }
                                    $('#kecamatan').html(html);
                              }
                        });
                  });
                  $('#kecamatan').change(function() {
                        var id = $(this).val();
                        $.ajax({
                              url: "<?php echo base_url();?>welcome/get_kelurahan",
                              method: "POST",
                              data: {
                                    id: id
                              },
                              async: false,
                              dataType: 'json',
                              success: function(data) {
                                    console.log(data);
                                    var
                                          html =
                                          '     <option value="">Pilih kelurahan</option>';
                                    var i;
                                    for (i = 0; i < data.length; i++) {
                                          html
                                                += '<option  value="' + data[
                                                      i].id_kelurahan + '">' +
                                                data[i].nama_kelurahan +
                                                '</option>';
                                    }
                                    $('#kelurahan').html(html);
                              }
                        });
                  });
            });
            </script>
            </body>

            </html>