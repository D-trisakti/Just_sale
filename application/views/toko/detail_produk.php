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
                              <div class="card-body">
                                    <h2 class="title text-center ">Detail Produk</h2>
                                    <h4 class="card-title"><?= $produk['nama_produk']; ?></h4>
                                    <p class="card-text"><?= $produk['deskripsi_produk']; ?></p>
                                    <form action="<?= base_url(); ?>/toko/add_keranjang_belanja" method="post">
                                          <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
                                          <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
                                          <input type="hidden" name="id_toko" value="<?= $produk['id_toko']; ?>">
                                          <button type="submit" class="btn btn-primary btn-sm float-right">Beli
                                                produk</button>
                                    </form>
                              </div>
                        </div>
                  </div>
                  <div class="card">
                        <div class="card-body">
                              <h4 class="card-title text-center">Ulasan Produk ini </h4>
                              <hr>
                              <table class="table table-borderless">
                                    <thead>
                                          <th class="text-center">nama</th>
                                          <th class="text-center"> isi ulasan</th>
                                    </thead>
                                    <?php foreach ($nilai as $i) : ?>
                                          <tbody>
                                                <tr>
                                                      <td class="text-center">
                                                            <?= $i['first_name'] ?> <?= $i['last_name'] ?>
                                                      </td>
                                                      <td class="text-center">
                                                            <?= $i['masukan'] ?>
                                                      </td>
                                                </tr>
                                          </tbody>
                                    <?php endforeach; ?>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>