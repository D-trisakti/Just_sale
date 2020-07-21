<!-- table barang -->
<div class="col-md 4">
      <div class="container">
            <?= $this->session->flashdata('pesan'); ?>
      </div>
</div>
<h3 class="title">Kelola Toko Nonaktif</h3>
<br>
<br>
<div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                  <tr>
                        <th>Nama Toko</th>
                        <th>Pemilik Toko</th>
                        <th>Status Toko</th>
                        <th>Alasan Tidak Aktif</th>
                        <th>aksi</th>
                  </tr>
            </thead>
            <tbody>
                  <?php foreach ($toko as $usr) : ?>
                        <tr>
                              <td><?= $usr['nama_toko']; ?></td>
                              <td><?= $usr['first_name']; ?> <?= $usr['last_name']; ?></td>
                              <td><?php if ($usr['status'] == 'aktif') {
                                          echo '<div class="text-center mt-3"><i class="fas fa-check-circle" style="color:green"></i></div>';
                                    } else {
                                          echo  ' <div class="text-center mt-3"><i class="fas fa-times-circle"style="color:red"></i></div>';
                                    } ?>
                              </td>
                              <td><?= $usr['reason']; ?></td>
                              <td>
                                    <a href="" class="btn btn-success m-1" onclick="return confirm ('Apakah anda akan aktifkan Toko ?');" data-toggle="tooltip" data-html="true" title="aktifkan Toko">
                                          <i class="fas fa-store"></i></a>
                                    <a href="" class="btn btn-info m -1" onclick="return confirm ('Apakah anda akan Non-aktifkan Toko ?');" data-toggle="tooltip" data-html="true" title="Lihat Toko">
                                          <i class="fas fa-info"></i></a>
                                    <a href="" class="btn btn-primary m-1" onclick="return confirm ('Apakah anda akan Non-aktifkan Toko ?');" data-toggle="tooltip" data-html="true" title="Lihat Transaksi Toko">
                                          <i class="fas fa-cash-register"></i>
                                          <a href="" class="btn btn-warning m-1" onclick="return confirm ('Apakah anda akan Non-aktifkan Toko ?');" data-toggle="tooltip" data-html="true" title="Lihat produk Toko">
                                                <i class="fas fa-boxes"></i></a>
                              </td>
                        </tr>
                  <?php endforeach ?>
            </tbody>
      </table>

</div>