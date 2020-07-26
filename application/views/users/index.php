<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <div class="container">
                  <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                              <div class="profile">
                                    <div class="avatar">
                                          <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                                    </div>
                                    <div class="name">
                                          <?= $this->session->flashdata('pesan'); ?>
                                          <h3 class="title">Halo, Selamat Datang</h3>
                                          <h3 class="title">
                                                <?= $user['first_name']; ?>
                                                <?= $user['last_name']; ?>
                                          </h3>
                                          <small><a href="<?= base_url('users/edit') ?>/<?= $user['id']; ?>" class="btn btn-sm btn-info btn-round">edit
                                                      profile</a></small>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <!-- <div class="description text-center">
                        <p>An artist of considerable range, Chet Faker &#x2014; the name taken by
                              Melbourne-raised, Brooklyn-based Nick Murphy &#x2014; writes, performs and
                              records all of his own music, giving it a warm, intimate feel with a solid
                              groove structure. </p>
                  </div> -->
                  <hr>
                  <div class="row">
                        <div class="col col-md-4">
                              <div class="card md-3" data-background-color="orange">
                                    <div class="card-header card-header-text card-header-rose">
                                          <div class="card-text">
                                                <h4 class="card-title text-center"><i class="fas fa-shopping-cart"></i>
                                                      Keranjang Belanja</h4>
                                          </div>
                                    </div>
                                    <div class="card-body">


                                          <table class="table table-striped">
                                                <thead>
                                                      <th>
                                                            No Pesanan
                                                      </th>
                                                </thead>
                                                <tbody>
                                                      <?php foreach ($produk as $prod) : ?>
                                                            <tr>
                                                                  <td><?= $prod['nama_produk'] ?></td>
                                                            </tr>
                                                      <?php endforeach ?>
                                                </tbody>
                                          </table>
                                          <h6 class="text-center mt-3"><a href="<?= base_url(); ?>toko/keranjang_belanja" class="link text-info">Cek Selengkapnya</a></h1>
                                    </div>
                              </div>
                        </div>


                        <div class="col col-md-8">
                              <div class="card">
                                    <div class="card-header card-header-text card-header-primary">
                                          <div class="card-text">
                                                <h4 class="card-title text-center"><i class="fas fa-store"></i>
                                                      Kelola Toko</h4>
                                          </div>
                                    </div>

                                    <div class="card-body">
                                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                      <tr>
                                                            <th>Nama Toko</th>
                                                            <th>Aksi</th>
                                                            <th>Pesanan Masuk</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      <?php foreach ($toko as $toko) : { ?>
                                                                  <tr>
                                                                        <td><?= $toko['nama_toko'] ?></td>
                                                                        <td>
                                                                              <?php if ($toko['status'] == '0') { ?>
                                                                                    <a href="<?= base_url() ?>toko/active_toko/<?= $toko['id_toko'] ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Aktifkan Toko" onclick="return confirm ('Apakah anda akan menaktifkan Toko ini ?');">
                                                                                          <i class="fas fa-check"></i></a>
                                                                              <?php } else { ?>
                                                                                    <a href="<?= base_url() ?>toko/deactive_toko/<?= $toko['id_toko'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Nonaktifkan Toko" onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                                                          <i class="fas fa-ban"></i></a>
                                                                              <?php
                                                                              }
                                                                              ?>
                                                                              <a href="" class="btn btn-info " data-toggle="tooltip" data-placement="top" title="Lihat Pemesanan Produk" onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                                                    <i class="fas fa-shopping-cart"></i></a>
                                                                              <a href="<?= base_url() ?>toko/detail_toko/<?= $toko['id_toko'] ?>" class="btn btn-success " data-toggle="tooltip" data-placement="top" title="Lihat Toko">
                                                                                    <i class="fas fa-eye"></i></a>
                                                                        </td>
                                                                        <td class="text-center"><?= $toko['jumlah_pesanan']; ?></td>
                                                                  </tr>
                                                      <?php      }
                                                      endforeach ?>
                                                      <tr>
                                                            <td colspan="2">
                                                                  <h6 class="text-center mt-3"><a href="<?= base_url(); ?>toko" class="link text-info">Cek
                                                                              Selengkapnya</a>
                                                                  </h6>
                                                            </td>
                                                      </tr>
                                                </tbody>
                                          </table>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
</div>