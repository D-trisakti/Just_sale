<!-- table barang -->
<div class="col-md 4">
      <div class="container">
            <?= $this->session->flashdata('pesan'); ?>
      </div>
</div>
<h3 class="title">Payment Dana <?= $master['id_transaksi'] ?></h3>
<br>
<br>
<div class="card">
      <?php if ($validation == 0) { ?>

            <div class="card-body">
                  <h6 class="card-header">User Belum Memiliki Rekening, <a href="<?= base_url() ?>admin/pending_bayar/<?= $master['id_transaksi'] ?>">Pending Pembayaran</a></h6>
            </div>
      <?php } else { ?>
            <form action="<?= base_url(); ?>admin/bayar_payment" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                        <div class="form-row">
                              <div class="col col-md-4 mb-3">
                                    <label for="rekening">Pilih Rekening Pembayaran</label>
                                    <select name="rekening" id="rekening" class="form-control" required>
                                          <option value="">--Rekening Pembayaran--</option>
                                          <?php foreach ($rek as $rek) : ?>
                                                <option value="<?= $rek['no_rek'] ?>"><?= $rek['no_rek'] ?></option>
                                          <?php endforeach; ?>
                                    </select>
                                    <script>
                                          $("#rekening").change(function() {
                                                var rek = $(this).val();
                                                $.ajax({
                                                      url: "<?= base_url('admin/get_rekening_detail') ?>",
                                                      method: "post",
                                                      dataType: "json",
                                                      data: {
                                                            rek: rek
                                                      },
                                                      success: function(data) {
                                                            console.log(data.bank);
                                                            $("#bank").val(data.bank);
                                                            $("#nama").val(data.pemilik);
                                                      }
                                                });

                                          });
                                    </script>
                              </div>
                              <div class="col col-md-4 mb-3">
                                    <label for="bank">Bank Pembayaran</label>
                                    <input type="text" name="bank" id="bank" readonly class="form-control">
                              </div>
                              <div class="col col-md-4 mb-3">
                                    <label for="bank">Pemilik Rekening</label>
                                    <input type="text" name="nama" id="nama" readonly class="form-control">
                              </div>
                              <div class="col-md-4 ">
                                    <label for="image">Upload Bukti Transfer</label>
                                    <input type='file' id="image" name="image" required accept=".png, .jpg, .jpeg" onchange="loadFile(event)" required>
                              </div>
                              <div class="col-md-8">

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
                              </div>
                        </div>
                  </div>
                  <input type="hidden" name="id" value="<?= $master['id_order'] ?>">
                  <button class="btn btn-md btn-rounded btn-info btn-outline float-right mt-2 md-2" type="submit">Kirim</button>
            <?php } ?>

</div>

</form>
</div>