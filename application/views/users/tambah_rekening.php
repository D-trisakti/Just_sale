<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <form action="" method="post">
                  <div class="container text-center">
                        <h3 class="title text-center">Tambah Rekening</h3>
                        <hr>
                        <div class="form-row ">
                              <!-- form nama -->
                              <div class="form-group col-md-4">
                                    <label for="bank">Nama Bank</label>
                                    <select name="bank" id="bank" class="custom-select" required>
                                          <option value="">PILIH BANK</option>
                                          <option value="BCA">BCA</option>
                                          <option value="MANDIRI">Mandiri</option>
                                          <option value="BNI">BNI</option>
                                          <option value="BRI">BRI</option>
                                          <option value="CIMB">CIMB Niaga</option>
                                          <option value="BUKOPIN">Bukopin</option>
                                    </select>
                              </div>
                              <!-- form harga -->
                              <div class="form-group col-md-4">
                                    <label for="norek">Nomor Rekening</label>
                                    <input type="text" class="form-control" id="norek" placeholder="No Rekening" required name="norek">
                              </div>
                              <!-- form jumlah -->
                              <div class="form-group col-md-4">
                                    <label for="pemilik">Pemilik Rekening</label>
                                    <input type="text" class="form-control" id="pemilik" placeholder="nama pemilik" required name="pemilik">
                              </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>

                  </div>
      </div>
      </form>
</div>
</div>