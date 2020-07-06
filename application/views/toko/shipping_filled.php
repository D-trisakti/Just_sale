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
                              <?php 
							  foreach ($chart as $ca) : ?>
                                    <thead>
                                          <tr>
                                                <th class="alert alert-success">Toko Name : <?= $ca['nama_toko'] ?></th>
                                          </tr>
                                          <input type="hidden" value="<?= $ca['toko_kota'] ?>" id="<?= $ca['id_toko'] ?>toko_kota" name="toko_kota[]">
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
                                                      <p class="text-right" id="<?= $ca['id_toko'] ?><?= $pd['id_pesan'] ?>t">
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
                                          <th colspan="2"><select class="form-control" name="id_kurir" id="<?= $ca['id_toko'] ?>id_kurir">
                                                      <option value="0">Pilih Kurir</option>
                                                      <option value="pos">POS Indonesia</option>
                                                      <option value="jne">JNE</option>
                                                      <option value="tiki">TIKI</option>
                                                </select></th>
                                          <th colspan="1"><select class="form-control" name="id_layanan" id="<?= $ca['id_toko'] ?>id_layanan">
                                                      <option value="0">Pilih Layanan</option>
                                                </select></th>
                                          <th>
                                                <p class="text-right" id="<?= $ca['id_toko'] ?>ongkir">Rp.0
                                                </p>
                                          </th>
                                    </tr>
                                    <tr>
                                          <th colspan="4">
                                                Subtotal
                                          </th>
                                          <th>
												<input type="hidden" id="<?= $ca['id_toko'] ?>subasli">
                                                <p class="text-right" id="<?= $ca['id_toko'] ?>sub">
													Rp. 0
                                                </p>
                                          </th>
                                    </tr>
                                    <script>
                                          <?php $this->load->model('M_User');
                                          $produk = $this->M_User->get_data_chart_produk($ca['id_toko'], $ca['id_user']);
                                          $tot = 0;
                                          foreach ($produk as $pd) :
                                                for ($i = 0; $i < count($mix); $i++) {
                                                      if ($mix[$i]['id_pesan'] == $pd['id_pesan']) {
                                                            //echo $mix[$i]['subtotal'];
                                                            $t =  explode(" ", $mix[$i]['subtotal']);
                                                            $tot = $tot + $t[1];
                                                      }
                                                }
                                          endforeach;

                                          ?>
                                          $("#<?= $ca['id_toko'] ?>subasli").val('<?= $tot ?>');
                                    </script>
                                    <script>
                                          $('#<?= $ca['id_toko'] ?>id_kurir').change(function() {
                                                var kurir = $(this).val();
                                                var city_id = $("#kota").val();
                                                city_id = city_id.split('/');
                                                var city = city_id[0];
                                                var origin = city;
                                                var des = $("#<?= $ca['id_toko'] ?>toko_kota").val();
                                                $.ajax({
                                                      url: " <?= base_url('toko/get_ongkir ') ?>",
                                                      method: "POST",
                                                      data: {
                                                            origin: origin,
                                                            des: des,
                                                            kurir: kurir
                                                      },
                                                      //async: false,
                                                      dataType: 'json',
                                                      success: function(data) {
                                                            console.log(data);
                                                            var html =
                                                                  '<option value="0">Pilih Layanan</option>';
                                                            var i;
                                                            for (i = 0; i < data.length; i++) {
                                                                  console.log(data[i].cost[0]);
                                                                  html += '<option  value="' + data[i].service + '/' + data[i].cost[0].value + '">' + data[i].description + '</option>';
                                                            }
                                                            $('#<?= $ca['id_toko'] ?>id_layanan').html(html);
                                                      }
                                                });
                                          });
                                          $('#<?= $ca['id_toko'] ?>id_layanan').change(function() {
                                                var value = $(this).val();
                                                value = value.split('/');
                                                cost = value[1];
												var sub =  $("#<?= $ca['id_toko'] ?>subasli").val();
												var sub_total = parseInt(sub)+parseInt(cost);
                                                //console.log(cost);
                                                $('#<?= $ca['id_toko'] ?>ongkir').html(cost);
												$("#<?= $ca['id_toko'] ?>sub").html('Rp. '+sub_total);
                                          });
										  $('#<?= $ca['id_toko'] ?>id_layanan').change(function() {
                                                var value = $(this).val();
                                                value = value.split('/');
                                                cost = value[1];
												var sub =  $("#<?= $ca['id_toko'] ?>subasli").val();
												var sub_total = parseInt(sub)+parseInt(cost);
                                                //console.log(cost);
                                                $('#<?= $ca['id_toko'] ?>ongkir').html(cost);
												$("#<?= $ca['id_toko'] ?>sub").html('Rp. '+ sub_total);
												
												//var z = $("#grand").val(sub_total);
												console.log(z);
                                          });
									</script>
                              <?php endforeach; ?>
                              <tfoot>
                                    <tr>
                                          <th colspan="4" class="alert alert-danger">Grand Total</th>
                                          <th class="alert alert-danger">
                                                <p class="text-right" >
                                                      <input type="text" id="grand">
                                                </p>
                                          </th>
                                    </tr>
                              </tfoot>
                        </table>
						<script>
							setInterval(function(){ 
								var grand_total = 0;
								<?php foreach ($chart as $ca) : ?>
									var sub = $("#<?= $ca['id_toko'] ?>sub").html()
									sub = sub.split(" ");
									grand_total = parseInt(grand_total) + parseInt(sub[1]);
								<?php endforeach;?>
								$("#grand").val(grand_total);
							 }, 1000);
						</script>
                        <script>
                              $('#provinsi').change(function() {
                                    var province_id = $(this).val();
                                    $.ajax({
                                          url: " <?= base_url('toko/get_kota') ?>",
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

                              $('#id_kurir').change(function() {
                                    var city_id = $("#kota").val();
                                    city_id = city_id.split('/');
                                    var city = city_id[0];
                                    var origin = city;
                                    var des = $("#toko_kota").val();
                                    console.log(des);
                                    $.ajax({
                                          url: " <?= base_url('toko/get_ongkir ') ?>",
                                          method: "POST",
                                          data: {
                                                origin: origin
                                          },
                                          //async: false,
                                          dataType: 'json',
                                          success: function(data) {
                                                console.log(data);
                                          }
                                    });
                              });
                        </script>