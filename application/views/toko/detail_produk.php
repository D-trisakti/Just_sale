<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">

                  <?= $this->session->flashdata('pesan'); ?>
                  <div class="row">
                        <div class="col col-md-5">
                              <div class="card wrapper">
                                    <img class="card-img-top" src="<?= base_url('assets/img/product/') . $produk['img_produk']; ?>" alt="Card image cap">
                                    <div class="card-img-overlay text-right">
                                          <p class="card-text btn btn-sm btn-primary btn-round">
                                                Rp.<?= $produk['harga']; ?></p>
                                    </div>
                              </div>
                        </div>
                        <div class="col col-md-1">
                        </div>
                        <div class="col col-md-6">
                              <div class="card-body">
                                    <h2 class="title text-center ">Detail Produk</h2>
                                    <h4 class="card-title"><?= $produk['nama_produk']; ?></h4>
                                    <p class="card-text"><?= $produk['deskripsi_produk']; ?></p>
                              </div>
                        </div>
                        <hr>
                  </div>
                  <form action="<?= base_url(); ?>/toko/add_keranjang_belanja" method="post">
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>" id="id_produk">
                        <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
                        <input type="hidden" name="id_toko" value="<?= $produk['id_toko']; ?>">
                        <div class="container">
                              <table class="table table-borderless">
                                    <thead>
                                          <th>Warna</th>
                                          <th>Ukuran</th>
                                          <th>Stock</th>
                                          <th>Harga</th>
                                          <th>Berat(gram)</th>
                                          <th>Input Jumlah Pesan</th>
                                    </thead>
                                    <tbody>
                                          <?php foreach ($detail as $det) : ?>
                                                <tr>
                                                      <td><input type="hidden" name="detail[]" id="detail" value="<?= $det['id_detail'] ?>"><?= $det['warna']; ?></td>
                                                      <td><?= $det['ukuran']; ?></td>
                                                      <td><?= $det['stok']; ?></td>
                                                      <td>Rp.<?= $det['harga']; ?></td>
                                                      <td><input type="hidden" name="berat[]" id="berat" value="<?= $det['berat'] ?>"><?= $det['berat']; ?> gram</td>
                                                      <td><input type="number" max="<?= $det['stok']; ?>" class="form-control" name="jumlah[]" id="jumlah"></td>
                                                </tr>
                                          <?php endforeach; ?>
                                    </tbody>
                              </table>
                              <hr>
                              <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-sm">Beli produk</button>
                              </div>
                  </form>
            </div>
      </div>

      <div class="card">
            <div class="card-body">
                  <h4 class="card-title text-center">Ulasan Produk ini </h4>
                  <hr>
                  <table class="table table-borderless">
                        <thead>
                              <th class="text-center">nama</th>
                              <th class="text-center"> isi ulasan</th>
                        </thead>
                        <?php foreach ($nilai as $i) : ?>
                              <tbody>
                                    <tr>
                                          <td class="text-center">
                                                <?= $i['first_name'] ?> <?= $i['last_name'] ?>
                                          </td>
                                          <td class="text-center">
                                                <?= $i['masukan'] ?>
                                          </td>
                                    </tr>
                              </tbody>
                        <?php endforeach; ?>
                  </table>
            </div>
      </div>
</div>
</div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id='modal'>
      <div class="modal-dialog modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Beli Produk</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">x</span>
                        </button>
                  </div>
                  <div class="card-body">
                        <div class="row">
                              <div class="col- col-md-3">
                                    <label for="warna" class="card-title">Warna</label>
                                    <select name="warna" id="warna" class="form-control">
                                          <option value="">Pilih Warna</option>
                                          <?php foreach ($warna as $war) : ?>
                                                <option value="<?= $war['warna']; ?>"><?= $war['warna']; ?></option>
                                          <?php endforeach; ?>
                                    </select>
                              </div>
                              <div class="col- col-md-3">
                                    <label for="ukuran" class="card-title">Ukuran</label>
                                    <select name="ukuran" id="ukuran" class="form-control">
                                          <option value="">Pilih Ukuran</option>
                                          <?php foreach ($warna as $war) : ?>
                                                <option value="<?= $war['ukuran']; ?>"><?= $war['ukuran']; ?></option>
                                          <?php endforeach; ?>
                                    </select>
                              </div>
                              <div class="col- col-md-3">
                                    <label for="jumlah" class="card-title">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= set_value('jumlah') ?>" placeholder="jumlah">
                              </div>
                              <div class="col- col-md-2">
                                    <label for="harga" class="card-title">harga</label>
                                    <input type="number" class="form-control" id="input_harga" name="harga" value="<?= set_value('harga') ?>" placeholder="Harga" readonly>
                              </div>
                              <div class="col- col-md-1">
                                    <label for=" " class="card-title"></label>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm ('Apakah anda akan menghapus produk ini ?');">
                                          <i class="fas fa-trash"></i></a>
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
      // $('#warna').change(function() {
      //       var id = $(this).val();
      //       var prod = $('#id_produk').val();
      //       console.log(id);
      //       console.log(prod);
      //       $.ajax({
      //             url: "<?php echo base_url(); ?>toko/get_ukuran",
      //             method: "POST",
      //             data: {
      //                   id: id,
      //                   prod: prod
      //             },
      //             async: false,
      //             dataType: 'json',
      //             success: function(data) {
      //                   console.log(data);
      //                   $('#ukuran').html(html);

      //             }

      //       });
      // });
      function tambahvariasi() {

            var html = "<select name='variasi' id='variasi' class='form-control' required><option value=''>Pilih Variasi</option>" +
                  "<?php foreach ($detail as $det) : ?>" +
                  "<option value=" + "<?= $det['id_detail'] ?>" + ">Warna : " + "<?= $det['warna']; ?>" + " Ukuran : " + "<?= $det['ukuran']; ?>" + "</option>" +
                  "<?php endforeach; ?>" +
                  "</select>"
            $('#kolomvariasi').append(html);
      };
</script>