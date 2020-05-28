<div class="page-header header-filter" data-parallax="true"
      style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Kelola Toko</h2>
                  <?= $this->session->flashdata('pesan'); ?>
                  <a href="<?= base_url(); ?>toko/create_toko" class="btn btn-success btn-sm float-right">
                        Tambah Toko</a>
                  <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                    <tr>
                                          <th>Nama Toko</th>
                                          <th>Kelola Toko</th>
                                          <th>Kelola Produk</th>
                                          <th>Kelola Transaksi</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php foreach ($toko as $toko) : { ?>
                                    <tr>
                                          <td><?= $toko['nama_toko'] ?></td>
                                          <td>
                                                <?php if ($toko['status'] == '0') { ?>
                                                <a href="<?= base_url() ?>toko/active_toko/<?= $toko['id_toko'] ?>"
                                                      class="btn btn-success"
                                                      onclick="return confirm ('Apakah anda akan menaktifkan Toko ini ?');">
                                                      Aktifkan Toko</a>
                                                <?php } else { ?>
                                                <a href="<?= base_url() ?>toko/deactive_toko/<?= $toko['id_toko'] ?>"
                                                      class="btn btn-danger"
                                                      onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                      Non-Aktifkan Toko</a>
                                                <?php
                                                            }
                                                            ?>

                                                <a href="<?= base_url(); ?>toko/edit_toko/<?= $toko['id_toko']; ?>"
                                                      class="btn btn-info ">
                                                      Edit Toko</a>
                                                <a href="<?= base_url() ?>toko/detail_toko/<?= $toko['id_toko'] ?>"
                                                      class="btn btn-success ">
                                                      Lihat Toko</a>
                                          </td>
                                          <td>
                                                <a href="<?= base_url() ?>toko/kelola_produk/<?= $toko['id_toko'] ?>"
                                                      class="btn btn-danger">
                                                      Lihat Semua Produk</a>
                                                <a href="<?= base_url(); ?>toko/create_produk/<?= $toko['id_toko']; ?>"
                                                      class="btn btn-info ">
                                                      Tambah produk</a>
                                          </td>
                                          <td>
                                                <a href="" class="btn btn-danger"
                                                      onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                      Lihat Transaksi</a>
                                                <a href="" class="btn btn-info "
                                                      onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                      Lihat Pemesanan</a>
                                          </td>
                                    </tr>
                                    <?php      }
                                    endforeach ?>
                              </tbody>
                        </table>

                  </div>
            </div>
      </div>