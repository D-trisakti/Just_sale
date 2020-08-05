<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Terima Pesanan</h2>
                  <div class="row">
                        <div class="card">
                              <form action="<?= base_url() ?>toko/input_resi" method="post">
                                    <div class="card-body text-center">
                                          <h5 class="card-title text-center">Silahkan Masukan No Resi Pengiriman Yang Sesuai dengan Pesanan</h5>
                                          <input type="text" class="form-control" required name="resi" placeholder="No Resi">
                                          <input type="hidden" name="trs" value="<?= $trs ?>">
                                          <button class="btn btn-md btn-outline btn-primary btn-rounded  mt-5 " type="submit">Kirim Data</button>
                                    </div>

                        </div>
                        </form>
                  </div>
            </div>
      </div>
</div>