<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center">Refund & Pembayaran Dana</h2>
                  <?= $this->session->flashdata('pesan'); ?>
                  <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                    <tr>
                                          <th>No Refund/transaksi</th>
                                          <th>Jenis Pembayaran</th>
                                          <th>Status</th>
                                          <th>Aksi</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php foreach ($rek as $rek) : ?>
                                          <tr>
                                                <td><?= $rek['id_order'] ?></td>
                                                <td><?= $rek['jenis_pembayaran'] ?></td>
                                                <td><?= $rek['status_retur'] ?></td>
                                                <td>
                                                      <a href="<?= base_url() ?>users/delete_rekening/<?= $rek['id_order'] ?>" class="btn btn-success" onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                            Detail</a>
                                                </td>
                                          </tr>
                                    <?php endforeach ?>
                              </tbody>
                        </table>

                  </div>
            </div>
      </div>