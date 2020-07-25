<div class="page-header header-filter clear-filter no-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/brand_image.jpg');">
      <div class=" container">
            <div class="row">
                  <div class="col-md-8 ml-auto mr-auto">
                        <div class="brand">
                              <h1 class="title text-center">Katalog Produk.</h1>
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
                        <div class="col col-md-4">
                              <div class="card md-3">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/img/catalog/pakaian.png" alt="Card image cap">
                                    <div class="card-body">
                                          <ul class="list-group list-group-flush">
                                                <?php foreach ($pakaian as $pakai) : { ?>
                                                            <li class="list-group-item"><a href="<?= base_url(); ?>users/sub_katalog/<?= $pakai['id_sub_kategori'] ?>" class="card-title"><?= $pakai['nama_sub_kategori'] ?></a>
                                                            </li>
                                                <?php }
                                                endforeach ?>
                                          </ul>
                                    </div>
                              </div>
                        </div>
                        <div class="col col-md-4">
                              <div class="card md-3">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/img/catalog/celana.png" alt="Card image cap">
                                    <div class="card-body">
                                          <ul class="list-group list-group-flush">
                                                <?php foreach ($tempur as $pakai) : { ?>
                                                            <li class="list-group-item"><a href="<?= base_url(); ?>users/sub_katalog/<?= $pakai['id_sub_kategori'] ?>" class="card-title"><?= $pakai['nama_sub_kategori'] ?></a>
                                                            </li>
                                                <?php }
                                                endforeach ?>
                                          </ul>
                                    </div>
                              </div>
                        </div>
                        <div class="col col-md-4">
                              <div class="card md-3">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/img/catalog/sepatu.png" alt="Card image cap">
                                    <div class="card-body">
                                          <ul class="list-group list-group-flush">
                                                <?php foreach ($sepatu as $pakai) : { ?>
                                                            <li class="list-group-item"><a href="<?= base_url(); ?>users/sub_katalog/<?= $pakai['id_sub_kategori'] ?>" class="card-title"><?= $pakai['nama_sub_kategori'] ?></a>
                                                            </li>
                                                <?php }
                                                endforeach ?>
                                          </ul>
                                    </div>
                              </div>
                        </div>
                        <div class="col col-md-4">
                              <div class="card md-3">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/img/catalog/tas.png" alt="Card image cap">
                                    <div class="card-body">
                                          <ul class="list-group list-group-flush">
                                                <?php foreach ($tas as $pakai) : { ?>
                                                            <li class="list-group-item"><a href="<?= base_url(); ?>users/sub_katalog/<?= $pakai['id_sub_kategori'] ?>" class="card-title"><?= $pakai['nama_sub_kategori'] ?></a>
                                                            </li>
                                                <?php }
                                                endforeach ?>
                                          </ul>
                                    </div>
                              </div>
                        </div>
                        <div class="col col-md-4">
                              <div class="card md-3">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/img/catalog/jaket.png" alt="Card image cap">
                                    <div class="card-body">
                                          <ul class="list-group list-group-flush">
                                                <?php foreach ($mata as $pakai) : { ?>
                                                            <li class="list-group-item"><a href="<?= base_url(); ?>users/sub_katalog/<?= $pakai['id_sub_kategori'] ?>" class="card-title"><?= $pakai['nama_sub_kategori'] ?></a>
                                                            </li>
                                                <?php }
                                                endforeach ?>
                                          </ul>
                                    </div>
                              </div>
                        </div>
                        <div class="col col-md-4">
                              <div class="card md-3">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/img/catalog/stelan.png" alt="Card image cap">
                                    <div class="card-body">
                                          <ul class="list-group list-group-flush">
                                                <?php foreach ($camp as $pakai) : { ?>
                                                            <li class="list-group-item"><a href="<?= base_url(); ?>users/sub_katalog/<?= $pakai['id_sub_kategori'] ?>" class="card-title"><?= $pakai['nama_sub_kategori'] ?></a>
                                                            </li>
                                                <?php }
                                                endforeach ?>
                                          </ul>
                                    </div>
                              </div>
                        </div>
                        <div class="col col-md 4">
                              <div class="card md-3">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/img/catalog/baju-renang.png" alt="Card image cap">
                                    <div class="card-body">
                                          <ul class="list-group list-group-flush">
                                                <?php foreach ($lainnya as $pakai) : { ?>
                                                            <li class="list-group-item"><a href="<?= base_url(); ?>users/sub_katalog/<?= $pakai['id_sub_kategori'] ?>" class="card-title"><?= $pakai['nama_sub_kategori'] ?></a>
                                                            </li>
                                                <?php }
                                                endforeach ?>
                                          </ul>
                                    </div>
                              </div>
                        </div>
                        <div class="col col-md 4">
                              <div class="card md-3">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/img/catalog/aksesoris.png" alt="Card image cap">
                                    <div class="card-body">
                                          <ul class="list-group list-group-flush">
                                                <?php foreach ($lainnya as $pakai) : { ?>
                                                            <li class="list-group-item"><a href="<?= base_url(); ?>users/sub_katalog/<?= $pakai['id_sub_kategori'] ?>" class="card-title"><?= $pakai['nama_sub_kategori'] ?></a>
                                                            </li>
                                                <?php }
                                                endforeach ?>
                                          </ul>
                                    </div>
                              </div>
                        </div>
                        <div class="col col-md 4">
                              <div class="card md-3">
                                    <img class="card-img-top" src="<?= base_url(); ?>assets/img/catalog/lainnya.png" alt="Card image cap">
                                    <div class="card-body">
                                          <ul class="list-group list-group-flush">
                                                <?php foreach ($lainnya as $pakai) : { ?>
                                                            <li class="list-group-item"><a href="<?= base_url(); ?>users/sub_katalog/<?= $pakai['id_sub_kategori'] ?>" class="card-title"><?= $pakai['nama_sub_kategori'] ?></a>
                                                            </li>
                                                <?php }
                                                endforeach ?>
                                          </ul>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>