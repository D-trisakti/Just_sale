<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(site_url('welcome'));
        } else {
            $this->load->model('M_User');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $data['user']['id'];
        // $data['cek'] = $this->M_User->check_toko($id);
        // var_dump($data['cek']);
        // die;
        $data['toko'] = $this->M_User->get_toko($id);
        $this->load->view('users/header');
        $this->load->view('users/index', $data);
        $this->load->view('users/footer');
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        redirect('welcome/login');
    }
    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_prov = $data['user']['provinsi'];
        $id_kota = $data['user']['kota'];
        $id_kec = $data['user']['kecamatan'];
        $id_kel = $data['user']['kelurahan'];
        $this->load->model('M_Admin');
        $data['province'] = $this->M_Admin->select_province();
        $data['prov_name'] = $this->M_Admin->get_province_name($id_prov);
        $data['kota_name'] = $this->M_Admin->get_kota_name($id_prov, $id_kota);
        $data['kecamatan_name'] = $this->M_Admin->get_kec_name($id_prov, $id_kota, $id_kec);
        $data['kelurahan_name'] = $this->M_Admin->get_kel_name($id_prov, $id_kota, $id_kec, $id_kel);
        // form validation
        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required|trim');
        $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required|trim');
        $this->form_validation->set_rules('notelepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim');
        $this->form_validation->set_rules('TTL', 'Tanggal Lahir', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('users/header');
            $this->load->view('users/ubah_profile', $data);
        } else {

            $this->M_User->edit_user();
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success">
          <div class="container">
          <div class="alert-icon">
          <i class="material-icons">error_outline</i>
          </div>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"><i class="material-icons">clear</i></span>
          </button>
          <b>Edit Profil Berhasil</b>
          </div>
          </div>'
            );
            redirect('users');
        }
    }
    public function pengaduan_produk()
    {
        $this->load->view('users/header');
        $this->load->view('users/form_pengaduan_produk');
        $this->load->view('users/footer');
    }
    public function pengaduan_toko()
    {
        $this->load->view('users/header');
        $this->load->view('users/form_pengaduan_toko');
        $this->load->view('users/footer');
    }

    public function keranjang_belanja()
    {
        $this->load->view('users/header');
        $this->load->view('users/keranjang_belanja');
        $this->load->view('users/footer');
    }
    public function payment()
    {
        $this->load->view('users/header');
        $this->load->view('users/pembayaran');
        $this->load->view('users/footer');
    }
    public function track_shipping()
    {
        $this->load->view('users/header');
        $this->load->view('users/lacak_barang');
        $this->load->view('users/footer');
    }
    public function review()
    {
        $this->load->view('users/header');
        $this->load->view('users/ulasan');
        $this->load->view('users/footer');
    }
    public function rekening()
    {
        $this->load->view('users/header');
        $this->load->view('users/rekening');
        $this->load->view('users/footer');
    }
    public function tambah_rekening()
    {
        $this->load->view('users/header');
        $this->load->view('users/tambah_rekening');
        $this->load->view('users/footer');
    }
}