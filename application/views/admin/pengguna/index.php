<!-- table barang -->
<div class="col-md 4">
      <div class="container">
      </div>
</div>
<h3 class="title">Halaman Kelola Pengguna</h3>
<br>
<?= $this -> session -> flashdata('pesan');?>
<br>
<div class="table-responsive">
      <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                  <tr>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Status</th>
                        <th>aksi</th>
                  </tr>
            </thead>
            <tbody>
                  <?php foreach ($user as $usr) : ?>
                  <tr>
                        <td><?= $usr['email'];?></td>
                        <td><?= $usr['first_name'];?> <?= $usr['last_name'];?></td>
                        <td><?= $usr['phone'];?></td>
                        <td><?= $usr['user_status'];?></td>
                        <td> <a href="<?= $usr['id']; ?>" class="btn btn-danger"
                                    onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');"
                                    data-toggle="tooltip" data-html="true" title="Non-aktifkan Pengguna">
                                    <i class="fas fa-user-slash"></i></a>
                              <a href="<?= $usr['id']; ?>" class="btn btn-info" data-toggle="tooltip" data-html="true"
                                    title="Detail Pengguna">
                                    <i class="fas fa-info"></i></a>


                  </tr>
                  <?php endforeach ;?>
            </tbody>
      </table>

</div>