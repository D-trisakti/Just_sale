<div class="page-header header-filter" data-parallax="true"
      style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Ulasan Produk</h2>
                  <?= $this->session->flashdata('pesan'); ?>
                  <h4 class="title text-center ">Silahkan Masukan Ulasan anda tentang produk ini</h4>
                  <label for="ulasan">
                        <textarea name="ulasan">Masukan Ulasan</textarea>
                  </label>
                  <h4 class="title text-center ">Beri Penilaian</h4>
            </div>
      </div>