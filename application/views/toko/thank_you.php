<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Pemberitahuan</h2>
                  <?= $this->session->flashdata('pesan'); ?>
                  <hr>
                  <div class="card">
                        <h5 class="card-title text-center">Terima kasih Sudah Percaya berbelanja di website Just Sale Pesanan Anda Dengan Nomor :<?= $trs; ?> Sedang
                              Kami Proses</h5>
                        <a href="<?= base_url() ?>toko/keranjang_belanja" class="btn btn-primary btn-rounded btn-md">keranjang Belanja</a>
                        <a href="<?= base_url() ?>toko/riwayat_pembelian" class="btn btn-info btn-rounded btn-md float-left">Lihat Pesanan</a>

                  </div>
            </div>
      </div>
</div>