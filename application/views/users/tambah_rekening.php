<div class="page-header header-filter" data-parallax="true"
      style="background-image: url('<?= base_url();?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <form>
                  <div class="container text-center">
                        <h3 class="title text-center">Tambah Rekening</h3>
                        <hr>
                        <div class="form-row ">
                              <!-- form nama -->
                              <div class="form-group col-md-4">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control" id="nama_produk" placeholder="Nama Produk">
                              </div>
                              <!-- form harga -->
                              <div class="form-group col-md-4">
                                    <label for="harga_produk">Harga Produk</label>
                                    <input type="text" class="form-control" id="harga_produk"
                                          placeholder="Harga Produk">
                              </div>
                              <!-- form jumlah -->
                              <div class="form-group col-md-4">
                                    <label for="Jumlah_produk">Jumlah produk</label>
                                    <input type="text" class="form-control" id="jumlah_produk"
                                          placeholder="Jumlah Produk">
                              </div>
                              <!-- form kategori -->
                              <div class="form-group col-md-2">
                                    <label for="kategori">kategori produk</label>
                                    <select type="text" class="form-control" id="Kategori">
                                          <option value="">1</option>
                                          <option value="">2</option>
                                          <option value="">3</option>
                                    </select>
                              </div>
                              <!-- form-sub-kategori -->
                              <div class="form-group col-md-2">
                                    <label for="subkategori"> sub -kategori produk</label>
                                    <select type="text" class="form-control" id="subkategori">
                                          <option value="">1</option>
                                          <option value="">2</option>
                                          <option value="">3</option>
                                    </select>
                              </div>
                              <!-- form-deskripsi-produk -->
                              <div class="form-group col-md-8">
                                    <label for="deskripsi_produk">Deskripsi Produk</label>
                                    <textarea class="form-control" id="deskripsi_produk" rows="3"></textarea>
                              </div>

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
                              </div>
                              <div class="col-md-3">
                                    <label for="image">Gambar Produk</label>
                                    <input type='file' id="image" name="image" accept=".png, .jpg, .jpeg"
                                          onchange="loadFile(event)" required>
                              </div>

                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>

                  </div>
      </div>
      </form>
</div>
</div>