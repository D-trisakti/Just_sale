<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            // redirect(site_url('welcome'));
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-info">
		  <div class="container">
		  <div class="alert-icon">
		  <i class="material-icons">error_outline</i>
		  </div>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true"><i class="material-icons">clear</i></span>
		  </button>
		  <b>Anda harus login untuk melanjutkan</b>
		  </div>
		  </div>'
            );
            redirect('welcome/login');
        } else {
            $this->load->model('M_User');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $data['user']['id'];
        $data['produk'] = $this->M_User->get_item_cart($id);
        // $data['cek'] = $this->M_User->check_toko($id);


        $data['toko'] = $this->M_User->get_toko_pesan($id);

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
        $id = $data['user']['id'];
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
            // cek jika ada gambar yang akan diupload
            $old_image = $data['user']['image'];
            $upload_image = $_FILES['image']['name'];
            if ($upload_image != "") {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    if ($upload_image != 'default.svg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->query("UPDATE user SET image = '$new_image' WHERE id ='$id'");
                    $this->M_User->edit_user();
                    redirect('users');
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        $this->upload->display_errors()
                    );
                    $this->load->view('users/header');
                    $this->load->view('users/ubah_profile', $data);
                }
            } else {
                $this->M_User->edit_user();
                redirect('users');
            }


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
    public function money()
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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $data['user']['id'];
        $data['rek'] = $this->M_User->get_rekening($id);

        $this->load->view('users/header');
        $this->load->view('users/rekening', $data);
        $this->load->view('users/footer');
    }
    public function tambah_rekening()
    {
        $this->form_validation->set_rules('bank', 'bank', 'required|trim');
        $this->form_validation->set_rules('norek', 'Nomor Rekening', 'required|trim');
        $this->form_validation->set_rules('pemilik', 'Pemilik', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('users/header');
            $this->load->view('users/tambah_rekening');
            $this->load->view('users/footer');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $data['user']['id'];
            $this->M_User->add_rekening($id);
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
          <b>Rekening Berhasil Ditambahkan</b>
          </div>
          </div>'
            );
            redirect('users/rekening');
        }
    }
    public function delete_rekening($id)
    {
        $this->M_User->delete_rekening($id);
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
  <b>Rekening Berhasil Dihapus</b>
  </div>
  </div>'
        );
        redirect('users/rekening');
    }
    public function katalog()
    {

        $this->load->model('M_produk');

        $data['pakaian'] = $this->M_produk->get_subkategori_pakaian();
        $data['tempur'] = $this->M_produk->get_subkategori_celana();
        $data['sepatu'] = $this->M_produk->get_subkategori_sepatu();
        $data['tas'] = $this->M_produk->get_subkategori_tas();
        $data['mata'] = $this->M_produk->get_subkategori_jaket();
        $data['camp'] = $this->M_produk->get_subkategori_setelan();
        $data['renang'] = $this->M_produk->get_subkategori_renang();
        $data['aksesoris'] = $this->M_produk->get_subkategori_aksesoris();
        $data['lainnya'] = $this->M_produk->get_subkategori_lainnya();

        $this->load->view('users/header');
        $this->load->view('users/katalog', $data);
        $this->load->view('users/footer');
    }
    public function sub_katalog($id)
    {
        $this->load->model('M_produk');
        // $this -> load -> model ('M_produk');
        // $data['pakaian'] = $this -> M_produk -> get_subkategori_1();
        // $data['tempur'] = $this -> M_produk -> get_subkategori_2();
        // $data['sepatu'] = $this -> M_produk -> get_subkategori_3();
        // $data['tas'] = $this -> M_produk -> get_subkategori_4();
        // $data['mata'] = $this -> M_produk -> get_subkategori_5();
        // $data['camp'] = $this -> M_produk -> get_subkategori_6();
        // $data['lainnya'] = $this -> M_produk -> get_subkategori_7();
        $data['var'] = $id;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $usr = $data['user']['id'];
        $data['produk'] = $this->M_produk->get_sub_kategori_by_id($id, $usr);
        $data['banner'] = $this->M_produk->get_sub_kategori_by_id_name($id);
        $this->load->view('users/header');
        $this->load->view('users/sub_katalog', $data);
        $this->load->view('users/footer');
    }
    public function test()
    {
        var_dump($_POST);
        die;
        $this->load->view('users/header');
        $this->load->view('users/katalog');
        $this->load->view('users/footer');
    }
    public function retur_pembayaran()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id = $data['user']['id'];
        $data['rek'] = $this->M_User->get_transaksi_retur();
        $this->load->view('users/header');
        $this->load->view('users/returpembayaran', $data);
        $this->load->view('users/footer');
    }
    public function refund_detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['master'] = $this->M_User->riwayat_transaksi_master_refund($id);
        $data['trs'] = $this->M_User->riwayat_transaksi_detail($id);
        var_dump($data['master']);
        $this->load->view('users/header');
        $this->load->view('users/detail_refund', $data);
        $this->load->view('users/footer');
    }
    public function payment_detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['master'] = $this->M_User->riwayat_transaksi_master_payment($id);
        $data['trs'] =  $this->db->query("SELECT * FROM keranjang k JOIN produk p ON k.id_produk = p.id_produk WHERE id_transaksi = '$id'")->result_array();
        var_dump($data['trs']);
        $this->load->view('users/header');
        $this->load->view('users/detail_payment', $data);
        $this->load->view('users/footer');
    }
}
