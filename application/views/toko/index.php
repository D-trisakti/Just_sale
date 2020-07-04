<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <div class="container">
                  <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                              <div class="profile">
                                    <div class="avatar">
                                          <img src="<?= base_url('assets/img/store/') . $toko['img_toko']; ?>" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                                    </div>
                                    <div class="name">
                                          <h3 class="title">
                                                <?= $toko['nama_toko'] ?>
                                          </h3>
                                          <p class="card- description"><?= $toko['deskripsi_toko'] ?></p>
                                          <p class="card- description text-capitalize">Toko ini Beralamat di
                                                <?= $toko['address'] ?>
                                                kelurahan <?= $kelurahan_name['nama']; ?>,Kecamatan
                                                <?= $kecamatan_name['nama']; ?>,Kab/Kota <?= $kota_name['nama']; ?>,
                                                Provinsi <?= $prov_name['nama']; ?> HUB :(<?= $toko['phone']; ?>)
                                          </p>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <!-- <div class="description text-center">
                        <p>An artist of considerable range, Chet Faker &#x2014; the name taken by
                              Melbourne-raised, Brooklyn-based Nick Murphy &#x2014; writes, performs and
                              records all of his own music, giving it a warm, intimate feel with a solid
                              groove structure. </p>
                  </div> -->
                  <hr>
                  <h2 class="title text-center">Produk Dari Toko Ini</h2>
                  <div class="row">
                        <?php foreach ($produk as $prod) : ?>
                              <div class="col col-md-3">
                                    <div class="card" style="width: 15rem;">
                                          <img class="card-img-top" src="<?= base_url('assets/uploads/') . $prod['img_produk']; ?>" rel="nofollow" alt="Card image cap">
                                          <div class="card-body">
                                                <h5 class="card-title"><?= $prod['nama_produk'] ?></h5>
                                                <p class="card-text"><?= $prod['deskripsi_produk'] ?>.</p>
                                                <a href="<?= base_url('toko/detail_produk') ?>/<?= $prod['id_produk']; ?>" class="card-title text-center btn btn-sm btn-rounded btn-rose">Beli</a>
                                          </div>
                                    </div>
                              </div>
                        <?php endforeach ?>
                  </div>
            </div>
      </div>
</div>