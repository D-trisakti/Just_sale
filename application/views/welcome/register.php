  <div class="page-header clear-filter" filter-color="orange">
        <div class="page-header-image" data-parallax="true"
              style="background-image:url(<?=base_url();?>/assets/img/bg1.jpg)">
        </div>
        <?php echo form_open_multipart('welcome/register');?>
        <div class="card-warpper">
              <div class="container">
                    <div class="card-body">
                          <h2 class="title">Halaman Pendaftaran</h2>
                          <hr>
                          <div class="form-row">
                                <!-- form nama depan -->
                                <div class="form-group col-sm-6">
                                      <div class="card-body">
                                            <Label class="col col-label text-left">
                                                  <h6>Nama Depan</h6>
                                            </Label>
                                            <div class="input-group no-border input-lg">
                                                  <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                              <i class="fas fa-user"></i>
                                                        </span>
                                                  </div>
                                                  <input type="text" class="form-control" placeholder="Nama Depan"
                                                        name="nama_depan" value="<?= set_value ('nama_depan');?>">
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
                                                  <input type="text" placeholder="Nama Belakang" class="form-control"
                                                        name="nama_belakang" value="<?= set_value ('nama_belakang');?>">
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
                                                        name="email" value="<?= set_value ('email');?>">
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
                                                        name="notelepon" value="<?= set_value ('notelepon');?>">
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
                                                        name="alamat" value="<?= set_value ('alamat');?>">
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
                                                        name="kode_pos" value="<?= set_value ('kode_pos');?>">
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
                                                        <option value="">Pilih provinsi</option>
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
                                                        <option value="">Pilih kabupaten/ Kota</option>
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
                                                        <option value="">Pilih kecamatan</option>
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
                                                        <option value="">Pilih Kelurahan</option>
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
                                                        name="TTL" value="<?= set_value ('TTL');?>">
                                            </div>
                                            <?= form_error('TTL','<h6 class ="text-danger pl-3">','</h6>'); ?>
                                      </div>
                                </div>
                                <!-- form password -->
                                <div class="form-group col-sm-4">
                                      <div class="card-body">
                                            <Label class="col col-label text-left">
                                                  <h6>Kata Sandi</h6>
                                            </Label>
                                            <div class="input-group no-border input-lg">
                                                  <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                              <i class="fas fa-unlock"></i>
                                                        </span>
                                                  </div>
                                                  <input type="password" placeholder="Kata Sandi" class="form-control"
                                                        name="password">
                                            </div>
                                            <?= form_error('password','<h6 class ="text-danger pl-3">','</h6>'); ?>
                                      </div>
                                </div>
                                <!-- form password konfirmasi-->
                                <div class="form-group col-sm-4">
                                      <div class="card-body">
                                            <Label class="col col-label text-left">
                                                  <h6>Konfirmasi kata sandi</h6>
                                            </Label>
                                            <div class="input-group no-border input-lg">
                                                  <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                              <i class="fas fa-unlock-alt"></i>
                                                        </span>
                                                  </div>
                                                  <input type="password" placeholder="Konfirmasi ulang Kata sandi"
                                                        class="form-control" name="password_konfirmasi">
                                            </div>
                                            <?= form_error('password_konfirmasi','<h6 class ="text-danger pl-3">','</h6>'); ?>
                                      </div>
                                </div>
                          </div>
                          <div class="text-center">
                                <div class="col-md-4 ml-auto mr-auto text-center">
                                      <button class="btn btn-primary btn-round btn-lg btn-block btn-submit"
                                            value="submit">Daftar</button>
                                      </form>
                                      <div class="pull-left ">
                                            <h6 class=> Sudah memiliki akun ?
                                                  <a href="<?= base_url();?>welcome/login" class="link">Masuk
                                                        disini</a>
                                            </h6>
                                      </div>
                                </div>
                          </div>

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
                              '     <option value="">Pilih kabupaten/ Kota</option>';
                        var i;
                        for (i = 0; i < data.length; i++) {
                              html += '<option  value="' + data[
                                          i]
                                    .id_kabkota + '">' + data[i]
                                    .nama_kabkota +
                                    '</option>';
                        }
                        $('#kota').html(html);

                  }
            });
      });

      $('#kota').change(function() {
            var id = $(this).val();
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
                        var html =
                              '     <option value="">Pilih kecamatan</option>';
                        var i;
                        for (i = 0; i < data.length; i++) {

                              html += '<option  value="' + data[
                                          i]
                                    .id_kecamatan + '">' + data[
                                          i]
                                    .nama_kecamatan +
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
                        var html =
                              '     <option value="">Pilih kelurahan</option>';
                        var i;
                        for (i = 0; i < data.length; i++) {

                              html += '<option  value="' + data[
                                          i]
                                    .id_kelurahan + '">' + data[
                                          i]
                                    .nama_kelurahan +
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