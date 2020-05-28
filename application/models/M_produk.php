<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_produk extends CI_Model
{

      public function get_subkategori_1()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 1")->result_array();
      }
      public function get_subkategori_2()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 2")->result_array();
      }
      public function get_subkategori_3()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 3")->result_array();
      }
      public function get_subkategori_4()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 4")->result_array();
      }
      public function get_subkategori_5()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 5")->result_array();
      }
      public function get_subkategori_6()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 6")->result_array();
      }
      public function get_subkategori_7()
      {
            return $this->db->query("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 7")->result_array();
      }
      public function get_sub_kategori_by_id($id)
      {
            return $this->db->query("SELECT * FROM produk WHERE subkategori = '$id'")->result_array();
      }
      public function get_sub_kategori_by_id_name($id)
      {
            return $this->db->query("SELECT * FROM sub_kategori_produk WHERE id_sub_kategori = '$id'")->row_array();
      }
}