<div class="page-header header-filter clear-filter no-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/head.jpg');">
</div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <div class="brand">
                        <h2 class="title text-center">Produk Terlaris</h2>
                  </div>
                  <hr>
                  <div class="row">
                        <?php foreach ($produk as $prod) : ?>
                              <div class="col col-md-3">
                                    <div class="card" style="width: 15rem;">
                                          <img class="card-img-top" src="<?= base_url('assets/img/product/') . $prod['img_produk']; ?>" rel="nofollow" alt="Card image cap">
                                          <div class="card-img-overlay text-right">
                                                <div class="card-img-overlay text-right">
                                                      <p class="card-text btn btn-sm btn-primary btn-round">
                                                            Rp.10000,-IDR</p>
                                                </div>
                                          </div>
                                          <div class="card-body">
                                                <h5 class="card-title"><?= $prod['nama_produk'] ?></h5>
                                                <p class="card-text"><?= $prod['deskripsi_produk'] ?></p>
                                                <a href="<?= base_url('toko/detail_produk') ?>/<?= $prod['id_produk']; ?>" class="card-title text-center btn btn-sm btn-rounded btn-rose">Beli</a>
                                          </div>
                                    </div>
                              </div>
                        <?php endforeach ?>
                  </div>
                  <h4 class="text-center">Temukan produk lainnya <a href="<?= base_url() ?>welcome/catalog">Disini !</a> !</h4>
                  <hr>

            </div>
      </div>
</div>