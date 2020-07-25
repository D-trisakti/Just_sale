<!-- <?php
      if ($var >= 45 &&  $var <= 48) { ?>
      <div class="page-header header-filter clear-filter no-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/catalog/atasan.jpg');">
      <?php } else if ($var > 48 &&  $var <= 53) {
      ?>
            <div class="page-header header-filter clear-filter no-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/catalog/celana.jpg')">
            </div>
      <?php
      } else if ($var > 64 &&  $var <= 71) {
      ?>
            <div class="page-header header-filter clear-filter no-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/catalog/sepatu.jpg')">
            </div>
      <?php
      } else if ($var > 53 &&  $var <= 57) {
      ?>
            <div class="page-header header-filter clear-filter no-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/catalog/jaket.jpg')">
            </div>
      <?php
      } else if ($var > 57 &&  $var <= 62) {
      ?>
            <div class="page-header header-filter clear-filter no-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/catalog/stelan.jpg')">
            </div>
      <?php
      } else if ($var > 30 &&  $var <= 37) {
      ?>
            <div class="page-header-image" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/catalog/bg-tenda.jpg');">
            </div>
      <?php
      } else if ($var > 37 &&  $var <= 44) {
      ?>
            <div class="page-header-image" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/catalog/lainnya.jpg');">
            </div>
      <?php
      } else {
            //  echo "tidak dalam kategori";
      }
      ?> -->
<div class="page-header header-filter clear-filter no-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/brand_image.jpg');">
      <div class=" container">
            <div class="row">
                  <div class="col-md-8 ml-auto mr-auto">
                        <div class="brand">
                              <h1 class="title text-center"><?= $banner['nama_sub_kategori']; ?></h1>
                        </div>
                  </div>
            </div>
      </div>
</div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <div class="row">
                        <?php foreach ($produk as $prod) : ?>
                              <div class="col col-md-3">
                                    <div class="card" style="width: 15rem;">
                                          <img class="card-img-top" src="<?= base_url('assets/img/product/') . $prod['img_produk']; ?>" rel="nofollow" alt="Card image cap">
                                          <div class="card-img-overlay text-right">
                                                <div class="card-img-overlay text-right">
                                                      <p class="card-text btn btn-sm btn-primary btn-round">
                                                            Rp.<?= $prod['harga_produk']; ?>,-IDR</p>
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
            </div>
      </div>
</div>