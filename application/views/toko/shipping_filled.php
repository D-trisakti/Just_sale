<script src="<?= base_url(); ?>assets/js/core/jquery.min.js" type="text/javascript"></script>
<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Pengiriman Barang</h2>
                  <?= $this->session->flashdata('pesan'); ?>
                  <hr>
                  <h4>Alamat Pengiriman</h4>
                  <div class="form-row">
                        <div class="col-sm-6">
                              <label for="alamat">alamat</label>
                              <input type="text" class="form-control" name="alamat" id="alamat" readonly value="<?= $user['address']; ?>">
                        </div>
                        <div class="col-sm-2">
                              <label for="kode_pos">Provinsi</label>
                              <select class="form-control" id="provinsi" name="provinsi" readonly>
                                    <option value="0">Pilih Provinsi</option>
                                    <?php
                                    for ($i = 0; $i < count($api_province); $i++) : ?>
                                          <option value="<?= $api_province[$i]->province_id ?>">
                                                <?= $api_province[$i]->province ?></option>
                                    <?php
                                    endfor;
                                    ?>
                              </select>
                        </div>
                        <div class="col-sm-2">
                              <label for="kota">Kota/Kabupaten</label>
                              <select class="form-control kota" id="kota" name="kota" readonly>
                                    <option value="0">Pilih Kota/kabupaten</option>
                              </select>
                        </div>
                        <div class="col-sm-2">
                              <label for="kode_pos">Kode Pos</label>
                              <input type="number" class="form-control" readonly name="kode_pos" id="kode_pos">
                        </div>
                  </div>
                  <div class="table-responsive">
                        <table class="table table-borderedless" id="dataTable" width="100%" cellspacing="0">
                              <?php foreach ($chart as $ca) : ?>
                                    <thead>
                                          <tr>
                                                <th colspan="5" class="alert alert-success">Toko Name : <?= $ca['nama_toko'] ?></th>
                                          </tr>
                                          <tr>
                                                <th>Nama Produk</th>
                                                <th>Harga Produk</th>
                                                <th>Jumlah</th>
                                                <th>Pesan pembelian</th>
                                                <th>
                                                      <p class="text-right">Total</p>
                                                </th>
                                          </tr>
                                    </thead>
                                    <?php $this->load->model('M_User');
                                    $produk = $this->M_User->get_data_chart_produk($ca['id_toko'], $ca['id_user']);
                                    foreach ($produk as $pd) :
                                    ?>
                                          <tr>
                                                <td><?= $pd['nama_produk'] ?></td>
                                                <td><?= $pd['harga_produk'] ?></td>
                                                <td><?= $pd['jumlah'] ?></td>
                                                <td>
                                                      <?php
                                                      for ($i = 0; $i < count($mix); $i++) {
                                                            if ($mix[$i]['id_pesan'] == $pd['id_pesan']) {
                                                                  echo $mix[$i]['pesan'];
                                                            }
                                                      }
                                                      ?>
                                                </td>
                                                <td>
                                                      <p class="text-right">
                                                            <?php
                                                            for ($i = 0; $i < count($mix); $i++) {
                                                                  if ($mix[$i]['id_pesan'] == $pd['id_pesan']) {
                                                                        echo $mix[$i]['subtotal'];
                                                                  }
                                                            }
                                                            ?>
                                                      </p>
                                                </td>
                                          </tr>
                                    <?php endforeach ?>
                                    <tr>
                                          <th>Ongkir</th>
                                          <th colspan="2"><select class="form-control" name="id_kurir" id="id_kurir">
                                                      <option value="jne">JNE</option>
                                                      <option value="pos">POS Indonesia</option>
                                                      <option value="tiki">TIKI</option>
                                                </select></th>
                                          <th colspan="1"><select class="form-control" name="id_kurir" id="id_kurir">
                                                      <option value="kilat">kilat</option>
                                                      <option value="reguler">reguler</option>
                                                </select></th>
                                          <th>
                                                <p class="text-right">Rp.0
                                                </p>
                                          </th>
                                    </tr>
                                    <tr>
                                          <th colspan="4">
                                                Subtotal
                                          </th>
                                          <th>
                                                <p class="text-right">
                                                      Rp.08808
                                                </p>
                                          </th>
                                    </tr>
                              <?php endforeach; ?>
                              <tfoot>
                                    <tr>
                                          <th colspan="4" class="alert alert-danger">Grand Total</th>
                                          <th class="alert alert-danger">
                                                <p class="text-right">
                                                      Rp.9000000000
                                                </p>
                                          </th>
                                    </tr>
                              </tfoot>
                        </table>
                        <script>
                              // function get_kota() {
                              //       var province_id = $('#provinsi').val();
                              //       $.ajax({
                              //             url: ' <?= base_url('users/get_kota ') ?> ',
                              //             data: province_id = province_id,
                              //             method: 'post',
                              //             dataType: 'json',
                              //             success: function(data) {
                              //                   $('#kota').val(data);
                              //             }
                              //       });
                              // }

                              $('#provinsi').change(function() {
                                    var province_id = $(this).val();
                                    $.ajax({
                                          url: " <?= base_url('toko/get_kota ') ?>",
                                          method: "POST",
                                          data: {
                                                province_id: province_id
                                          },
                                          async: false,
                                          dataType: 'json',
                                          success: function(data) {
                                                console.log(data);
                                                var html =
                                                      '     <option value="">Pilih kota/kabupaten</option>';
                                                var i;
                                                for (i = 0; i < data.length; i++) {

                                                      html += '<option  value="' + data[i].city_id + '/' + data[i].postal_code + '">' + data[i].type + ' ' + data[i].city_name + '</option>';
                                                }
                                                $('#kota').html(html);

                                          }
                                    });
                              });

                              $('#kota').change(function() {
                                    var id = $(this).val();
                                    id = id.split('/');
                                    var city_id = id[0];
                                    var postal_code = id[1];
                                    $('#kode_pos').val(postal_code);
                              });
                        </script>