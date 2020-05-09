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
    public function edit(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_prov =$data['user']['provinsi'];
        $id_kota =$data['user']['kota'];
        $id_kec =$data['user']['kecamatan'];
        $id_kel =$data['user']['kelurahan'];
        $this -> load -> model ('M_Admin');
        $data['province'] = $this -> M_Admin -> select_province();
        $data['prov_name'] = $this -> M_Admin -> get_province_name($id_prov);
        $data['kota_name'] = $this -> M_Admin -> get_kota_name($id_prov,$id_kota);
        $data['kecamatan_name'] = $this -> M_Admin -> get_kec_name($id_prov,$id_kota,$id_kec);
        $data['kelurahan_name'] = $this -> M_Admin -> get_kel_name($id_prov,$id_kota,$id_kec,$id_kel);
        // var_dump ($data['kelurahan_name']);
        // die;
        $this -> load -> view ('users/header');
        $this -> load -> view ('users/ubah_profile',$data);
    }
    public function pengaduan_produk(){
        $this -> load -> view ('users/header');
        $this -> load -> view ('users/form_pengaduan_produk');
        $this -> load -> view ('users/footer');
    }
    public function pengaduan_toko(){
        $this -> load -> view ('users/header');
        $this -> load -> view ('users/form_pengaduan_toko');
        $this -> load -> view ('users/footer');
    }

    public function keranjang_belanja(){
        $this -> load -> view ('users/header');
        $this -> load -> view ('users/keranjang_belanja');
        $this -> load -> view ('users/footer');
    }
    public function payment(){
        $this -> load -> view ('users/header');
        $this -> load -> view ('users/pembayaran');
        $this -> load -> view ('users/footer');
    }
    public function track_shipping(){
        $this -> load -> view ('users/header');
        $this -> load -> view ('users/lacak_barang');
        $this -> load -> view ('users/footer');
    }
    public function review(){
        $this -> load -> view ('users/header');
        $this -> load -> view ('users/ulasan');
        $this -> load -> view ('users/footer');
    }
    public function rekening(){
        $this -> load -> view ('users/header');
        $this -> load -> view ('users/rekening');
        $this -> load -> view ('users/footer');
    }
    public function tambah_rekening(){
        $this -> load -> view ('users/header');
        $this -> load -> view ('users/tambah_rekening');
        $this -> load -> view ('users/footer');
    }
}