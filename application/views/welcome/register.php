<div class="page-header header-filter" style="background-image: url('<?= base_url('assets/img/logo-bg.jpg'); ?>')">
      <div class="container">
            <hr>
            <hr>
            <hr>
            <hr>
            <hr> <br> <br> <br><br> <br> <br><br><br><br>
            <?= $this->session->flashdata('pesan'); ?>

            <div class="rows">
                  <div class="col-lg-6 col-md-6 ml-auto mr-auto">
                        <div class="container">
                              <div class="card card-login">
                                    <form class="form" method="post" action="<?= base_url('welcome/register'); ?>">
                                          <div class="card-header card-header-primary text-center">
                                                <h4 class="card-title">Sign Up</h4>
                                          </div>
                                          <p class="description text-center">Sudah Punya Akun ? <a href="<?= base_url('welcome/login') ?>">Login Disini ! </a></p>
                                          <div class="card-body">
                                                <div class="input-group">
                                                      <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                  <i class="material-icons">mail</i>
                                                            </span>
                                                      </div>
                                                      <input type="email" id="email" name="email" class="form-control" placeholder="Email..." value="<?= set_value('email'); ?>">
                                                </div>
                                                <?= form_error('email', '<small class ="text-danger">', '</small>'); ?>
                                                <div class="input-group">
                                                      <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                  <i class="material-icons">phone</i>
                                                            </span>
                                                      </div>
                                                      <input type="number" id="phone" name="phone" class="form-control" placeholder="No Telepon" value="<?= set_value('phone'); ?>">
                                                </div>
                                                <?= form_error('phone', '<small class ="text-danger">', '</small>'); ?>
                                                <div class="input-group">
                                                      <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                  <i class="material-icons">face</i>
                                                            </span>
                                                      </div>
                                                      <input type="text" id="namadepan" name="namadepan" class="form-control" placeholder="Nama Depan" value="<?= set_value('namadepan'); ?>">
                                                </div>
                                                <?= form_error('namadepan', '<small class ="text-danger">', '</small>'); ?>
                                                <div class="input-group">
                                                      <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                  <i class="material-icons">face</i>
                                                            </span>
                                                      </div>
                                                      <input type="text" id="namabelakang" name="namabelakang" class="form-control" placeholder="Nama Belakang" value="<?= set_value('namabelakang'); ?>">
                                                </div>
                                                <?= form_error('namabelakang', '<small class ="text-danger">', '</small>'); ?>
                                                <div class="input-group">
                                                      <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                  <i class="material-icons">home</i>
                                                            </span>
                                                      </div>
                                                      <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                                                </div>
                                                <?= form_error('alamat', '<small class ="text-danger">', '</small>'); ?>
                                                <div class="input-group">
                                                      <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                  <i class="material-icons">lock_outline</i>
                                                            </span>
                                                      </div>
                                                      <input type="password" id="password" name="password" class="form-control" placeholder="Password...">
                                                </div>
                                                <?= form_error('password', '<small class ="text-danger">', '</small>'); ?>
                                                <div class="input-group">
                                                      <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                  <i class="material-icons">lock_outline</i>
                                                            </span>
                                                      </div>
                                                      <input type="password" id="password2" name="password2" class="form-control" placeholder="Re-Password...">
                                                </div>
                                                <?= form_error('password', '<small class ="text-danger">', '</small>'); ?>
                                          </div>
                                          <div class="footer text-center">
                                                <button type="submit" class="btn btn-primary btn-round" value="submit">Sign Up</button>
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<br><br>