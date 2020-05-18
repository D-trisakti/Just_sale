<div class="page-header header-filter" data-parallax="true"
      style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center">Kelola Produk <?= $toko['nama_toko']; ?></h2>
                  <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                    <tr>
                                          <th>Nama Produk</th>
                                          <th>Harga Produk</th>
                                          <th>Deskripsi Produk</th>
                                          <th>Status Produk</th>
                                          <th>Jumlah Produk</th>
                                          <th>aksi</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php foreach ($produk as $prod) : ?>
                                    <tr>
                                          <td><?= $prod['nama_produk'] ?></td>
                                          <td>
                                                <?= $prod['harga_produk'] ?>
                                          </td>

                                          <td>
                                                <?= $prod['deskripsi_produk'] ?>
                                          </td>
                                          <td>
                                                TERSEDIA
                                          </td>
                                          <td>
                                                <?= $prod['jumlah_produk'] ?></td>
                                          <td>
                                                <a href="" class="btn btn-danger btn-sm"
                                                      onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                      Hapus Barang</a>
                                                <a href="" class="btn btn-info  btn-sm"
                                                      onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                      Edit barang</a>
                                                <a href="" class="btn btn-success  btn-sm"
                                                      onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                      Ubah status</a></td>

                                    </tr>
                              </tbody>
                              <?php endforeach ?>
                        </table>

                  </div>
            </div>
      </div>