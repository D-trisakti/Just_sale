<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <a href="<?= base_url() ?>toko/riwayat_pembelian" class="btn btn-danger btn-md btn-rounded float-right">Kembali</a>
                  <h2 class="title text-center ">Detail Payment</h2>
                  <div class="row">
                        <?= $this->session->flashdata('pesan'); ?>
                        <div class="col-md">
                              <div class="card">
                                    <div class="card-header">
                                          <div class="row">

                                                <div class="col-md-6">
                                                      <h4 class="card-title">No Transaksi : <?= $master['id_transaksi'] ?></h4>
                                                      <p class="category">Nama Pemesan : <?= $master['first_name'] ?> <?= $master['last_name'] ?></p>
                                                      <p class="category">Alamat : <?= $master['address'] ?></p>
                                                      <p class="category">Total : <?= $master['total'] ?></p>

                                                </div>
                                                <div class="col-md-6">
                                                      <h4 class="card-title">Tanggal Transaksi : <?= $master['tanggal_transaksi']; ?></h4>
                                                      <p class="category">Status Refund : <?= $master['status_retur']; ?></p>
                                                      <p class="category">Alasan Pending : <?= $master['alasan']; ?></p>
                                                      <p class="category">No Rekening : <?= $master['no_rek']; ?></p>
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
                                                            <td>Rp.<?= $trs['harga_produk'] ?></td>
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
                              <div class="container text-center"></div>
                              <?php if ($master['status_retur'] == "Payed") { ?>
                                    <h6 class="text-center">Bukti Pembayaran</h6>
                                    <img src="<?= base_url(); ?>assets/img/transaksi/<?= $master['pay_img']; ?>" class="img-fluid content m-auto" alt="Responsive image">
                        </div>
                  <?php } else if ($master['status_retur'] == "Retur") { ?>
                        <h6 class="text-center">Bukti Pembayaran</h6>
                        <img src="<?= base_url(); ?>assets/img/transaksi/<?= $master['pay_img']; ?>" class="img-fluid content m-auto" alt="Responsive image">
                  </div>
            <?php } else { ?>
                  <div></div>
            <?php     } ?>
            </div>
      </div>
</div>
</div>
</div>