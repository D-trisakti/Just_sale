<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center">Lacak Barang</h2>
                  <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                    <?php $fil = 0;
                                    foreach ($chart as $ca) :
                                    ?>
                                          <tr>
                                                <th>nama toko: <?= $ca['nama_toko']; ?></th>
                                          </tr>
                                          <tr>
                                                <th>no pesan</th>
                                                <th>Nama Pemesan</th>
                                                <th>Alamat Pemesan</th>
                                                <th>Nama Produk</th>
                                                <th>Jumlah Barang</th>
                                                <th>Harga Produk</th>
                                                <th>total pembayaran</th>
                                                <th>Catatan Pemesan</th>
                                                <th>Aksi</th>
                                          </tr>
                              </thead>
                              <tbody>

                                    <?php $this->load->model('M_User');
                                          $produk = $this->M_User->get_data_chart_produk_temp($ca['id_toko'], $ca['id_user']);
                                          foreach ($produk as $pd) :
                                                if ($pd['id_pesan'] == $filter[$fil]) {
                                    ?>
                                                <tr>
                                                      <td><?= $pd['id_pesan']; ?></td>
                                                      <td>2</td>
                                                      <td>3</td>
                                                      <td>4</td>
                                                      <td>5</td>
                                                      <td>6</td>
                                                      <td>7</td>
                                                      <td>8</td>
                                                </tr>
                                    <?php
                                                }
                                                $fil++;
                                          endforeach; ?>
                              </tbody>
                        <?php
                                    endforeach; ?>
                        </table>

                  </div>
            </div>
      </div>