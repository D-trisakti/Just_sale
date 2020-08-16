<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_produk extends CI_Model
{

      public function get_subkategori_pakaian()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 8")->result_array();
      }
      public function get_subkategori_celana()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 9")->result_array();
      }
      public function get_subkategori_sepatu()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 10")->result_array();
      }
      public function get_subkategori_tas()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 11")->result_array();
      }
      public function get_subkategori_jaket()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 12")->result_array();
      }
      public function get_subkategori_setelan()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 13")->result_array();
      }
      public function get_subkategori_renang()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 14")->result_array();
      }
      public function get_subkategori_aksesoris()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 15")->result_array();
      }
      public function get_subkategori_lainnya()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 16")->result_array();
      }
      public function get_sub_kategori_by_id($id, $usr)
      {
            return $this->db->query("SELECT * FROM produk p  JOIN produk_detail pd ON pd.id_produk = p.id_produk   JOIN toko t ON t.id_toko = p.id_toko WHERE p.subkategori = '$id' AND t.user_id !='$usr' ")->result_array();
      }
      public function get_sub_kategori_by_id_name($id)
      {
            return $this->db->query("SELECT * FROM sub_kategori_produk WHERE id_sub_kategori = '$id'")->row_array();
      }
}
