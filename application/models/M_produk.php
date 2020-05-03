<?php 
defined ('BASEPATH') OR exit ('no direct script access allowed');

class M_produk Extends CI_Model{

      public function get_subkategori_1(){
            return $this -> db -> query ("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 1")->result_array();
      }
      public function get_subkategori_2(){
            return $this -> db -> query ("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 2")->result_array();
      }
      public function get_subkategori_3(){
            return $this -> db -> query ("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 3")->result_array();
      }
      public function get_subkategori_4(){
            return $this -> db -> query ("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 4")->result_array();
      }
      public function get_subkategori_5(){
            return $this -> db -> query ("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 5")->result_array();
      }
      public function get_subkategori_6(){
            return $this -> db -> query ("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 6")->result_array();
      }
      public function get_subkategori_7(){
            return $this -> db -> query ("SELECT * FROM  sub_kategori_produk WHERE id_kategori = 7")->result_array();
      }
}