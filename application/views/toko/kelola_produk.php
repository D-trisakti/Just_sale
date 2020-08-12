<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center">Kelola Produk <?= $toko['nama_toko']; ?></h2>
                  <?= $this->session->flashdata('pesan'); ?>
                  <a href="<?= base_url(); ?>toko/create_produk/<?= $toko['id_toko']; ?>" class="btn btn-success btn-sm float-right" data-toggle="tooltip" data-placement="top" title="Tambah Produk"><i class="fas fa-plus"></i></a>
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
                                                      <a href="<?= base_url() ?>toko/delete_produk/<?= $prod['id_produk'] ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Produk" onclick="return confirm ('Apakah anda akan menghapus produk ini ?');">
                                                            <i class="fas fa-trash"></i></a>
                                                      <a href="<?= base_url() ?>toko/edit_produk/<?= $prod['id_produk']; ?>" class="btn btn-info  btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Produk">
                                                            <i class="fas fa-edit"></i></a>
                                                      <!-- <?php if ($toko['status'] == '0') { ?>
                                                            <a href="<?= base_url() ?>toko/active_toko/<?= $toko['id_toko'] ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Aktifkan Toko" onclick="return confirm ('Apakah anda akan menaktifkan Toko ini ?');">
                                                                  <i class="fas fa-check"></i></a>
                                                      <?php } else { ?>
                                                            <a href="<?= base_url() ?>toko/deactive_toko/<?= $toko['id_toko'] ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Non-aktifkan Toko" onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');"><i class="fas fa-ban"></i>
                                                            </a>
                                                      <?php
                                                            }
                                                      ?> -->

                                                </td>

                                          </tr>
                              </tbody>
                        <?php endforeach ?>
                        </table>

                  </div>
            </div>
      </div>
</div>