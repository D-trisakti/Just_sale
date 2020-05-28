<div class="page-header header-filter" data-parallax="true"
      style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Pengiriman Barang</h2>
                  <?= $this->session->flashdata('pesan'); ?>
                  <div class="form-row">
                        <!-- form-alamat -->
                        <div class="form-group col-sm-8">
                              <div class="card-body">
                                    <Label class="col col-label text-left">
                                          <h6>Alamat</h6>
                                    </Label>
                                    <div class="input-group no-border input-lg">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                      <i class="fas fa-home"></i>
                                                </span>
                                          </div>
                                          <input type="text" placeholder="Alamat" class="form-control" name="alamat"
                                                value="">
                                    </div>
                                    <?= form_error('alamat', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                              </div>
                        </div>
                        <!-- form-kode pos -->
                        <div class="form-group col-sm-4">
                              <div class="card-body">
                                    <Label class="col col-label text-left">
                                          <h6>Kode Pos</h6>
                                    </Label>
                                    <div class="input-group no-border input-lg">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                      <i class="fab fa-usps"></i>
                                                </span>
                                          </div>
                                          <input type="number" placeholder="Kode Pos" class="form-control"
                                                name="kode_pos" value="">
                                    </div>
                                    <?= form_error('kode_pos', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                              </div>
                        </div>
                        <!-- form-provinsi -->
                        <div class="form-group col-sm-3">
                              <div class="card-body">
                                    <Label class="col col-label text-left">
                                          <h6>Provinsi</h6>
                                    </Label>
                                    <div class="input-group no-border input-lg">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                      <i class="fas fa-map"></i>
                                                </span>
                                          </div>
                                          <select class="form-control" id="provinsi" name="provinsi" required>
                                                <option value="<?= $user['provinsi']; ?>">
                                                      <?= $prov_name['nama']; ?>
                                                </option>
                                                <?php foreach ($province as $prov) : ?>
                                                <option value="<?= $prov['id_propinsi']; ?>">
                                                      <?= $prov['nama_propinsi']; ?>
                                                </option>
                                                <?php endforeach ?>


                                          </select>
                                    </div>
                              </div>
                              <?= form_error('provinsis', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                        </div>
                        <!-- form-kota -->
                        <div class="form-group col-sm-3">
                              <div class="card-body">
                                    <Label class="col col-label text-left" for="kabupaten / kota">
                                          <h6>kabupaten/ Kota</h6>
                                    </Label>
                                    <div class="input-group no-border input-lg">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                      <i class="fas fa-map-marked"></i>
                                                </span>
                                          </div>
                                          <select class="form-control kota" id="kota" name="kota" required>
                                                <option value="<?= $user['kota']; ?>"><?= $kota_name['nama']; ?>
                                                </option>
                                          </select>
                                    </div>
                              </div>
                              <?= form_error('kotas', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                        </div>
                        <!-- form-kecamatan -->
                        <div class="form-group col-sm-3">
                              <div class="card-body">
                                    <Label class="col col-label text-left" for="kecamatan">
                                          <h6>kecamatan</h6>
                                    </Label>
                                    <div class="input-group no-border input-lg">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                      <i class="fas fa-map-marked-alt"></i>
                                                </span>
                                          </div>
                                          <select class="form-control" id="kecamatan" name="kecamatan" required>
                                                <option value="<?= $user['kecamatan']; ?>">
                                                      <?= $kecamatan_name['nama']; ?>
                                                </option>
                                          </select>
                                    </div>
                              </div>
                              <?= form_error('kecamatan', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                        </div>
                        <!-- form-kelurahan -->
                        <div class="form-group col-sm-3">
                              <div class="card-body">
                                    <Label class="col col-label text-left" for="kelurahan">
                                          <h6>Kelurahan</h6>
                                    </Label>
                                    <div class="input-group no-border input-lg">
                                          <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                      <i class="fas fa-map-marker"></i>
                                                </span>
                                          </div>
                                          <select class="form-control" id="kelurahan" name="kelurahan" required>
                                                <option value="<?= $user['kelurahan']; ?>">
                                                      <?= $kelurahan_name['nama']; ?>
                                                </option>
                                          </select>
                                    </div>
                              </div>
                              <?= form_error('kelurahan', '<h6 class ="text-danger pl-3">', '</h6>'); ?>
                        </div>
                  </div>
                  <div class="table-striped">
                        <table class="table table-borderedless" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                    <tr>
                                          <th>Nama Produk</th>
                                          <th>Harga Produk</th>
                                          <th>Jumlah</th>
                                          <th>Pesan pembelian</th>
                                          <th>Total</th>
                                    </tr>
                              </thead>
                              <tr>
                                    <td>Tenda Loreng ukuran 4x4 waterpoof</td>
                                    <td>Rp.1.000.000</td>
                                    <td>2</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, enim optio? Ullam
                                          amet assumenda itaque iusto atque unde omnis perspiciatis nesciunt earum animi
                                          culpa odio rem cum voluptatum, exercitationem reiciendis.</td>
                                    <td>Rp.2.000.000</td>
                              </tr>
                              <tfoot>
                                    <tr>
                                          <th colspan="4">Grand Total</th>
                                          <th colspan="2">Rp.0</th>
                                    </tr>
                              </tfoot>
                        </table>

                        <a href="<?= base_url(); ?>toko/payment"
                              class="text-title btn btn-md btn-success text-right">Lanjutkan Bayar</a>
                  </div>
            </div>
      </div>