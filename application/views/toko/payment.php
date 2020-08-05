<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Pembayaran</h2>
                  <?= $this->session->flashdata('pesan'); ?>
                  <form action="<?= base_url() ?>toko/thank_you" method="post" enctype="multipart/form-data">
                        <h5 class="text-center">Silahkan melakukan pembayaran ke rekening Aplikasi Just Sale BNI :1111230232
                              A/N admin Dengan Nominal Rp.<?= $nom; ?></h5>
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
                                    <input type='file' id="image" name="image" required accept=".png, .jpg, .jpeg" onchange="loadFile(event)">
                                    <input type="text" name="trs" value="<?= $trs; ?>">
                              </div>

                              <div class="col-md-4">

                              </div>
                        </div>
            </div>
            <button class="text-title btn btn-md btn-success text-right" value="submit">Kembali</button>
            <button class="text-title btn btn-md btn-success text-right float-right" value="submit">Lanjutkan Bayar</button>
            </form>
      </div>
</div>
</div>