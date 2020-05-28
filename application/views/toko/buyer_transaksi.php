<div class="page-header header-filter" data-parallax="true"
      style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Keranjang Belanja</h2>
                  <a href="<?= base_url(); ?>toko/shipping"
                        class="text-title btn btn-md btn-success float-right">Riwayat
                        Transaksi</a>
                  <?= $this->session->flashdata('pesan'); ?>
                  <div class="table-striped">
                        <table class="table table-borderedless" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                    <tr>
                                          <th>Nama Produk</th>
                                          <th>Harga Produk</th>
                                          <th>Jumlah</th>
                                          <th>Pesan pembelian</th>
                                          <th>Total</th>
                                          <th>aksi</th>
                                    </tr>
                              </thead>
                              <tbody>

                                    <tr>
                                          <td>Lorem ipsum dolor sit amet consectetur
                                                adipisicing elit. Nobis id qui, doloribus nostrum sint deserunt odit
                                                consequatur, laudantium possimus, rerum quod laboriosam. Cumque esse
                                                iusto sit nisi culpa pariatur consequuntur.</td>
                                          <td>
                                                Lorem ipsum dolor sit amet consectetur
                                                adipisicing elit. Dignissimos deleniti, at quo soluta dicta ullam
                                                facilis totam doloremque nam natus ex alias consequuntur libero, quia
                                                expedita iste quae! Facilis, voluptatem.
                                          </td>

                                          <td>
                                                <button
                                                      onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                      class="btn btn-primary btn-round btn-sm">-</button>
                                                <input class="form-control" min="0" name="quantity" value="1"
                                                      type="number" style="width: 50px;">
                                                <button
                                                      onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                      class="btn btn-primary btn-round btn-sm">+</button>
                                          </td>
                                          <td>
                                                <input type="text" id="total" class="form-control">
                                          </td>
                                          <td>
                                                <input type="text" readonly class="form-control">
                                          <td><a href="<?= base_url(); ?>toko/trace" class="btn btn-danger">Lihat
                                                      Riwayat Pengiriman</button></td>
                                    </tr>

                              </tbody>

                              <tfoot>
                                    <tr>
                                          <th colspan="4">Grand Total</th>
                                          <th colspan="2">Rp.0</th>
                                    </tr>
                              </tfoot>
                        </table>

                        <a href="<?= base_url(); ?>toko/shipping"
                              class="text-title btn btn-md btn-success text-right">Lanjutkan Bayar</a>
                  </div>
            </div>
      </div>