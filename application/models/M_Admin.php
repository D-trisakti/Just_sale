<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_Admin extends CI_Model
{

  public function get_kota($id)
  {
    return $this->db->get_where('m_ikabkota', ['id_propinsi' => $id])->result();
  }
  public function get_kecamatan($id)
  {
    // return $this->db->query ("select * from m_ikecamatan where id_kabkota = $id")->result();
    return $this->db->get_where('m_ikecamatan', ['id_kabkota' => $id])->result();
  }
  public function get_kelurahan($id)
  {
    // return $this->db->query ("select * from m_ikecamatan where id_kabkota = $id")->result();
    return $this->db->get_where('m_ikelurahan', ['id_kecamatan' => $id])->result();
  }
  public function select_province()
  {
    return  $query = $this->db->get('m_ipropinsi')->result_array();
  }
  public function get_province_name($id_prov)
  {
    return $this->db->query("SELECT LCASE(nama_propinsi) AS nama  FROM m_ipropinsi WHERE id_propinsi = $id_prov")->row_array();
  }
  public function get_kota_name($id_prov, $id_kota)
  {
    return $this->db->query("SELECT LCASE(nama_kabkota) AS nama  FROM m_ikabkota WHERE id_propinsi = $id_prov AND id_kabkota = $id_kota")->row_array();
  }
  public function get_kec_name($id_prov, $id_kota, $id_kec)
  {
    return $this->db->query("SELECT LCASE(nama_kecamatan) AS nama  FROM m_ikecamatan WHERE id_propinsi = $id_prov AND id_kabkota = $id_kota AND id_kecamatan =$id_kec")->row_array();
  }
  public function get_kel_name($id_prov, $id_kota, $id_kec, $id_kel)
  {
    return $this->db->query("SELECT LCASE(nama_kelurahan) AS nama  FROM m_ikelurahan WHERE id_propinsi = $id_prov AND id_kabkota = $id_kota AND id_kecamatan =$id_kec AND id_kelurahan = $id_kel")->row_array();
  }
  function get_user()
  {
    return $this->db->query("SELECT * FROM user WHERE user_status = 0")->result_array();
  }
  public function get_user_not_active()
  {
    return $this->db->query("SELECT * FROM user WHERE user_status = 1")->result_array();
  }
  public function get_toko()
  {
    return $this->db->query("SELECT * FROM user a join toko b ON a.id = b.user_id where b.status = 0")->result_array();
  }
  public function get_toko_not_active()
  {
    return $this->db->query("SELECT * FROM user a join toko b ON a.id = b.user_id where b.status = 1")->result_array();
  }
  public function get_produk()
  {
    return $this->db->query("SELECT * FROM produk p JOIN toko t ON p.id_toko = t.id_toko")->result_array();
  }
  public function num_user()
  {
    return $data = $this->db->query("SELECT * FROM user WHERE user_status = 0")->num_rows();
  }
  public function num_toko()
  {
    return $data = $this->db->query("SELECT * FROM toko t JOIN user u ON t.user_id = u.id WHERE u.user_status = 0")->num_rows();
  }
  public function get_transaksi()
  {
    return $data = $this->db->query("SELECT * FROM transaksi WHERE status ='proses by admin'")->result_array();
  }
  public function transaksi_master($id)
  {
    return $this->db->query("SELECT * FROM transaksi t JOIN user u  ON t.id_user = u.id WHERE t.id_transaksi ='$id'")->row_array();
  }
  public function transaksi_detail($id)
  {
    return $data = $this->db->query("SELECT * FROM keranjang k JOIN user u ON k.id_user = u.id JOIN produk p ON k.id_produk = p.id_produk JOIN transaksi t ON k.id_transaksi = t.id_transaksi WHERE t.id_transaksi ='$id' ")->result_array();
  }
}
