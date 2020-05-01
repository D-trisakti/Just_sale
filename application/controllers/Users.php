<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users Extends CI_Controller {
      public function __construct()
      {
          parent::__construct();
          if (!$this->session->userdata('email') ) {
              redirect(site_url('welcome'));
          }
          else{
                 $this->load->model('M_user');
          }
      }
      public function index(){
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $data['user']['id'];
            $data['toko'] = $this -> M_user -> get_toko($id);
            // var_dump ($data['toko']);
            // die;
            $this -> load -> view ('users/header');
            $this -> load -> view ('users/index',$data);
            $this -> load -> view ('users/footer');
      }
      public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        redirect('welcome/login');
    }
}