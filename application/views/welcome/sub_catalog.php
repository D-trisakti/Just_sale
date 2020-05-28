<div class="wrapper">
      <div class="page-header page-header-small">
            <?php
            if ($var >= 1 &&  $var <= 9) { ?>
            <div class="page-header-image" data-parallax="true"
                  style="background-image: url('<?= base_url(); ?>assets/img/catalog/pakaian.jpg')">
            </div>
            <?php } else if ($var > 9 &&  $var <= 14) {
            ?>
            <div class="page-header-image" data-parallax="true"
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

            <div class="content-center">
                  <div class="container">
                        <h1 class="title"><?= $banner['nama_sub_kategori']; ?></h1>
                  </div>
            </div>
      </div>

      <!-- grid -->
      <div class="container">
            <div class="row">
                  <?php foreach ($produk as $prod) : ?>
                  <div class="col-md-3">
                        <div class="card m-3" style="width: 15rem;">
                              <div class="card wrapper">
                                    <img class="card-img-top"
                                          src="<?= base_url('assets/uploads/') . $prod['img_produk']; ?>"
                                          alt="Card image cap">
                                    <div class="card-img-overlay text-right">
                                          <button class="btn btn-md btn-primary btn-round">
                                                <h5 class="card-title card-text"><?= $prod['harga_produk']; ?>,-IDR</h5>
                                          </button>
                                    </div>
                              </div>
                              <div class="card-body">
                                    <h4 class="card-title card-text"><?= $prod['nama_produk']; ?></h4>
                                    <p class="card-description card-text">
                                          <?= $prod['deskripsi_produk']; ?>
                                    </p>
                                    <a href="<?= base_url(); ?>welcome/not_login"
                                          class="btn btn-md btn-success btn-round">
                                          <h5 class="card-title card-text">Beli Sekarang </h5>
                                    </a>
                              </div>
                        </div>
                  </div>
                  <?php endforeach; ?>
            </div>
            <hr>
      </div>
</div>