<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Tolak Pesanan</h2>
                  <div class="row">
                        <div class="card">
                              <form action="<?= base_url() ?>toko/tolak_pemesanan" method="post">
                                    <div class="card-body text-center">
                                          <h5 class="card-title text-center">Silahkan Alasan Penolakan Pesanan</h5>
                                          <input type="text" class="form-control" name="alasan" placeholder="Alasan Penolakan" required>
                                          <input type="hidden" name="trs" value="<?= $trs ?>">
                                          <button class="btn btn-md btn-outline btn-primary btn-rounded  mt-5 " type="submit">Kirim Data</button>
                                    </div>

                        </div>
                        </form>
                  </div>
            </div>
      </div>
</div>