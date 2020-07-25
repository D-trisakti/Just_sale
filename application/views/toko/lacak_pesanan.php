<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Riwayat Pesanan</h2>
                  <div class="row">
                        <div class="col-md">
                              <div class="card">
                                    <div class="card-header">
                                          <div class="row">
                                                <div class="col-md-6">
                                                      <h4 class="card-title">No Transaksi :</h4>
                                                      <p class="category">Nama Pemesan :</p>
                                                      <p class="category">Alamat :</p>
                                                      <p class="category">Total :</p>

                                                </div>
                                                <div class="col-md-6">
                                                      <h4 class="card-title">Tanggal Transaksi :</h4>
                                                      <p class="category">Status Pemesan :</p>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="card-body">
                                          <h4 class="card-title">Detail Barang</h4>
                                    </div>
                                    <table class="table table-striped">
                                          <thead>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Satuan</th>
                                                <th>Jumlah</th>
                                                <th>Pesan Pembeli</th>
                                          </thead>
                                          <tbody>
                                                <tr>
                                                      <td>1</td>
                                                      <td>Sepatu PDL</td>
                                                      <td>Rp.300.000</td>
                                                      <td>5</td>
                                                      <td>1.500.000</td>
                                                      <th>Sepatu High</th>
                                                </tr>
                                          </tbody>
                                    </table>
                              </div>
                        </div>
                        <?= $this->session->flashdata('pesan'); ?>
                  </div>
            </div>
      </div>
</div>
</div>