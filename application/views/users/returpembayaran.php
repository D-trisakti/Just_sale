<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center">Refund & Pembayaran Dana</h2>
                  <?= $this->session->flashdata('pesan'); ?>
                  <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                    <tr>
                                          <th>No Refund/transaksi</th>
                                          <th>Jenis Pembayaran</th>
                                          <th>Status</th>
                                          <th>Aksi</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php foreach ($rek as $rek) : ?>
                                          <tr>
                                                <?php if ($rek['jenis_pembayaran'] == 'Retur') { ?>
                                                      <td><?= $rek['id_order'] ?></td>
                                                <?php } else { ?>
                                                      <td><?= $rek['id_transaksi'] ?></td>
                                                <?php } ?>
                                                <td><?= $rek['jenis_pembayaran'] ?></td>
                                                <td><?= $rek['status_retur'] ?></td>
                                                <?php if ($rek['jenis_pembayaran'] == 'Retur') { ?>
                                                      <td>
                                                            <a href="<?= base_url() ?>users/refund_detail/<?= $rek['id_order'] ?>" class="btn btn-success">
                                                                  Detail Refund</a>
                                                      </td>
                                                <?php } else { ?>
                                                      <td>
                                                            <a href="<?= base_url() ?>users/payment_detail/<?= $rek['id_transaksi'] ?>" class="btn btn-success">
                                                                  Detail Payment</a>
                                                      </td>
                                                <?php } ?>

                                          </tr>
                                    <?php endforeach ?>
                              </tbody>
                        </table>

                  </div>
            </div>
      </div>
</div>