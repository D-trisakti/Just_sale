<!-- table barang -->
<div class="col-md 4">
      <div class="container">
            <?= $this->session->flashdata('pesan'); ?>
      </div>
</div>
<h3 class="title">Kelola Produk</h3>
<br>
<br>
<div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                  <tr>
                        <th>Nama Produk</th>
                        <th>Nama Toko</th>
                        <th>Jumlah Barang</th>
                        <th>aksi</th>
                  </tr>
            </thead>
            <tbody>
                  <?php foreach ($product as $usr) : ?>
                        <tr>
                              <td><?= $usr['nama_produk']; ?></td>
                              <td><?= $usr['nama_toko']; ?></td>
                              <td><?= $usr['jumlah_produk']; ?></td>
                              <!-- <td>
                                  <div class="text-center mt-3"><i class="fas fa-check-circle" style="color:green"></i></div>';
                              </td> -->
                              <td class="text-center">
                                    <a href="<?php echo base_url(); ?>admin/detail_user/<?= $usr['id_produk']; ?>" class="btn badge-primary  m-1"> Detail</a>
                              </td>
                        </tr>
                  <?php endforeach ?>
            </tbody>
      </table>

</div>