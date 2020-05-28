<div class="page-header header-filter" data-parallax="true"
      style="background-image: url('<?= base_url(); ?>assets/img/header.jpg');"></div>
<div class="main main-raised">
      <div class="profile-content">
            <hr>
            <div class="container">
                  <h2 class="title text-center ">Lacak Barang Barang</h2>
                  <?= $this->session->flashdata('pesan'); ?>
                  <p class="title text-left ">status Barang : sedang di kirim
                        <br>
                        No Resi : 0192380973912
                  </p>
                  <ul>
                        <li>[Solo] paket telah di terima (agent kurir, NO RESI)</li>
                        <li>[Solo] paket telah di dikirim</li>
                        <li>[Bandung] paket telah di terima </li>
                  </ul>
                  <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25"
                              aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                              aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75"
                              aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100"
                              aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
            </div>
      </div>