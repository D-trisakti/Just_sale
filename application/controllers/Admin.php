<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin Extends CI_Controller {

      public function admin_login(){
            $this -> load -> view('admin/login');
      }
      public function dashboard(){
            $this -> load -> view('admin/header');
            $this -> load -> view('admin/sidebar');
            $this -> load -> view('admin/dashboard');
            $this -> load -> view('admin/footer');
      }
      public function user(){
            $this -> load -> view('admin/header');
            $this -> load -> view('admin/sidebar');
            $this -> load -> view('admin/pengguna/index');
            $this -> load -> view('admin/footer');
      }
      public function toko(){
            $this -> load -> view('admin/header');
            $this -> load -> view('admin/sidebar');
            $this -> load -> view('admin/toko/index');
            $this -> load -> view('admin/footer');
      }
      public function transaksi(){
            $this -> load -> view('admin/header');
            $this -> load -> view('admin/sidebar');
            $this -> load -> view('admin/transaksi/index');
            $this -> load -> view('admin/footer');
      }
      public function laporan(){
            $this -> load -> view('admin/header');
            $this -> load -> view('admin/sidebar');
            $this -> load -> view('admin/laporan/index');
            $this -> load -> view('admin/footer');
      }
}