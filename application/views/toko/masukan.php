<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">

                  <?= $this->session->flashdata('pesan'); ?>
                  <div class="row">
                        <div class="col col-md-5">
                              <div class="card wrapper">
                                    <img class="card-img-top" src="<?= base_url('assets/img/product/') . $produk['img_produk']; ?>" alt="Card image cap">
                                    <div class="card-img-overlay text-right">
                                          <p class="card-text btn btn-sm btn-primary btn-round">
                                                Rp.<?= $produk['harga_produk']; ?></p>
                                    </div>
                              </div>
                        </div>
                        <div class="col col-md-1">
                        </div>
                        <div class="col col-md-6">
                              <form action="<?= base_url(); ?>/toko/beri_masukan" method="post">
                                    <div class="card-body">
                                          <h3 class="title text-center ">Penilaian Produk <?= $produk['nama_produk']; ?></h3>
                                          <label for="masukan" class="card-title">Silahkan Beri Penilaian Terhadap Produk</label>
                                          <input name="masukan" id="masukan" class="form-control" placeholder="Masukan anda" required></input>

                                          <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
                                          <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
                                          <input type="hidden" name="id_toko" value="<?= $produk['id_toko']; ?>">
                                          <button type="submit" class="btn btn-primary btn-sm float-right">kirim Penilaian</button>
                                          <a href="<?= base_url('users/index') ?>" class="btn btn-info btn-sm float-right">Lewati</a>
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</div>
</div>