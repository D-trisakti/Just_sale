<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users Extends CI_Controller {
      public function index(){
            $this -> load -> view ('users/header');
            $this -> load -> view ('users/index');
            $this -> load -> view ('users/footer');
      }
}