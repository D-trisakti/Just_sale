<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center">Riwayat Transaksi Toko <?= $toko['nama_toko']; ?></h2>
                  <?= $this->session->flashdata('pesan'); ?>
                  <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                    <tr>
                                          <th>No Transaksi</th>
                                          <th>Nama Pemesan</th>
                                          <th>Alamat Pemesan</th>
                                          <th>Nama Produk</th>
                                          <th>Jumlah Barang</th>
                                          <th>Harga Produk</th>
                                          <th>total pembayaran</th>
                                          <th>Catatan Pemesan</th>
                                          <th>Ekspedisi</th>
                                          <th>Service</th>
                                          <th>Aksi</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php foreach ($pesan as $psn) : ?>
                                          <tr>
                                                <td><?= $psn['id_transaksi'] ?></td>
                                                <td><?= $psn['first_name'] ?> <?= $psn['last_name'] ?></td>
                                                <td><?= $psn['address'] ?> <?= $psn['kota_pesan'] ?> <?= $psn['provinsi_pesan'] ?></td>
                                                <td><?= $psn['nama_produk'] ?></td>
                                                <td><?= $psn['jumlah_pesan'] ?></td>
                                                <td>Rp.<?= $psn['harga_produk'] ?></td>
                                                <td>Rp.<?= $psn['total'] ?></td>
                                                <td><?= $psn['pesan_pembeli'] ?></td>
                                                <td><?= $psn['id_kurir'] ?></td>
                                                <td><?= $psn['id_layanan'] ?></td>
                                                <td>
                                                      <a href="<?= base_url() ?>users/payment_detail/<?= $psn['id_transaksi'] ?>" class="btn btn-success">
                                                            Detail</a>
                                                </td>
                                          </tr>
                                    <?php endforeach ?>
                              </tbody>
                        </table>

                  </div>
            </div>
      </div>