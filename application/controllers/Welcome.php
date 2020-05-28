<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$this->load->view('welcome/header');
		$this->load->view('welcome/index');
		$this->load->view('welcome/footer');
	}
	public function login()
	{
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('welcome/header');
			$this->load->view('welcome/login');
			$this->load->view('welcome/footer');
		} else {
			// var_dump($_POST);
			// die;
			$this->verify_login();
		}
	}
	private function verify_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$data = $this->db->get_where('user', ['email' => $email])->row_array();
		// var_dump ($data['password']);
		// die;
		if ($data) {
			if ($data['user_status'] == '0') {
				if (password_verify($password, $data['password'])) {
					$this->session->set_userdata($data);
					$data = [
						'email' => $data['email'],
						'id' => $data['id']
					];
					redirect('users/index');
				} else {
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-danger">
				<div class="container">
				<div class="alert-icon">
				<i class="material-icons">error_outline</i>
				</div>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"><i class="material-icons">clear</i></span>
				</button>
				<b>Password Salah</b> 
				</div>
				</div>'
					);
					redirect('welcome/login');
				}
			} else {
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger">
			  <div class="container">
			  <div class="alert-icon">
			  <i class="material-icons">error_outline</i>
			  </div>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true"><i class="material-icons">clear</i></span>
			  </button>
			  <b>Akun Tidak Aktif</b>
			  </div>
			  </div>'
				);
				redirect('welcome/login');
			}
		} else {
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger">
		<div class="container">
		<div class="alert-icon">
		<i class="material-icons">error_outline</i>
		</div>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true"><i class="material-icons">clear</i></span>
		</button>
		<b>Email Tidak Terdaftar</b>
		</div>
		</div>'
			);
			redirect('welcome/login');
		}
	}
	public function register()
	{
		$this->load->model('M_Admin');
		$data['province'] = $this->M_Admin->select_province();
		$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required|trim');
		$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'Email sudah ada']);
		$this->form_validation->set_rules('notelepon', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim');
		$this->form_validation->set_rules('TTL', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('password', 'password', 'required|trim|matches[password_konfirmasi]', [
			'matches' => 'Password tidak sama',
			'min_length' => 'Password terlalu pendek',
			'max_length' => 'Password terlalu panjang'
		]);
		$this->form_validation->set_rules('password_konfirmasi', 'password', 'required|trim|matches[password]');
		if ($this->form_validation->run() == false) {
			$this->load->view('welcome/header');
			$this->load->view('welcome/register', $data);
		} else {
			$this->load->model('M_Welcome');
			$this->M_Welcome->register();
		}
	}
	function get_city()
	{
		$this->load->model('M_Admin');
		$id = $this->input->post('id');
		$data = $this->M_Admin->get_kota($id);
		echo json_encode($data);
	}
	function get_kecamatan()
	{
		$this->load->model('M_Admin');
		$id = $this->input->post('id');
		$data = $this->M_Admin->get_kecamatan($id);
		echo json_encode($data);
	}
	function get_kelurahan()
	{
		$this->load->model('M_Admin');
		$id = $this->input->post('id');
		$data = $this->M_Admin->get_kelurahan($id);
		echo json_encode($data);
	}


	public function catalog()
	{

		$this->load->model('M_produk');

		$data['pakaian'] = $this->M_produk->get_subkategori_1();
		$data['tempur'] = $this->M_produk->get_subkategori_2();
		$data['sepatu'] = $this->M_produk->get_subkategori_3();
		$data['tas'] = $this->M_produk->get_subkategori_4();
		$data['mata'] = $this->M_produk->get_subkategori_5();
		$data['camp'] = $this->M_produk->get_subkategori_6();
		$data['lainnya'] = $this->M_produk->get_subkategori_7();

		$this->load->view('welcome/header');
		$this->load->view('welcome/catalog', $data);
		$this->load->view('welcome/footer');
	}
	public function sub_catalog($id)
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
		$data['produk'] = $this->M_produk->get_sub_kategori_by_id($id);
		$data['banner'] = $this->M_produk->get_sub_kategori_by_id_name($id);
		$this->load->view('welcome/header');
		$this->load->view('welcome/sub_catalog', $data);
		$this->load->view('welcome/footer');
	}
	public function not_login()
	{
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-danger">
	<div class="container">
	<div class="alert-icon">
	<i class="material-icons">error_outline</i>
	</div>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true"><i class="material-icons">clear</i></span>
	</button>
	<b>Anda Harus Login Untuk Membeli Produk</b>
	</div>
	</div>'
		);
		redirect('welcome/login');
	}
}