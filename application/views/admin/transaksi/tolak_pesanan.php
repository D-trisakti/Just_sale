<!-- table barang -->
<div class="col-md 4">
      <div class="container">
            <?= $this->session->flashdata('pesan'); ?>
      </div>
</div>
<h3 class="title">tolak Pemesanan <?= $master['id_transaksi'] ?></h3>
<br>
<br>
<div class="card">
      <form action="<?= base_url(); ?>admin/proses_tolak" method="post">
            <div class="card-body">
                  <h5>Silahkan Masukan alasan Penolakan Pesanan</h5>
                  <input type="text" name="alasan" required class="form-control">
                  <input type="hidden" name="id" value="<?= $master['id_transaksi'] ?>">
                  <button class="btn btn-md btn-rounded btn-info btn-outline float-right mt-2 md-2" type="submit">Kirim</button>
            </div>

      </form>
</div>