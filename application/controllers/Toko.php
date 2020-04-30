<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko Extends CI_Controller {
      public function index(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('Toko/index');
            $this -> load -> view ('users/footer');
      }
}