<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center">Kelola rekening</h2>
                  <?= $this->session->flashdata('pesan'); ?>
                  <div class="table-responsive">
                        <a href="<?= base_url() ?>users/tambah_rekening" class="btn btn-success float-right">
                              Tambah</a>
                        <a href="<?= base_url() ?>users/retur_pembayaran" class="btn btn-info float-right">
                              Retur & Pembayaran Dana</a>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                    <tr>
                                          <th>Nama Bank</th>
                                          <th>Nomor Rekening</th>
                                          <th>Pemilik Rekening</th>
                                          <th>Aksi</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    <?php foreach ($rek as $rek) : ?>
                                          <tr>
                                                <td><?= $rek['bank'] ?></td>
                                                <td><?= $rek['no_rek'] ?></td>
                                                <td><?= $rek['pemilik'] ?></td>
                                                <td>
                                                      <a href="<?= base_url() ?>users/delete_rekening/<?= $rek['no_rek'] ?>" class="btn btn-danger" onclick="return confirm ('Apakah anda akan menonaktifkan Toko ini ?');">
                                                            Hapus</a>
                                                </td>
                                          </tr>
                                    <?php endforeach ?>
                              </tbody>
                        </table>

                  </div>
            </div>
      </div>
</div>
</div>