<script src="<?= base_url(); ?>assets/js/core/jquery.min.js" type="text/javascript"></script>
<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="card card-nav-tabs">
            <div class="card-header card-header-primary">
                  <h3 class="card-title text-center">Edit Toko</h3>
                  <form action="<?= base_url('toko/edit_toko_process'); ?>" method="post" id="form">
                        <input type="hidden" name="id" value="<?= $toko['id_toko']; ?>">
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
                                                <input type="text" class="form-control" placeholder="Nama Depan" name="nama_toko" value="<?= $toko['nama_toko']; ?>">
                                          </div>
                                          <?= form_error('nama_depan', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
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
                                                <textarea placeholder="Deskripsi_toko" class="form-control" name="Deskripsi_toko" row="2"><?= $toko['deskripsi_toko']; ?></textarea>
                                          </div>
                                          <?= form_error('nama_belakang', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
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
                                                <input type="number" placeholder="Nomor Telepon" class="form-control" name="notelepon" value="<?= $toko['phone']; ?>">
                                          </div>
                                          <?= form_error('notelepon', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                                    </div>
                              </div>
                              <div class="col-sm-6">
                                    <label for="alamat">alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $user['address']; ?>">
                                    <label for="kode_pos">Provinsi</label>
                                    <select class="form-control" id="provinsi" name="provinsi">
                                          <option value="<?= $city->province_id ?>"><?= $city->province ?></option>
                                          <?php
                                          for ($i = 0; $i < count($api_province); $i++) : ?>
                                                <option value="<?= $api_province[$i]->province_id ?>">
                                                      <?= $api_province[$i]->province ?></option>
                                          <?php
                                          endfor;
                                          ?>
                                    </select>
                              </div>
                              <div class="col-sm-2">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="number" class="form-control" readonly name="kode_pos" id="kode_pos" value="<?= $city->postal_code ?>">
                                    <label for="kota">Kota/Kabupaten</label>
                                    <select class="form-control kota" id="kota" name="kota">
                                          <option value="<?= $city->city_id ?>"><?= $city->type ?> <?= $city->city_name ?></option>
                                    </select>
                              </div>
                        </div>
                        <div class="text-center">
                              <div class="col-md-4 ml-auto mr-auto text-center">
                                    <button class="btn btn-primary btn-round btn-lg btn-block btn-submit" type="button" onclick="submit()">Update Data Toko</button>
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
<script>
      $('#provinsi').change(function() {
            var province_id = $(this).val();
            $.ajax({
                  url: " <?= base_url('toko/get_kota ') ?>",
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
            console.log(postal_code);
            $('#kode_pos').val(postal_code);
      });

      function submit() {
            $("#form").submit();
      }
</script>
</body>

</html>