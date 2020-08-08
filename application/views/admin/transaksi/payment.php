<!-- table barang -->
<div class="col-md 4">
      <div class="container">
            <?= $this->session->flashdata('pesan'); ?>
      </div>
</div>
<h3 class="title">Kelola Payment</h3>
<br>
<br>
<div class="table-striped">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                  <tr>
                        <th>No Refund/ Payment</th>
                        <th>Jenis Pembayaran</th>
                        <th>Status</th>
                        <th>aksi</th>
                  </tr>
            </thead>
            <tbody>
                  <?php foreach ($pay as $usr) : ?>
                        <tr>
                              <?php if ($usr['jenis_pembayaran'] == 'Pembayaran produk') { ?>
                                    <td><?= $usr['id_transaksi']; ?></td>
                              <?php } else { ?>
                                    <td><?= $usr['id_order']; ?></td>
                              <?php } ?>


                              <td><?= $usr['jenis_pembayaran']; ?></td>
                              <td><?= $usr['status_retur']; ?></td>
                              <td>
                                    <?php if ($usr['status_retur'] == 'Proses by admin' && $usr['jenis_pembayaran'] == 'Retur') { ?>
                                          <a href="<?= base_url() ?>admin/detail_retur/<?= $usr['id_order'] ?>" class="btn btn-success">Detail Refund</a>
                                    <?php } else { ?>
                                          <a href="<?= base_url() ?>admin/detail_payment/<?= $usr['id_transaksi'] ?>" class="btn btn-success">
                                                Detail Payment</a>
                                    <?php } ?>
                              </td>
                        </tr>
                  <?php endforeach ?>
            </tbody>
      </table>

</div>