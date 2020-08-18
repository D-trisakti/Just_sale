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
    return $this->db->query("SELECT * FROM user a join toko b ON a.id = b.user_id where b.status = 1")->result_array();
  }
  public function get_toko_not_active()
  {
    return $this->db->query("SELECT * FROM user a join toko b ON a.id = b.user_id where b.status = 0")->result_array();
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
    return $data = $this->db->query("
                                                            SELECT 
                                                            SUM(k.ongkir)+SUM(k.sub_total) as totals ,
                                                            k.*,t.* FROM 
                                                            keranjang k,
                                                            transaksi t
                                                            WHERE
                                                            t.status ='proses by admin' AND k.id_transaksi = t.id_transaksi
                                                            GROUP BY  k.id_order")->result_array();
  }
  public function transaksi_master($id)
  {
    return $this->db->query("
    SELECT 
    * 
    FROM 
    keranjang k
    JOIN user u ON k.id_user = u.id 
    JOIN transaksi t ON k.id_transaksi = t.id_transaksi
    WHERE k.id_order = '$id'
    GROUP BY k.id_order
    ")->row_array();
  }
  // public function transaksi_master_pending($id)
  // {
  //   return $this->db->query("
  //   SELECT 
  //   * 
  //   FROM 
  //   keranjang k
  //   JOIN user u ON k.id_user = u.id 
  //   JOIN transaksi t ON k.id_transaksi = t.id_transaksi
  //   WHERE k.id_transaksi = '$id'
  //   ")->row_array();
  // }
  public function transaksi_detail($id)
  {
    return $data = $this->db->query("
    SELECT * 
    FROM 
    keranjang k 
    JOIN user u ON k.id_user = u.id 
    JOIN produk p ON k.id_produk = p.id_produk 
    JOIN produk_detail pd ON k.id_produk_detail = pd.id_detail
    JOIN transaksi t ON k.id_transaksi = t.id_transaksi 
    WHERE k.id_order = '$id' ")->result_array();
  }
  public function get_payment()
  {
    return $this->db->query("SELECT * FROM retur_dana WHERE status_retur != 'refund' AND status_retur != 'payed' AND status_retur = 'pending'  OR status_retur = 'Proses by admin'")->result_array();
  }
  public function get_rekening_payment($id)
  {
    return $this->db->query("SELECT * FROM rekening where user_id ='$id' ")->result_array();
  }
  public function get_payment_master($id)
  {
    return $this->db->query("
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
  public function hitung_user_aktif()
  {
    return $this->db->query("SELECT COUNT(*) FROM user WHERE user_status = 0")->row_array();
  }
  public function hitung_toko_aktif()
  {
    return $this->db->query("SELECT COUNT(*) FROM toko WHERE status = 1")->row_array();
  }
  public function hitung_transaksi()
  {
    return $this->db->query("SELECT * FROM transaksi WHERE status = 'barang diterima' ")->num_rows();
  }
}
