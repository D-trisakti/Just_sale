<div class="page-header header-filter" data-parallax="true"
      style="background-image: url('<?= base_url();?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <div class="container">
                  <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                              <div class="profile">
                                    <div class="avatar">
                                          <img src="<?= base_url();?>assets/img/ryan.jpg" alt="Circle Image"
                                                class="img-raised rounded-circle img-fluid">
                                    </div>
                                    <div class="name">
                                          <h3 class="title">Halo, Selamat Datang</h3>
                                          <h3 class="title">
                                                <?= $user['first_name'];?>
                                                <?= $user['last_name'];?>
                                          </h3>
                                          <small><a href="" class="btn btn-sm btn-info btn-round">edit
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
                                                                  href="<?=base_url();?>toko/create"
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
                                          <?php 
                                                      if  ($toko ="[]"){?>
                                          <h6 class="text-center mt-3">Belum Memiliki Toko, <a
                                                      href="<?=base_url();?>toko/create" class="link text-info">Buat
                                                      Sekarang</a></h1>
                                                <?php } else {?>
                                                <table class="table">
                                                      <thead>
                                                            <tr>
                                                                  <th class="text-center">#</th>
                                                                  <th class="text-center">Nama toko</th>
                                                                  <th class="text-right">Actions</th>
                                                            </tr>
                                                      </thead>
                                                      <tbody>
                                                            <tr>
                                                                  <td class="text-center">3</td>
                                                                  <td class="text-center">Alex Mike</td>
                                                                  <td class="td-actions text-right">
                                                                        <button type="button" rel="tooltip"
                                                                              class="btn btn-info">
                                                                              <i
                                                                                    class="now-ui-icons users_single-02"></i>
                                                                        </button>
                                                                        <button type="button" rel="tooltip"
                                                                              class="btn btn-success">
                                                                              <i
                                                                                    class="now-ui-icons ui-2_settings-90"></i>
                                                                        </button>
                                                                        <button type="button" rel="tooltip"
                                                                              class="btn btn-danger">
                                                                              <i
                                                                                    class="now-ui-icons ui-1_simple-remove"></i>
                                                                        </button>
                                                                  </td>
                                                            </tr>
                                                      </tbody>
                                                </table>
                                                <?php } ?>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>