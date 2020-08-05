<!-- table barang -->
<div class="col-md 4">
      <div class="container">
            <?= $this->session->flashdata('pesan'); ?>
      </div>
</div>
<h3 class="title">Detail Pesanan</h3>
<br>
<br>
<div class="card">
      <div class="container mt-1">
            <div class="row">
                  <div class="col-md-6">
                        <h6 class="card-title">No Order : <?= $master['id_order']; ?></h6>
                        <h6 class="card-title">Nama Pemesan : <?= $master['first_name']; ?> <?= $master['last_name']; ?></h6>
                        <h6 class="card-title">Alamat : <?= $master['address']; ?></h6>
                        <h6 class="card-title">Total : Rp <?= $master['total']; ?></h6>
                  </div>
                  <div class="col-md-6">
                        <h6 class="card-title">tanggal_transaksi : <?= $master['tanggal_transaksi']; ?></h6>
                        <h6 class="card-title">Status Pesanan : <?= $master['status']; ?></h6>
                  </div>
            </div>
      </div>
      <div class="table-striped">
            <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                        <tr>
                              <th>No</th>
                              <th>Nama Barang</th>
                              <th>Harga</th>
                              <th>Satuan</th>
                              <th>Ongkir</th>
                              <th>Jumlah</th>
                              <th>Pesan Pembeli</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php foreach ($trs as $usr) : ?>
                              <tr>
                                    <td><?= $usr['id_transaksi']; ?></td>
                                    <td><?= $usr['nama_produk']; ?></td>
                                    <td>Rp.<?= $usr['harga_produk']; ?></td>
                                    <td><?= $usr['jumlah_pesan']; ?></td>
                                    <td>Rp.<?= $usr['ongkir']; ?></td>
                                    <td>Rp.<?= $usr['total']; ?></td>
                                    <td><?= $usr['pesan_pembeli']; ?></td>
                              </tr>
                        <?php endforeach ?>
                  </tbody>
            </table>
            <hr>
            <div class="text-center">
                  <h5 class="text-center">Bukti Pembayaran</h5>
                  <img src="<?= base_url(); ?>assets/img/transaksi/<?= $master['bukti_tf']; ?>" class="img-fluid" alt="Responsive image">
            </div>

      </div>
      <a href="<?php echo base_url(); ?>admin/proses_pesanan/<?= $usr['id_order']; ?>" class="btn badge-success float-right m-1">Proses Pesanan</a>
      <a href="<?php echo base_url(); ?>admin/tolak_pesanan/<?= $usr['id_order']; ?>" class="btn badge-danger float-right m-1">Tolak Pesanan</a>
</div>
</div>