<div class="page-header header-filter" data-parallax="true"
      style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <div class="container">
                  <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                              <div class="profile">
                                    <div class="avatar">
                                          <img src="<?= base_url(); ?>assets/img/ryan.jpg" alt="Circle Image"
                                                class="img-raised rounded-circle img-fluid">
                                    </div>
                                    <div class="name">
                                          <?= $this->session->flashdata('pesan'); ?>
                                          <h3 class="title">Halo, Selamat Datang</h3>
                                          <h3 class="title">
                                                <?= $user['first_name']; ?>
                                                <?= $user['last_name']; ?>
                                          </h3>
                                          <small><a href="<?= base_url('users/edit') ?>"
                                                      class="btn btn-sm btn-info btn-round">edit
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
                                          <ul class="list-group list-group-flush" data-background-color="orange">
                                                <li class="list-group-item" data-background-color="orange">
                                                      <h6 class="text">Troli Masih Kosong, <a
                                                                  href="<?= base_url(); ?>toko/create"
                                                                  class="link text-info">Belanja
                                                                  Sekarang</a></h6>
                                                </li>
                                          </ul>
                                          <h6 class="text-center mt-3">Cek selengkapnya</h1>
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
                                          <table class="table table-bordered" id="dataTable" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                      <tr>
                                                            <th>Nama Toko</th>
                                                            <th>Aksi</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      <?php foreach ($toko as $toko) : { ?>
                                                      <tr>
                                                            <td><?= $toko['nama_toko'] ?></td>
                                                            <td>
                                                                  <a href="" class="btn btn-danger"
                                                                        onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                                        Non-Aktifkan Toko</a>
                                                                  <a href="" class="btn btn-info "
                                                                        onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                                        Edit Toko</a>
                                                                  <a href="" class="btn btn-success "
                                                                        onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                                        Lihat Toko</a>
                                                            </td>
                                                      </tr>
                                                      <?php      }
                                                      endforeach ?>
                                                      <tr>
                                                            <td colspan="2">
                                                                  <h6 class="text-center mt-3"><a
                                                                              href="<?= base_url(); ?>toko"
                                                                              class="link text-info">Cek
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