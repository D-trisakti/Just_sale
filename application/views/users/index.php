<div class="wrapper">
      <div class="page-header clear-filter page-header-small" filter-color="primary">
            <div class="page-header-image" data-parallax="true"
                  style="background-image:url('<?= base_url();?>assets/img/header.jpg');">
            </div>
            <div class="container">
                  <div class="profile-page">
                        <div class="photo-container">
                              <img src="<?= base_url();?>assets/img/ryan.jpg" alt="" class="rounded-circle">
                        </div>
                        <h3 class="category"><?= $user['first_name'];?> <?= $user['last_name'];?></h3>
                        <small><button class="btn btn-sm btn-info btn-round">edit profile</button></small>
                  </div>
            </div>
      </div>
      <div class="container">
            <div class="card-wrapper">
                  <div class="card-body mt-auto">
                        <div class="row">
                              <div class="col col-md-4">
                                    <div class="card md-3" data-background-color="orange">
                                          <div class="card-body">
                                                <h4 class="card-title text-center"><i class="fas fa-shopping-cart"></i>
                                                      Keranjang Belanja</h4>
                                                <ul class="list-group list-group-flush" data-background-color="orange">
                                                      <li class="list-group-item" data-background-color="orange">
                                                            <a href="" class="card-title">Seragam</a>
                                                      </li>
                                                </ul>
                                                <h6 class="text-center mt-3">Cek selengkapnya</h1>
                                          </div>
                                    </div>
                              </div>
                              <div class="col col-md-8">
                                    <div class="card md-3" data-background-color="orange">
                                          <div class="card-body">
                                                <h4 class="card-title text-center"><i class="fas fa-store"></i> Kelola
                                                      Toko</h4>
                                                <?php 
                                                      if  ($toko ="[]"){?>
                                                <h6 class="text-center mt-3">Belum Memiliki Toko, <a
                                                            href="<?=base_url();?>toko/create"
                                                            class="link text-info">Buat
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