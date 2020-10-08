<?php
defined('BASEPATH') or exit('no scipt direct access allowed');

class M_user extends CI_Model
{
      public function get_toko($id)
      {
            return $data = $this->db->query("SELECT * FROM toko WHERE user_id = '$id'")->result_array();
      }

      public function get_toko_pesan($id)
      {
            return $data = $this->db->query("
            select

            *,
            (select count(t.id_transaksi) from transaksi t,keranjang k where t.id_transaksi = k.id_transaksi and k.id_toko = toko.id_toko and t.status = 'Pesanan Diteruskan Ke Penjual') jumlah_pesanan
            
            from toko where user_id = '$id'
            ")->result_array();
      }
      public function get_toko_by_id($id_toko)
      {
            return $data = $this->db->query("SELECT * FROM toko WHERE id_toko = '$id_toko'")->row_array();
      }
      // function check_toko($id)
      // {
      //       $query_if = $this->db->query("SELECT IF(user_id IS NOT NULL, 'TRUE', user_id) user_id FROM toko where user_id ='$id'")->result();
      //       $data = null;
      //       if ($query_if == "TRUE") {
      //             $data = 'TRUE';
      //       } else ($query_if != 'TRUE'){
      //             $data = 'FALSE'};
      //       return $data;
      // }
      public function edit_user()
      {
            $id = $this->input->post('id');
            $first_name = ($this->input->post('nama_depan'));
            $lastname = ($this->input->post('nama_belakang'));
            $phone = ($this->input->post('notelepon'));
            $address = ($this->input->post('alamat'));
            $postal_code = ($this->input->post('kode_pos'));
            $provinsi = ($this->input->post('provinsi'));
            $kota = ($this->input->post('kota'));
            $kecamatan = ($this->input->post('kecamatan'));
            $kelurahan = ($this->input->post('kelurahan'));
            $TTL = ($this->input->post('TTL'));

            $this->db->query("UPDATE user SET first_name = '$first_name', last_name ='$lastname',phone = '$phone', address='$address', postal_code='$postal_code',provinsi ='$provinsi',kota='$kota',kecamatan='$kecamatan',kelurahan='$kelurahan',TTL='$TTL' WHERE id ='$id' ");
      }
      public function create_toko()
      {
            $userid = $this->input->post('id');
            $nama_toko =  htmlspecialchars($this->input->post('nama_toko'), true);
            $deskripsi = htmlspecialchars($this->input->post('Deskripsi_toko'), true);
            $phone = htmlspecialchars($this->input->post('notelepon'), true);
            $kode_pos = htmlspecialchars($this->input->post('kode_pos'), true);
            $alamat = htmlspecialchars($this->input->post('alamat'), true);
            $provinsi = htmlspecialchars($this->input->post('provinsi'), true);
            $kota = htmlspecialchars($this->input->post('kota'), true);
            $kecamatan = htmlspecialchars($this->input->post('kecamatan'), true);
            $kelurahan = htmlspecialchars($this->input->post('kelurahan'), true);
            $img = $this->upload->data('file_name');

            $this->db->query("INSERT INTO toko (user_id,nama_toko,deskripsi_toko,phone,postal_code,address,provinsi,kota,kecamatan,kelurahan,img_toko) values ('$userid','$nama_toko','$deskripsi','$phone','$kode_pos','$alamat','$provinsi','$kota','$kecamatan','$kelurahan','$img')");
      }
      public function update_toko($id, $kode_pos, $kota)
      {
            $nama_toko =  htmlspecialchars($this->input->post('nama_toko'), true);
            $deskripsi = htmlspecialchars($this->input->post('Deskripsi_toko'), true);
            $phone = htmlspecialchars($this->input->post('notelepon'), true);
            $alamat = htmlspecialchars($this->input->post('alamat'), true);
            $provinsi = htmlspecialchars($this->input->post('provinsi'), true);
            $this->db->query("UPDATE toko SET nama_toko='$nama_toko',deskripsi_toko='$deskripsi',phone='$phone',postal_code='$kode_pos',address='$alamat',provinsi='$provinsi',kota='$kota' WHERE id_toko = '$id'");
      }
      public function detail_toko($id)
      {
            return $this->db->query("SELECT * FROM toko WHERE id_toko = '$id'")->row_array();
      }
      public function deactive_toko($id)
      {
            $this->db->query("UPDATE `toko` SET `status` = '0' WHERE `toko`.`id_toko` ='$id'");
      }
      public function active_toko($id)
      {
            $this->db->query("UPDATE `toko` SET `status` = '1' WHERE `toko`.`id_toko` ='$id'");
      }
      function get_kategori()
      {
            return $data = $this->db->query("SELECT * FROM kategori_produk")->result_array();
      }
      public function get_subkategori($id)
      {
            return $data = $this->db->query("SELECT * FROM sub_kategori_produk WHERE id_kategori ='$id'")->result_array();
      }
      public function create_produk()
      {
            $data = [
                  'nama_produk'  => htmlspecialchars($this->input->post('nama_produk'), true),
                  'harga_produk' => htmlspecialchars($this->input->post('harga_produk'), true),
                  'jumlah_produk' => htmlspecialchars($this->input->post('jumlah_produk'), true),
                  'kategori' => htmlspecialchars($this->input->post('kategori'), true),
                  'subkategori' => htmlspecialchars($this->input->post('subkategori'), true),
                  'deskripsi_produk' => htmlspecialchars($this->input->post('deskripsi_produk'), true),
                  'img_produk' => $this->upload->data('file_name'),
                  'id_toko' => htmlspecialchars($this->input->post('toko'), true),
            ];
            $this->db->insert('produk', $data);
      }
      public function edit_produk($id)
      {
            $data = [
                  'nama_produk'  => htmlspecialchars($this->input->post('nama_produk'), true),
                  'harga_produk' => htmlspecialchars($this->input->post('harga_produk'), true),
                  'jumlah_produk' => htmlspecialchars($this->input->post('jumlah_produk'), true),
                  'kategori' => htmlspecialchars($this->input->post('kategori'), true),
                  'subkategori' => htmlspecialchars($this->input->post('subkategori'), true),
                  'deskripsi_produk' => htmlspecialchars($this->input->post('deskripsi_produk'), true),
            ];
            $this->db->where('id_produk', $id);
            $this->db->update('produk', $data);
      }
      public function get_produk($id)
      {
            return $data = $this->db->query("SELECT * FROM produk p JOIN produk_detail pd ON p.id_produk = pd.id_produk WHERE id_toko ='$id'")->result_array();
      }
      public function get_produk_by_toko($id)
      {
            return $data = $this->db->query("SELECT * FROM produk_detail pd  JOIN produk p on pd.id_produk = p.id_produk WHERE id_toko ='$id' AND pd.stok > 0 GROUP BY pd.id_produk")->result_array();
      }
      public function delete_produk($id)
      {
            $data = $this->db->get_where('produk', ['id_produk' => $id])->row_array();
            $old_image = $data['img_produk'];
            unlink(FCPATH . 'assets/uploads/' . $old_image);
            $this->db->where('id_produk', $id);
            $this->db->delete('produk');
      }
      public function detail_produk_master($id)
      {
            return $this->db->query("SELECT * FROM produk p JOIN produk_detail pd ON p.id_produk = pd.id_produk WHERE p.id_produk ='$id'")->row_array();
      }
      public function detail_produk_detail($id)
      {
            return $this->db->query("SELECT * FROM produk p JOIN produk_detail pd ON p.id_produk = pd.id_produk WHERE p.id_produk ='$id'")->result_array();
      }
      public function add_item_cart()
      {
            $user = htmlspecialchars($this->input->post('id_user'), true);
            $toko = htmlspecialchars($this->input->post('id_toko'), true);
            $produk = htmlspecialchars($this->input->post('id_produk'), true);
            $a = $this->db->query("SELECT jumlah_pesan FROM keranjang WHERE id_produk = $produk and id_user =$user")->result_array();
            $c = $this->db->query("SELECT status FROM keranjang WHERE id_produk = $produk and id_user =$user")->result_array();
            $b = $this->db->query("SELECT * FROM keranjang WHERE id_produk = $produk and id_user =$user and id_transaksi ='' ")->num_rows();
            // var_dump($c);
            // die;

            $a = $a[0]['jumlah_pesan'];
            if ($b == 0 || $c == "pending") {
                  //$this->db->query("INSERT INTO keranjang (id_user,id_toko,id_produk,jumlah_pesan) values ('$user','$toko','$produk',1)");
                  $i = 0;
                  $data_detail = array();
                  foreach ($this->input->post('detail') as $det) {
                        $jumlah = $this->input->post('jumlah')[$i];
                        $berat = $this->input->post('berat')[$i];
                        if ($jumlah != 0) {
                              $arr = [
                                    'id_user'  => $user,
                                    'id_toko' => $toko,
                                    'id_produk' => $produk,
                                    'id_produk_detail' => $det,
                                    'jumlah_pesan' => $jumlah,
                                    'berat' => $berat * $jumlah
                              ];
                              array_push($data_detail, $arr);
                              $stok = $this->db->query("SELECT stok FROM produk_detail WHERE id_detail='$det' ")->row_array();
                              $sisa = ($stok['stok'] - $jumlah);
                              $this->db->query("UPDATE produk_detail SET stok ='$sisa' WHERE id_detail='$det'");
                        }
                        $i++;
                  }
                  $this->db->insert_batch('keranjang', $data_detail);
            } else {
                  //harusnya update karena sudah ada set jumlah pesanan jadi di buat select
                  //$this->db->query("SELECT keranjang SET jumlah_pesan = $a+1 WHERE id_produk = $produk and id_user =$user");
            }
      }
      public function get_item_cart($id)
      {
            return $this->db->query("
            SELECT 
            * 
            FROM keranjang 
            JOIN produk ON produk.id_produk = keranjang.id_produk 
            JOIN toko ON toko.id_toko = keranjang.id_toko 
            JOIN user ON user.id = keranjang.id_user 
            JOIN produk_detail ON produk_detail.id_detail = keranjang.id_produk_detail
            AND keranjang.id_user  ='$id' AND (ISNULL(keranjang.status) OR keranjang.status = '0')
            ")->result_array();
      }
      public function delete_keranjang($id)
      {
            $this->db->where('id_pesan', $id);
            $this->db->delete('keranjang');
      }
      public function get_data_chart($id, $id_user)
      {
            $query = "select 
                              k.id_pesan,
                              k.id_toko,
                              t.nama_toko,
                              t.provinsi as toko_provinsi,
                              t.kota as toko_kota,
                              k.id_produk,
                              p.nama_produk,
                              p.img_produk,
                              pd.harga,
                              k.id_user,
                              k.jumlah_pesan 
                              from keranjang k,toko t,produk p, produk_detail pd
                              where k.id_pesan in(" . $id . ")
                              and k.id_user = " . $id_user . "
                              and k.id_toko = t.id_toko
                              and k.id_produk = p.id_produk
                              and k.id_produk_detail = pd.id_detail
                              group by t.id_toko";


            return $this->db->query($query)->result_array();
      }
      public function get_data_chart_temp($id, $id_user)
      {
            $query = "select * from keranjang k 
            join toko tk on tk.id_toko = k.id_toko
            join produk p on p.id_produk = k.id_produk 
            join produk_detail pd on k.id_produk_detail = pd.id_detail
                        where id_pesan IN (" . $id . ")
                        AND id_user = $id_user
            group by k.id_toko";


            return $this->db->query($query)->result_array();
      }
      public function get_data_chart_produk($id, $id_user)
      {
            $query = "select 
                              k.id_pesan,
                              k.id_toko,
                              t.nama_toko,
                              t.provinsi as toko_provinsi,
                              t.kota as toka_kota,
                              k.id_produk,
                              p.nama_produk,
                              p.img_produk,
                              pd.harga,
                              pd.warna,
                              pd.ukuran,
                              k.id_user,
                              k.sub_total,
                              k.jumlah_pesan ,
                              k.pesan_pembeli
                              from keranjang k,toko t,produk p, produk_detail pd
                              where k.id_toko in(" . $id . ")
                              and k.id_user = " . $id_user . "
                              and k.id_toko = t.id_toko
                              and k.status = 'pending'
                              and k.id_transaksi =''
                              and k.id_order =''
                              and k.id_produk = p.id_produk
                              and k.id_produk_detail = pd.id_detail
                              ";
            return $this->db->query($query)->result_array();
      }
      public function get_data_chart_produk_id_pesan($id, $id_user)
      {
            $query = "select 
                              k.id_pesan
                              from keranjang k,toko t,produk p, produk_detail pd
                              where k.id_toko = 10
                              and k.id_user = " . $id_user . "
                              and k.id_toko = t.id_toko
                              and k.status = 'pending'
                              and k.id_transaksi =''
                              and k.id_order =''
                              and k.id_produk = p.id_produk
                              and k.id_produk_detail = pd.id_detail
                              ";
            return $this->db->query($query)->result_array();
      }
      public function get_data_chart_produk_temp($id, $id_user)
      {
            $query = "select * from keranjang k 
            join toko tk on tk.id_toko = k.id_toko
            join produk p on p.id_produk = k.id_produk 
            join produk_detail pd on k.id_produk_detail = pd.id_detail
                        where k.id_toko IN (" . $id . ")
                        AND id_user = $id_user
                      ";
            return $this->db->query($query)->result_array();
      }
      public function add_rekening($id)
      {
            $data = [
                  'no_rek'  => htmlspecialchars($this->input->post('norek'), true),
                  'bank' => htmlspecialchars($this->input->post('bank'), true),
                  'pemilik' => htmlspecialchars($this->input->post('pemilik'), true),
                  'user_id' => $id
            ];
            $this->db->insert('rekening', $data);
      }
      public function get_rekening($id)
      {
            return $this->db->query("SELECT * FROM rekening WHERE user_id = '$id' ")->result_array();
      }
      public function delete_rekening($id)
      {
            $this->db->query("DELETE FROM rekening where no_rek = $id");
      }
      public function riwayat_transaksi($id)
      {
            return $data = $this->db->query("SELECT
            * FROM 
            keranjang k,
            transaksi t
            WHERE
            t.id_user ='$id' AND k.id_transaksi = t.id_transaksi
            GROUP BY  k.id_order")->result_array();
      }
      public function riwayat_transaksi_master($id, $iduser)
      {
            return $data = $this->db->query("SELECT
            * FROM 
            keranjang k
            JOIN transaksi t ON k.id_transaksi = t.id_transaksi
            JOIN user u ON k.id_user = u.id
            WHERE
            t.id_user ='$iduser' AND k.id_order ='$id' ")->row_array();
      }
      public function riwayat_transaksi_master_refund($id)
      {
            return $data = $this->db->query("SELECT 
            * 
            FROM 
            keranjang k
            JOIN user u ON k.id_user = u.id 
            JOIN transaksi t ON k.id_transaksi = t.id_transaksi
            JOIN retur_dana rd ON rd.id_order = k.id_order
            WHERE k.id_order = '$id'
             ")->row_array();
      }
      public function riwayat_transaksi_master_payment($id)
      {
            return $data = $this->db->query("
            SELECT 
* 
FROM transaksi t 
JOIN keranjang k ON t.id_transaksi = k.id_transaksi 
JOIN toko tk ON k.id_toko = tk.id_toko
JOIN user u ON tk.user_id = u.id
JOIN retur_dana rd ON rd.id_transaksi = t.id_transaksi
JOIN produk p ON  k.id_produk =  p.id_produk
JOIN produk_detail pd ON  k.id_produk_detail =  pd.id_detail
WHERE k.id_transaksi = '$id'
             ")->row_array();
      }
      public function riwayat_transaksi_detail($id)
      {
            return $data = $this->db->query("SELECT * 
            FROM 
            keranjang k 
            JOIN user u ON k.id_user = u.id 
            JOIN produk p ON k.id_produk = p.id_produk 
            JOIN produk_detail pd ON k.id_produk_detail = pd.id_detail
            JOIN transaksi t ON k.id_transaksi = t.id_transaksi 
            WHERE k.id_order = '$id' ")->result_array();
      }
      public function riwayat_transaksi_detail_penjual($id)
      {
            return $data = $this->db->query("SELECT k.status AS kirim , k.alasan_tolak AS alasan, k.*,u.* ,p.*,t.*,pd.*
            FROM 
            keranjang k 
            JOIN user u ON k.id_user = u.id 
            JOIN produk p ON k.id_produk = p.id_produk 
            JOIN produk_detail pd ON k.id_produk_detail = pd.id_detail
            JOIN transaksi t ON k.id_transaksi = t.id_transaksi 
            WHERE k.id_order = '$id' ")->result_array();
      }
      public function get_pesanan_toko($id)
      {
            return $this->db->query("SELECT
             * 
             FROM
            keranjang k 
            JOIN transaksi t ON k.id_transaksi = t.id_transaksi
            JOIN user u ON u.id = t.id_user
            JOIN produk p ON p.id_produk = k.id_produk
            JOIN produk_detail pd ON pd.id_detail = k.id_produk_detail
            where k.id_toko = $id AND k.status ='pesanan diteruskan ke penjual' ")->result_array();
      }
      public function get_riwayat_pesanan_toko($id)
      {
            return $this->db->query("
            SELECT 
            *
            FROM
                  retur_dana rd
            JOIN keranjang k ON rd.id_transaksi = k.id_transaksi
            JOIN user u ON u.id = k.id_user
            JOIN produk p ON p.id_produk = k.id_produk
            JOIN Transaksi t ON t.id_transaksi = k.id_transaksi
            JOIN produk_detail pd ON pd.id_detail = k.id_produk_detail
            WHERE k.id_toko = '$id' AND rd.status_retur = 'payed'
            ")->result_array();
      }
      public function total_belanja($id_order)
      {
            $a = $this->db->query("SELECT ongkir+SUM(sub_total) as total FROM keranjang k JOIN transaksi t ON k.id_transaksi = t.id_transaksi WHERE k.id_order ='$id_order'")->row_array();
            $b = $this->db->query("SELECT SUM(sub_total) AS jumlah_semua FROM keranjang k JOIN transaksi t ON k.id_transaksi = t.id_transaksi WHERE k.id_order ='$id_order'")->row_array();

            return $a;
      }
      public function total_belanja_all()
      {
            $a = $this->db->query("SELECT ongkir+SUM(sub_total) as total FROM keranjang k JOIN transaksi t ON k.id_transaksi = t.id_transaksi WHERE k.id_order IN (SELECT
            k.id_order FROM 
            keranjang k,
            transaksi t
            WHERE
            t.status ='proses by admin' AND k.id_transaksi = t.id_transaksi
            GROUP BY  k.id_order)")->result_array();

            return $a;
      }
      public function masukan()
      {
            $data = [
                  'id_user' => $this->input->post('id_user'),
                  'id_produk' => $this->input->post('id_produk'),
                  'masukan' => $this->input->post('masukan'),
            ];
            $this->db->insert('penilaian', $data);
      }
      public function get_masukan($id)
      {
            return $this->db->query("SELECT p.*,u.first_name,u.last_name FROM penilaian p JOIN user u ON p.id_user = u.id WHERE id_produk ='$id'")->result_array();
      }
      public function get_transaksi_retur()
      {
            return $data = $this->db->query("SELECT * FROM retur_dana")->result_array();
      }
      public function validasi_status($id)
      {
            return  $this->db->query("
            SELECT
            IFNULL ((k.status ='barang di terima'), 'eksekusi') AS statement,
            k.status, k.id_transaksi,k.id_order FROM 
            keranjang k,
            transaksi t
            WHERE
            t.id_user ='$id' AND k.id_transaksi = t.id_transaksi
            ")->result_array();
      }
      public function get_detail_produk($id)
      {
            return $this->db->query("SELECT * FROM produk_detail WHERE id_produk = $id AND stok != 0")->result_array();
      }
      public function masukan_detail($id)
      {
            return $this->db->query("SELECT * FROM produk   WHERE id_produk = $id ")->row_array();
      }
}
