<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('id')) {
		// 	redirect(site_url('admin_auth'));
		// } else {
		// 	$this->load->model('M_Admin');
		// }
	}
	public function dashboard()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
	}
	public function user()
	{
		$data['user'] = $this->M_Admin->get_user();
		var_dump($data);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/pengguna/index', $data);
		$this->load->view('admin/footer');
	}
	public function user_not_active()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/pengguna/non_active_user');
		$this->load->view('admin/footer');
	}
	public function toko()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/toko/index');
		$this->load->view('admin/footer');
	}
	public function toko_nonaktif()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/toko/nonaktif_toko');
		$this->load->view('admin/footer');
	}
	public function product()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/produk/index');
		$this->load->view('admin/footer');
	}
	public function transaksi()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/index');
		$this->load->view('admin/footer');
	}
	public function laporan()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/laporan/index');
		$this->load->view('admin/footer');
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		redirect('admin_auth');
	}
}