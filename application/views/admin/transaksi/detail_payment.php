<!-- table barang -->
<div class="col-md 4">
      <div class="container">
            <?= $this->session->flashdata('pesan'); ?>
      </div>
</div>
<h3 class="title">Detail Payment</h3>
<br>
<br>
<div class="card">
      <div class="container mt-1">
            <div class="row">
                  <div class="col-md-6">
                        <h6 class="card-title">No Transaksi : <?= $master['id_transaksi']; ?></h6>
                        <h6 class="card-title">Nama Toko : <?= $master['nama_toko'] ?></h6>
                        <h6 class="card-title">Total : Rp <?= $master['total']; ?></h6>
                  </div>
                  <div class="col-md-6">
                        <h6 class="card-title">Status Pesanan : <?= $master['status_retur']; ?></h6>
                  </div>
            </div>
      </div>
      <div class="table-striped">
            <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                        <tr>
                              <th>No</th>
                              <th>Nama Barang</th>
                              <th>Varian</th>
                              <th>Harga</th>
                              <th>Satuan</th>
                              <th>Ongkir</th>
                              <th>Jumlah</th>
                              <th>Pesan Pembeli</th>
                        </tr>
                  </thead>
                  <tbody>

                        <tr>
                              <td><?= $master['id_transaksi']; ?></td>
                              <td><?= $master['nama_produk']; ?></td>
                              <td>Warna : <?= $master['warna']; ?> Ukuran:<?= $master['ukuran']; ?></td>
                              <td>Rp.<?= $master['harga']; ?></td>
                              <td><?= $master['jumlah_pesan']; ?></td>
                              <td>Rp.<?= $master['ongkir']; ?></td>
                              <td>Rp.<?= $master['total']; ?></td>
                              <td><?= $master['pesan_pembeli']; ?></td>
                        </tr>

                  </tbody>
            </table>
            <hr>
            <div class="text-center">
                  <form action="<?php echo base_url(); ?>admin/payment_proses" method="post">
                        <h5 class="text-center">Bukti Pembayaran</h5>
                        <img src="<?= base_url(); ?>assets/img/transaksi/<?= $master['bukti_tf']; ?>" class="img-fluid" alt="Responsive image">
            </div>
            <input type="hidden" id="id" name="id" value="<?= $master['id_transaksi']; ?>">
      </div>

      <button type="submit" class="btn badge-success float-right m-1">Proses Payment</button>
      </form>
      <a href="<?php echo base_url(); ?>admin/payment" class="btn badge-danger float-right m-1">Kembali</a>
</div>
</div>