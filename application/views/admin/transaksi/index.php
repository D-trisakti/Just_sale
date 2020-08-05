<!-- table barang -->
<div class="col-md 4">
      <div class="container">
            <?= $this->session->flashdata('pesan'); ?>
      </div>
</div>
<h3 class="title">Kelola Pemesanan</h3>
<br>
<br>
<div class="table-striped">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                  <tr>
                        <th>No Order</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>aksi</th>
                  </tr>
            </thead>
            <tbody>
                  <?php foreach ($trs as $usr) : ?>
                        <tr>
                              <td><?= $usr['id_order']; ?></td>
                              <td><?= $usr['status']; ?></td>
                              <td>Rp.<?= $usr['total']; ?></td>
                              <td>
                                    <a href="<?php echo base_url(); ?>admin/detail_pesanan/<?= $usr['id_order']; ?>" class="btn badge-success float-right m-1">Detail</a>
                              </td>
                        </tr>
                  <?php endforeach ?>
            </tbody>
      </table>

</div>