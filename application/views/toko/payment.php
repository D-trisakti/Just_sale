<div class="page-header header-filter" data-parallax="true"
      style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Pembayaran</h2>
                  <?= $this->session->flashdata('pesan'); ?>

                  <h5 class="text-center">Silahkan melakukan pembayaran ke rekening Aplikasi Just Sale BNI :1111230232
                        A/N admin Dengan Nominal Rp12312321.</h5>
                  <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">

                              <div class="card bordered">
                                    <img width="350" height="auto" id="output" />
                              </div>

                              <script>
                              var loadFile = function(event) {
                                    var reader = new FileReader();
                                    reader.onload = function() {
                                          var output = document.getElementById('output');
                                          output.src = reader.result;
                                    };
                                    reader.readAsDataURL(event.target.files[0]);
                              };
                              </script>
                              <label for="image">Upload Bukti Transfer</label>
                              <input type='file' id="image" name="image" accept=".png, .jpg, .jpeg"
                                    onchange="loadFile(event)">
                        </div>

                        <div class="col-md-4">

                        </div>
                  </div>
            </div>
            <h4 class="text-center">Rincian barang</h4>
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

                  <a href="<?= base_url(); ?>toko/thank_you"
                        class="text-title btn btn-md btn-success text-right">Lanjutkan Bayar</a>
            </div>
      </div>
</div>