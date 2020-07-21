<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Keranjang Belanja</h2>
                  <a href="<?= base_url(); ?>toko/riwayat_pembelian" class="text-title btn btn-md btn-success float-right">Riwayat
                        Transaksi</a>
                  <?= $this->session->flashdata('pesan'); ?>
                  <form id="form" action="<?= base_url('toko/shipping'); ?>" method="post">
                        <div class="table-striped">
                              <table class="table table-borderedless" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                          <tr>
                                                <th></th>
                                                <th>Nama Produk</th>
                                                <th>Harga Produk</th>
                                                <th>Jumlah</th>
                                                <th>Pesan pembelian</th>
                                                <th>Total</th>
                                                <th>aksi</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php foreach ($produk as $prod) : ?>
                                                <tr>
                                                      <td>
                                                            <div class="form-check">
                                                                  <label class="form-check-label">
                                                                        <input class="form-check-input" id="order_no" type="checkbox" value="<?= $prod['id_pesan'] ?>" name="order_no[]">
                                                                        <span class="form-check-sign">
                                                                              <span class="check"></span>
                                                                        </span>
                                                                  </label>
                                                            </div>
                                                      </td>
                                                      <td><?= $prod['nama_produk'] ?></td>
                                                      <td id="<?= $prod['id_produk'] ?>harga">
                                                            <?= $prod['harga_produk'] ?>
                                                      </td>

                                                      <td>
                                                            <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-primary btn-round btn-sm">-</button>
                                                            <input id="<?= $prod['id_produk'] ?>quantity" class="form-control" min="1" max="<?= $prod['jumlah_produk'] ?>" name="quantity[]" value="<?= $prod['jumlah_pesan'] ?>" type="number" readonly style="width: 50px;">
                                                            <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-primary btn-round btn-sm">+</button>
                                                      </td>

                                                      <td>
                                                            <input type="text" id="pesan" class="form-control" name="pesan[]">
                                                      </td>
                                                      <td>
                                                            <input readonly type="text" id="<?= $prod['id_produk'] ?>subtotal" class="form-control" name="subtotal[]">
                                                      <td>
                                                            <a href="<?= base_url() ?>toko/delete_keranjang/<?= $prod['id_pesan'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Pesanan"><i class="fas fa-trash"></i></button></td>
                                                </tr>
                                                <script>
                                                      $(document).ready(function() {

                                                            var id_harga = '<?= $prod['id_produk'] ?>' + 'harga';
                                                            var id_quantity = '<?= $prod['id_produk'] ?>' + 'quantity';
                                                            var id_subtotal = '<?= $prod['id_produk'] ?>' + 'sub_total';
                                                            //hitung_total(id_harga, id_quantity, id_subtotal);
                                                            setInterval(function() {
                                                                  var harga = $("#" + <?= $prod['id_produk'] ?> + "harga").html();
                                                                  var quantity = $("#" + <?= $prod['id_produk'] ?> + "quantity").val();
                                                                  var total = parseInt(harga) * parseInt(quantity);
                                                                  $("#" + <?= $prod['id_produk'] ?> + "subtotal").val("Rp. " + total);
                                                            }, 500);
                                                      });
                                                </script>
                                    </tbody>
                              <?php endforeach ?>

                              </table>
                  </form>
                  <!-- <a href="<?= base_url(); ?>toko/shipping">Lanjutkan Bayar</a> -->
                  <button class="text-title btn btn-md btn-success text-right" type="button" onclick="check()">Lanjutkan Bayar</button>
            </div>
      </div>
</div>
<script>
      function hitung_total(id_harga, id_quantity, id_subtotal) {

            setInterval(function() {
                  var harga = $("#" + id_harga + "harga").html();
                  var quantity = $("#" + id_quantity + "quantity").val();
                  var total = parseInt(harga) * parseInt(quantity);
                  console.log(id_harga);
                  $("#" + id_subtotal + "subtotal").val(total);
            }, 500);
      }

      function check() {
            console.log($('input[type=checkbox]:checked').length)
            if ($('input[type=checkbox]:checked').length == 0) {
                  alert("Silahkan Pilih Barang Yang Akan Dibayar !!!");
            } else {
                  $("#form").submit();
            }
      }
</script>