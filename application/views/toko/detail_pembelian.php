<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <a href="<?= base_url() ?>toko/riwayat_pembelian" class="btn btn-danger btn-md btn-rounded float-right">Kembali</a>
                  <h2 class="title text-center ">Riwayat Pesanan</h2>
                  <div class="row">
                        <div class="col-md">
                              <div class="card">
                                    <div class="card-header">
                                          <div class="row">

                                                <div class="col-md-6">
                                                      <h4 class="card-title">No Order : <?= $master['id_order'] ?></h4>
                                                      <p class="category">Nama Pemesan : <?= $master['first_name'] ?> <?= $master['last_name'] ?></p>
                                                      <p class="category">Alamat : <?= $master['address'] ?></p>
                                                      <p class="category">Total : <?= $master['total'] ?></p>

                                                </div>
                                                <div class="col-md-6">
                                                      <h4 class="card-title">Tanggal Transaksi : <?= $master['tanggal_transaksi']; ?></h4>
                                                      <p class="category">Status Pemesan : <?= $master['status']; ?></p>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="card-body">
                                          <h4 class="card-title">Detail Barang</h4>
                                    </div>
                                    <table class="table table-striped">
                                          <thead>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Varian</th>
                                                <th>Satuan</th>
                                                <th>Jumlah</th>
                                                <th>Ongkir</th>
                                                <th>Pesan Pembeli</th>
                                          </thead>
                                          <tbody>
                                                <?php $x = 1;
                                                foreach ($trs as $trs) : ?>
                                                      <tr>
                                                            <td><?= $x ?></td>
                                                            <td><?= $trs['nama_produk'] ?></td>
                                                            <td>Rp.<?= $trs['harga'] ?></td>
                                                            <td>warna : <?= $trs['warna'] ?> ukuran : <?= $trs['ukuran'] ?></td>
                                                            <td><?= $trs['jumlah_pesan'] ?></td>
                                                            <td>Rp.<?= $trs['sub_total'] ?></td>
                                                            <td>Rp.<?= $trs['ongkir'] ?></td>
                                                            <td><?= $trs['pesan_pembeli'] ?></td>
                                                      </tr>
                                          </tbody>
                                    <?php $x++;
                                                endforeach; ?>
                                    </table>
                              </div>
                              <hr>
                              <h6 class="text-center">Bukti Pembayaran</h6>
                        </div>
                        <?= $this->session->flashdata('pesan'); ?>
                  </div>
            </div>
      </div>
</div>
</div>