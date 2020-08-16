<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <form action="" enctype="multipart/form-data" method="post">
                        <div class="row">
                              <div class="col-md">
                                    <div class="card">
                                          <div class="card-header card-header-primary">
                                                <h2 class="title text-center ">Tambah Produk</h2>
                                                <div class="row">
                                                      <div class="col-md-6">
                                                            <label for="nama" class="card-title">Nama Produk</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama') ?>" placeholder="Nama produk">
                                                            <input type="hidden" name='toko' value="<?= $this->uri->segment(3) ?>">
                                                            <label for="des" class="card-title">Deskripsi Produk</label>
                                                            <input type="text" class="form-control" id="des" name="des" value="<?= set_value('des') ?>" placeholder="Deskripsi produk">

                                                      </div>
                                                      <div class="col-md-6">
                                                            <label for="kategori" class="card-title">Kategori Produk</label>
                                                            <select name="kategori" id="Kategori" class="form-control">
                                                                  <option value="">Pilih Kategori</option>
                                                                  <?php foreach ($kategori as $k) {  ?>
                                                                        <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                                                                  <?php }  ?>
                                                            </select>
                                                            <label for="subkategori" class="card-title">Sub-Kategori Produk</label>
                                                            <select name="subkategori" id="subkategori" class="form-control">
                                                                  <option value="">Pilih Sub-kategori</option>
                                                            </select>
                                                      </div>
                                                      <div class="col- col-md-4">
                                                            <label for="stock" class="card-title">Gambar</label>
                                                            <input type='file' id="image" name="image" accept=".png, .jpg, .jpeg" onchange="loadFile(event)" required>
                                                      </div>
                                                      <div class="col- col-md-4">
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="card-body">
                                                <!-- <div class="row">
                                                <div class="col- col-md-3">
                                                      <label for="warna" class="card-title">Warna</label>
                                                      <input type="text" class="form-control" id="nama" name="warna" value="<?= set_value('warna') ?>" placeholder="warna">
                                                </div>
                                                <div class="col- col-md-3">
                                                      <label for="ukuran" class="card-title">Ukuran</label>
                                                      <input type="text" class="form-control" id="ukuran" name="ukuran" value="<?= set_value('ukuran') ?>" placeholder="Ukuran">
                                                </div>
                                                <div class="col- col-md-3">
                                                      <label for="harga" class="card-title">harga</label>
                                                      <input type="text" class="form-control" id="harga" name="harga" value="<?= set_value('harga') ?>" placeholder="Harga">
                                                </div>
                                                <div class="col- col-md-3">
                                                      <label for="stock" class="card-title">Stock</label>
                                                      <input type="text" class="form-control" id="stock" name="stock" value="<?= set_value('stock') ?>" placeholder="stock">
                                                </div>
                                          </div>
                                           -->
                                                <br>
                                                <h3>Detail produk</h3>
                                                <br>
                                                <div class="text-left">
                                                      <button type="button" class="btn btn-sm btn-rounded btn-rose" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Detail</button>
                                                </div>
                                                <br>
                                                <table class="table table-bordeless">
                                                      <tr>
                                                            <th>Warna</th>
                                                            <th>Ukuran</th>
                                                            <th>Harga</th>
                                                            <th>Stok</th>
                                                            <th>Berat</th>
                                                      </tr>
                                                      <tbody id="data_detail">

                                                      </tbody>
                                                </table>
                                                <br>
                                                <div class="text-right">
                                                      <!-- <button type="button" class="btn btn-sm btn-rounded btn-rose" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Detail</button> -->
                                                      <button type="submit" class="btn btn-sm btn-rounded btn-danger">Simpan</button>
                                                </div>
                                          </div>
                                          <hr>
                                    </div>
                              </div>
                        </div>
                  </form>
            </div>
      </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id='modal'>
      <div class="modal-dialog modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Detail</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">x</span>
                        </button>
                  </div>
                  <div class="card-body">
                        <div class="row">
                              <div class="col- col-md-3">
                                    <label for="warna" class="card-title">Warna</label>
                                    <input type="text" class="form-control" id="input_warna" name="warna" value="<?= set_value('warna') ?>" placeholder="warna">
                              </div>
                              <div class="col- col-md-3">
                                    <label for="ukuran" class="card-title">Ukuran</label>
                                    <input type="text" class="form-control" id="input_ukuran" name="ukuran" value="<?= set_value('ukuran') ?>" placeholder="Ukuran">
                              </div>
                              <div class="col- col-md-3">
                                    <label for="harga" class="card-title">harga</label>
                                    <input type="number" class="form-control" id="input_harga" name="harga" value="<?= set_value('harga') ?>" placeholder="Harga">
                              </div>
                              <div class="col- col-md-3">
                                    <label for="stock" class="card-title">Stock</label>
                                    <input type="number" class="form-control" id="input_stok" name="stock" value="<?= set_value('stock') ?>" placeholder="stock">
                              </div>
                              <div class="col- col-md-3">
                                    <label for="stock" class="card-title">Berat</label>
                                    <input type="number" class="form-control" id="input_berat" name="berat" value="<?= set_value('berat') ?>" placeholder="berat (gram)">
                              </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                        <a class="btn btn-primary" href="#" onclick="tambah_row()">Tambah</a>
                  </div>
            </div>
      </div>
</div>
<script>
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

      function tambah_row() {

            var warna = $("#input_warna").val();
            var ukuran = $("#input_ukuran").val();
            var harga = $("#input_harga").val();
            var stok = $("#input_stok").val();
            var berat = $("#input_berat").val();

            if (harga == "") {
                  alert("harga tidak boleh kosong");
            } else {
                  $('#modal').modal('toggle');
                  if (stok == "") {
                        stok = 0;
                  };
                  var html = "<tr>" +
                        "<td>" + warna + "<input type='hidden' name='data_warna[]' value='" + warna + "'></td>" +
                        "<td>" + ukuran + "<input type='hidden' name='data_ukuran[]' value='" + ukuran + "'></td>" +
                        "<td>" + harga + "<input type='hidden' name='data_harga[]' value='" + harga + "'></td>" +
                        "<td>" + stok + "<input type='hidden' name='data_stok[]' value='" + stok + "'></td>" +
                        "<td>" + berat + "<input type='hidden' name='data_berat[]' value='" + berat + "'></td>" +
                        "</tr>";

                  $("#data_detail").append(html);

                  var warna = $("#input_warna").val("");
                  var ukuran = $("#input_ukuran").val("");
                  var harga = $("#input_harga").val("");
                  var stok = $("#input_stok").val("");
                  var berat = $("#input_berat").val("");
            }

      }
</script>