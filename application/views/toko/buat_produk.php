<div class="page-header header-filter" data-parallax="true"
      style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container text-center">
                  <h3 class="title text-center">Tambah Produk </h3>
                  <hr>
                  <?= form_open_multipart('toko/create_produk'); ?>
                  <?= $this->session->flashdata('pesan'); ?>
                  <div class="form-row ">
                        <!-- form nama -->
                        <div class="form-group col-md-4">
                              <label for="nama_produk">Nama Produk</label>
                              <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                                    value="<?= set_value('nama_produk') ?>" required>
                              <?= form_error('nama_produk', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <!-- form harga -->
                        <div class="form-group col-md-4">
                              <label for="harga_produk">Harga Produk</label>
                              <input type="number" class="form-control" id="harga_produk" name="harga_produk"
                                    value="<?= set_value('harga_produk') ?>" required>
                              <?= form_error('harga_produk', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <!-- form jumlah -->
                        <div class="form-group col-md-4">
                              <label for="Jumlah_produk">Jumlah produk</label>
                              <input type="number" class="form-control" id="jumlah_produk" name="jumlah_produk"
                                    value="<?= set_value('jumlah_produk') ?>" required>
                              <?= form_error('jumlah_produk', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <!-- form kategori -->
                        <div class="form-group col-md-2">
                              <label for="kategori">kategori produk</label>
                              <select type="text" class="form-control" id="Kategori" name="kategori" required
                                    value="<?= set_value('kategori') ?>">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategori as $kat) : ?>
                                    <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?>
                                    </option>
                                    <?php
                                    endforeach ?>
                              </select>
                        </div>
                        <!-- form-sub-kategori -->
                        <div class="form-group col-md-2">
                              <label for="subkategori"> subkategori produk</label>
                              <select type="text" class="form-control" id="subkategori" name="subkategori" required
                                    value="<?= set_value('subkategori') ?>>
                                    <option value="">Pilih subkategori</option>
                              </select>
                        </div>
                        <div class=" form-group col-md-2">
                                    <label for="toko">Toko</label>
                                    <select type="text" class="form-control" id="toko" name="toko" required value="<?= set_value('toko') ?>>
                                    <option value="">Pilih Toko</option>
                                    <?php foreach ($toko as $toko) : ?>
                                    <option value=" <?= $toko['id_toko'] ?>"><?= $toko['nama_toko'] ?>
                                          </option>
                                          <?php
                                    endforeach ?>
                                    </select>
                        </div>
                        <!-- form-deskripsi-produk -->
                        <div class="form-group col-md-6">
                              <label for="deskripsi_produk">Deskripsi Produk</label>
                              <textarea class="form-control" id="deskripsi_produk" rows="3" name="deskripsi_produk"
                                    value="<?= set_value('deskripsi_produk') ?>"></textarea>
                        </div>

                        <div class="col-md-4">
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
                        <div class="col-md-3">
                              <label for="image">Gambar Produk</label>
                              <input type='file' id="image" name="image" accept=".png, .jpg, .jpeg"
                                    onchange="loadFile(event)">
                        </div>

                  </div>
                  <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>

            </div>
      </div>
      </form>
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
$(document).ready(function() {
      $('#Kategori').change(function() {
            var id = $(this).val();
            $.ajax({
                  url: "<?php echo base_url(); ?>toko/get_subkategori",
                  method: "POST",
                  data: {
                        id: id
                  },
                  async: false,
                  dataType: 'json',
                  success: function(data) {
                        console.log(data);
                        var html =
                              ' <option value="">Pilih Subkategori</option>';
                        var i;
                        for (i = 0; i < data
                              .length; i++) {
                              html +=
                                    '<option  value="' +
                                    data[i]
                                    .id_sub_kategori +
                                    '">' + data[
                                          i]
                                    .nama_sub_kategori +
                                    '</option>';
                        }
                        $('#subkategori').html(html);
                  }
            });
      });
});
</script>