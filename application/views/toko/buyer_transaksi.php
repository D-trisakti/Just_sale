<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Riwayat Pembelian</h2>
                  <!-- <a href="<?= base_url(); ?>toko/shipping"
                        class="text-title btn btn-md btn-success float-right">Riwayat
                        Transaksi</a> -->
                  <?= $this->session->flashdata('pesan'); ?>
                  <div class="table-striped">
                        <table class="table table-borderedless" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                    <tr>
                                          <th>No Order</th>
                                          <th>Status</th>
                                          <th>Total</th>
                                          <th>aksi</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php
                                    foreach ($trs as $trs) : ?>
                                          <tr>
                                                <td><?= $trs['id_order']; ?>.</td>
                                                <td>
                                                      <?= $trs['status']; ?>
                                                </td>
                                                <td id='tot<?= $x ?>'>
                                                      <?= $trs['total']; ?>
                                                </td>
                                                <td>
                                                      <?php if ($trs['status'] == 'proses by admin') { ?>
                                                            <a href="<?= base_url(); ?>toko/riwayat_pembelian_detail/<?= $trs['id_order']; ?>" class="btn btn-danger">Lihat
                                                                  Riwayat</button></td>
                                          <?php  } elseif ($trs['status'] == 'Pesanan Diteruskan Ke Penjual') { ?>
                                                <a href="<?= base_url(); ?>toko/pesanan_di_penjual/<?= $trs['id_order']; ?>" class="btn btn-danger">Lihat
                                                      Detail</button></td>
                                                <?php } ?>
                                          </tr>
                                    <?php
                                    endforeach; ?>

                              </tbody>
                        </table>
                        <a href="<?= base_url(); ?>toko/keranjang_belanja" class="text-title btn btn-md btn-success text-right">Kembali</a>
                  </div>
            </div>
      </div>