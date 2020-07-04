<?php
if ($var >= 1 &&  $var <= 9) { ?>
<div class="page-header header-filter clear-filter no-filter" data-parallax="true"
      style="background-image: url('<?= base_url(); ?>assets/img/catalog/pakaian.jpg');">
      <?php } else if ($var > 9 &&  $var <= 14) {
      ?>
      <div class="page-header header-filter clear-filter no-filter" data-parallax="true"
            style="background-image: url('<?= base_url(); ?>assets/img/catalog/bg-combat.jpg')">
      </div>
      <?php
} else if ($var > 14 &&  $var <= 18) {
      ?>
      <div class="page-header-image" data-parallax="true"
            style="background-image: url('<?= base_url(); ?>assets/img/catalog/bg-sepatu.jpg');">
      </div>
      <?php
} else if ($var > 18 &&  $var <= 26) {
      ?>
      <div class="page-header-image" data-parallax="true"
            style="background-image: url('<?= base_url(); ?>assets/img/catalog/bg-kantong.jpg');">
      </div>
      <?php
} else if ($var > 26 &&  $var <= 30) {
      ?>
      <div class="page-header-image" data-parallax="true"
            style="background-image: url('<?= base_url(); ?>assets/img/catalog/kacamata.jpg');">
      </div>
      <?php
} else if ($var > 30 &&  $var <= 37) {
      ?>
      <div class="page-header-image" data-parallax="true"
            style="background-image: url('<?= base_url(); ?>assets/img/catalog/bg-tenda.jpg');">
      </div>
      <?php
} else if ($var > 37 &&  $var <= 44) {
      ?>
      <div class="page-header-image" data-parallax="true"
            style="background-image: url('<?= base_url(); ?>assets/img/catalog/lainnya.jpg');">
      </div>
      <?php
} else {
      echo "tidak dalam kategori";
}
      ?>
</div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <div class="brand">
                        <h2 class="title text-center"><?= $banner['nama_sub_kategori']; ?></h2>
                  </div>
                  <hr>
                  <div class="row">
                        <?php foreach ($produk as $prod) : ?>
                        <div class="col col-md-3">
                              <div class="card" style="width: 15rem;">
                                    <img class="card-img-top"
                                          src="<?= base_url('assets/uploads/') . $prod['img_produk']; ?>" rel="nofollow"
                                          alt="Card image cap">
                                    <div class="card-img-overlay text-right">
                                          <div class="card-img-overlay text-right">
                                                <p class="card-text btn btn-sm btn-primary btn-round">
                                                      Rp.<?= $prod['harga_produk']; ?>,-IDR</p>
                                          </div>
                                    </div>
                                    <div class="card-body">
                                          <h5 class="card-title"><?= $prod['nama_produk'] ?></h5>
                                          <p class="card-text"><?= $prod['deskripsi_produk'] ?></p>
                                          <a href="<?= base_url('toko/detail_produk') ?>/<?= $prod['id_produk']; ?>"
                                                class="card-title text-center btn btn-sm btn-rounded btn-rose">Beli</a>
                                    </div>
                              </div>
                        </div>
                        <?php endforeach ?>
                  </div>
            </div>
      </div>
</div>