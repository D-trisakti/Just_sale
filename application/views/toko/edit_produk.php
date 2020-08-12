<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <form action="" method="post">
                  <div class="container text-center">
                        <h3 class="title text-center">Edit Produk <?= $produk['nama_produk'] ?></h3>
                        <hr>
                        <div class="form-row ">
                              <!-- form nama -->
                              <div class="form-group col-md-4">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" value="<?= $produk['nama_produk'] ?>">
                                    <?= form_error('nama_produk', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                              </div>
                              <!-- form harga -->
                              <div class="form-group col-md-4">
                                    <label for="harga_produk">Harga Produk</label>
                                    <input type="text" class="form-control" id="harga_produk" name="harga_produk" placeholder="Harga Produk" value="<?= $produk['harga_produk'] ?>">
                                    <?= form_error('nama_produk', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                              </div>
                              <!-- form jumlah -->
                              <div class=" form-group col-md-4">
                                    <label for="Jumlah_produk">Jumlah produk</label>
                                    <input type="text" class="form-control" id="jumlah_produk" name="jumlah_produk" placeholder="Jumlah Produk" value="<?= $produk['jumlah_produk'] ?>">
                                    <?= form_error('nama_produk', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                              </div>
                              <!-- form kategori -->
                              <div class=" form-group col-md-2">
                                    <label for="kategori">kategori produk</label>
                                    <select type="text" class="form-control" id="Kategori" name="kategori" required value="<?= set_value('kategori') ?>">
                                          <option value="<?= $kategorisub['kategori'] ?>"><?= $kategorisub['nama_kategori'] ?></option>
                                          <?php foreach ($kategori as $kat) : ?>
                                                <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?>
                                                </option>
                                          <?php
                                          endforeach ?>
                                    </select>
                              </div>
                              <!-- form-sub-kategori -->
                              <div class="form-group col-md-2">
                                    <label for="subkategori"> sub -kategori produk</label>
                                    <select type="text" class="form-control" id="subkategori" name="subkategori">
                                          <option value="<?= $kategorisub['subkategori'] ?>"><?= $kategorisub['nama_sub_kategori'] ?></option>
                                    </select>
                              </div>
                              <!-- form-deskripsi-produk -->
                              <div class="form-group col-md-8">
                                    <label for="deskripsi_produk">Deskripsi Produk</label>
                                    <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" rows="3"><?= $produk['deskripsi_produk'] ?></textarea>
                                    <?= form_error('nama_produk', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                              </div>

                              <!-- <div class="col-md-4">
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
                              </div> -->
                              <!-- <div class="col-md-3">
                                    <label for="image">Gambar Produk</label>
                                    <input type='file' id="image" name="image" accept=".png, .jpg, .jpeg" onchange="loadFile(event)" required>
                              </div> -->
                              <input type="hidden" name="id_toko" value="<?= $produk['id_toko']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
            </form>
      </div>
</div>
</form>
</div>
</div>
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