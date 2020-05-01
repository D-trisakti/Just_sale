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
      public function create(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('Toko/buat_toko');
            $this -> load -> view ('users/footer');
      }
}