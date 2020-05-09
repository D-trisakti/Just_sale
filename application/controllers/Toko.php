<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko Extends CI_Controller {
      public function index(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('Toko/index');
            $this -> load -> view ('users/footer');
      }
      public function kelola_toko(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('Toko/kelola_toko');
            $this -> load -> view ('users/footer');
      }
      public function create_toko(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('Toko/buat_toko');
      }
      public function edit_toko(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('Toko/edit_toko');
      }
      public function kelola_produk(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('Toko/kelola_produk');
            $this -> load -> view ('users/footer');
      }
      public function create_produk(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('Toko/buat_produk');
            $this -> load -> view ('users/footer');
      }
      public function edit_produk(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('Toko/edit_produk');
            $this -> load -> view ('users/footer');
      }
      public function pesanan_masuk(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('Toko/pesanan_masuk');
            $this -> load -> view ('users/footer');
      }

      public function transaksi_toko(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('Toko/transaksi');
            $this -> load -> view ('users/footer');
      }
      public function riwayat_transaksi_toko(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('Toko/riwayat_transaksi');
            $this -> load -> view ('users/footer');
      }
      public function pengaduan_pelanggan(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('users/form_pengaduan_pelanggan');
            $this -> load -> view ('users/footer');
      }
}