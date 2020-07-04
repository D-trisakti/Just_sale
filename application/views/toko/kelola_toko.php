<div class="page-header header-filter" data-parallax="true"
      style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Kelola Toko</h2>
                  <?= $this->session->flashdata('pesan'); ?>
                  <a href="<?= base_url(); ?>toko/create_toko" class="btn btn-success btn-sm float-right"
                        data-toggle="tooltip" data-placement="top" title="Tambah Toko">
                        <i class="fas fa-plus"></i></a>
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
                                                      class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                                      title="Aktifkan Toko"
                                                      onclick="return confirm ('Apakah anda akan menaktifkan Toko ini ?');">
                                                      <i class="fas fa-check"></i></a>
                                                <?php } else { ?>
                                                <a href="<?= base_url() ?>toko/deactive_toko/<?= $toko['id_toko'] ?>"
                                                      class="btn btn-danger" data-toggle="tooltip" data-placement="top"
                                                      title="Non-aktifkan Toko"
                                                      onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');"><i
                                                            class="fas fa-ban"></i>
                                                </a>
                                                <?php
                                                            }
                                                            ?>

                                                <a href="<?= base_url(); ?>toko/edit_toko/<?= $toko['id_toko']; ?>"
                                                      class="btn btn-info " data-toggle="tooltip" data-placement="top"
                                                      title="Edit Toko">
                                                      <i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url() ?>toko/detail_toko/<?= $toko['id_toko'] ?>"
                                                      class="btn btn-success " data-toggle="tooltip"
                                                      data-placement="top" title="Lihat Toko">
                                                      <i class="fas fa-eye"></i></a>
                                          </td>
                                          <td>
                                                <a href="<?= base_url() ?>toko/kelola_produk/<?= $toko['id_toko'] ?>"
                                                      class="btn btn-success" data-toggle="tooltip" data-placement="top"
                                                      title="Lihat Semua Produk">
                                                      <i class="fas fa-eye"></i></a>
                                                <a href="<?= base_url(); ?>toko/create_produk/<?= $toko['id_toko']; ?>"
                                                      class="btn btn-info " data-toggle="tooltip" data-placement="top"
                                                      title="Tambah Produk">
                                                      <i class="fas fa-plus"></i></a>
                                          </td>
                                          <td>
                                                <a href="" class="btn btn-danger" data-toggle="tooltip"
                                                      data-placement="top" title="Lihat Riwayat Transaksi"
                                                      onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                      <i class="fas fa-cash-register"></i></a>
                                                <a href="" class="btn btn-info " data-toggle="tooltip"
                                                      data-placement="top" title="Lihat Pemesanan Produk"
                                                      onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                      <i class="fas fa-shopping-cart"></i></a>
                                          </td>
                                    </tr>
                                    <?php      }
                                    endforeach ?>
                              </tbody>
                        </table>

                  </div>
            </div>
      </div>