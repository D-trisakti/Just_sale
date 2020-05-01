  <div class="page-header clear-filter" filter-color="orange">
        <div class="page-header-image" style="background-image:url(../assets/img/log-bg.jpg)"></div>
        <div class="content">
              <div class="container">
                    <?= $this -> session -> flashdata('pesan');?>
                    <div class="col-md-4 ml-auto mr-auto">
                          <div class="card card-login card-plain">
                                <form class="form" method="post" action="<?= base_url('welcome/login');?>">
                                      <div class="card-header text-center">
                                            <div class="logo-container">
                                                  <img src="../assets/img/Js-logo.png" alt="" width="242" height="242">
                                            </div>
                                      </div>
                                      <div class="card-body">
                                            <div class="input-group no-border input-lg">
                                                  <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                              <i class="now-ui-icons users_circle-08"></i>
                                                        </span>
                                                  </div>
                                                  <input type="email" class="form-control" placeholder="Email Anda"
                                                        name="email" required>
                                            </div>
                                            <div class="input-group no-border input-lg">
                                                  <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                              <i class="now-ui-icons text_caps-small"></i>
                                                        </span>
                                                  </div>
                                                  <input type="password" placeholder="Kata Sandi" class="form-control"
                                                        name="password" required />
                                            </div>
                                      </div>
                                      <div class="card-footer text-center">
                                            <button class="btn btn-primary btn-round btn-lg btn-block"
                                                  value="submit">Masuk</button>
                                            <div class="pull-left">
                                                  <h6> Belum memiliki akun ?
                                                        <a href="<?= base_url();?>welcome/register" class="link">Buat
                                                              Akun disini</a>
                                                  </h6>
                                            </div>
                                </form>
                          </div>
                    </div>
              </div>
        </div>
  </div>