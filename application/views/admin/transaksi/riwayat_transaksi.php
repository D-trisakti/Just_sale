<!-- table barang -->
<div class="col-md 4">
      <div class="container">
            <?= $this -> session -> flashdata('pesan');?>
      </div>
</div>
<h3 class="title">Kelola Produk</h3>
<br>
<br>
<div class="table-striped">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                  <tr>
                        <th>No Transaksi</th>
                        <th>Nama Pembeli</th>
                        <th>Nama Barang</th>
                        <th>Jumlah barang</th>
                        <th>Jumlah pembayaran</th>
                        <th>Status Payment</th>
                        <th>aksi</th>
                  </tr>
            </thead>
            <tbody>
                  <!-- <?php foreach ($users as $usr) : ?>
                  <tr>
                        <td><?= $usr['nama']; ?></td>
                        <td><?=$usr['email'] ;?></td>
                        <td><?=$usr['notelpon']; ?></td>
                        <td>
                              <?php if ($usr['is_active'] == 'aktif'){
                               echo '<div class="text-center mt-3"><i class="fas fa-check-circle" style="color:green"></i></div>';
                            }else{
                              echo  ' <div class="text-center mt-3"><i class="fas fa-times-circle"style="color:red"></i></div>';
                            }?>
                        </td>
                        <td>
                              <a href="<?php echo base_url(); ?>admin/deactive_user/<?= $usr['id']; ?>"
                                    class="btn badge-danger float-right m-1">Non Aktifkan Akun</a>
                              <a href="<?php echo base_url(); ?>admin/detail_user/<?= $usr['id']; ?>"
                                    class="btn badge-primary float-right m-1"> Detail</a>
                              <a href="<?php echo base_url(); ?>admin/active_user/<?= $usr['id']; ?>"
                                    class="btn badge-success float-right m-1"> Aktifkan Akun</a>
                        </td>
                  </tr>
                  <?php endforeach ?> -->
                  <tr>
                        <td>21361237127423</td>
                        <td>Gondor</td>
                        <td>Sepatu</td>
                        <td>20</td>
                        <td>Rp.1.502.124</td>
                        <td>Pending</td>
                        <td>
                              <a href="" class="btn btn-success m-1"
                                    onclick="return confirm ('Apakah anda akan non-aktifkan Toko ?');"
                                    data-toggle="tooltip" data-html="true" title="Lanjutkan Pemesanan">
                                    <i class="fas fa-cart-plus"></i></a>
                              <a href="" class="btn btn-danger m-1"
                                    onclick="return confirm ('Apakah anda akan non-aktifkan Toko ?');"
                                    data-toggle="tooltip" data-html="true" title="Batalkan Pemesanan">
                                    <i class="fas fa-cart-arrow-down"></i></a>
                        </td>
                  </tr>
            </tbody>
      </table>

</div>