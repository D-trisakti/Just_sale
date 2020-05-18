<!-- table barang -->
<div class="col-md 4">
      <div class="container">
      </div>
</div>
<h3 class="title">Halaman Kelola Pengguna Non-Aktif</h3>
<br>
<?= $this -> session -> flashdata('pesan');?>
<br>
<div class="table-responsive">
      <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                  <tr>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Status</th>
                        <th>Alasan Nonaktif</th>
                        <th>aksi</th>
                  </tr>
            </thead>
            <tbody>
                  <tr>
                        <td>deny trisakti</td>
                        <td>deny trisakti@gmail.com</td>
                        <td>081239233727</td>
                        <td>Tidak Aktif</td>
                        <td>Reported</td>
                        <td><a href="<?= $usr['id']; ?>" class="btn btn-success"
                                    onclick="return confirm ('Apakah anda akan menaktifkan Pengguna ini ?');"
                                    data-toggle="tooltip" data-html="true" title="aktifkan Pengguna">
                                    <i class="fas fa-user-check"></i></a>
                              <a href="<?= $usr['id']; ?>" class="btn btn-info" data-toggle="tooltip" data-html="true"
                                    title="Detail Pengguna">
                                    <i class="fas fa-info"></i></a>
                  </tr>
            </tbody>
      </table>

</div>