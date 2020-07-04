<?php
defined('BASEPATH') or exit('no scipt direct access allowed');

class M_user extends CI_Model
{

      public function get_toko($id)
      {
            return $data = $this->db->query("SELECT * FROM toko WHERE user_id = '$id'")->result_array();
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

            $this->db->query("INSERT INTO toko (user_id,nama_toko,deskripsi_toko,phone,postal_code,address,provinsi,kota,kecamatan,kelurahan) values ('$userid','$nama_toko','$deskripsi','$phone','$kode_pos','$alamat','$provinsi','$kota','$kecamatan','$kelurahan')");
      }
      public function update_toko($id)
      {
            $nama_toko =  htmlspecialchars($this->input->post('nama_toko'), true);
            $deskripsi = htmlspecialchars($this->input->post('Deskripsi_toko'), true);
            $phone = htmlspecialchars($this->input->post('notelepon'), true);
            $kode_pos = htmlspecialchars($this->input->post('kode_pos'), true);
            $alamat = htmlspecialchars($this->input->post('alamat'), true);
            $provinsi = htmlspecialchars($this->input->post('provinsi'), true);
            $kota = htmlspecialchars($this->input->post('kota'), true);
            $kecamatan = htmlspecialchars($this->input->post('kecamatan'), true);
            $kelurahan = htmlspecialchars($this->input->post('kelurahan'), true);

            $this->db->query("UPDATE toko SET nama_toko='$nama_toko',deskripsi_toko='$deskripsi',phone='$phone',postal_code='$kode_pos',address='$alamat',provinsi='$provinsi',kota='$kota',kecamatan='$kecamatan',kelurahan='$kelurahan' WHERE id_toko = '$id'");
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
      public function get_produk($id)
      {
            return $data = $this->db->query("SELECT * FROM produk WHERE id_toko ='$id'")->result_array();
      }
      public function get_produk_by_toko($id)
      {
            return $data = $this->db->query("SELECT * FROM produk WHERE id_toko ='$id' AND jumlah_produk > 0")->result_array();
      }
      public function delete_produk($id)
      {
            $data = $this->db->get_where('produk', ['id_produk' => $id])->row_array();
            $old_image = $data['img_produk'];
            unlink(FCPATH . 'assets/uploads/' . $old_image);
            $this->db->where('id_produk', $id);
            $this->db->delete('produk');
      }
      public function detail_produk($id)
      {
            return $this->db->query("SELECT * FROM produk WHERE id_produk ='$id'")->row_array();
      }
      public function add_item_cart()
      {
            $user = htmlspecialchars($this->input->post('id_user'), true);
            $toko = htmlspecialchars($this->input->post('id_toko'), true);
            $produk = htmlspecialchars($this->input->post('id_produk'), true);
            $a = $this->db->query("SELECT jumlah FROM keranjang WHERE id_produk = $produk and id_user =$user")->result_array();
            $b = $this->db->query("SELECT * FROM keranjang WHERE id_produk = $produk and id_user =$user")->num_rows();
            // var_dump($a[0]['jumlah']);
            // die;
            $a = $a[0]['jumlah'];
            if ($b == 0) {
                  $this->db->query("INSERT INTO keranjang (id_user,id_toko,id_produk,jumlah) values ('$user','$toko','$produk',1)");
            } else {
                  $this->db->query("UPDATE keranjang SET jumlah = $a+1 WHERE id_produk = $produk and id_user =$user");
            }
      }
      public function get_item_cart($id)
      {
            return $this->db->query("SELECT * FROM keranjang JOIN produk ON produk.id_produk = keranjang.id_produk JOIN toko ON toko.id_toko = keranjang.id_toko JOIN user ON user.id = keranjang.id_user AND keranjang.id_user  ='$id'")->result_array();
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
                              t.kota as toka_kota,
                              k.id_produk,
                              p.nama_produk,
                              p.img_produk,
                              p.harga_produk,
                              k.id_user,
                              k.jumlah 
                              from keranjang k,toko t,produk p
                              where k.id_pesan in(" . $id . ")
                              and k.id_user = " . $id_user . "
                              and k.id_toko = t.id_toko
                              and k.id_produk = p.id_produk
                              group by t.id_toko";


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
                              p.harga_produk,
                              k.id_user,
                              k.jumlah 
                              from keranjang k,toko t,produk p
                              where k.id_toko in(" . $id . ")
                              and k.id_user = " . $id_user . "
                              and k.id_toko = t.id_toko
                              and k.id_produk = p.id_produk";


            return $this->db->query($query)->result_array();
      }
}
