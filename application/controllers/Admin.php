<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_Admin');
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
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/pengguna/index', $data);
		$this->load->view('admin/footer');
	}
	public function user_not_active()
	{
		$data['user'] = $this->M_Admin->get_user_not_active();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/pengguna/non_active_user', $data);
		$this->load->view('admin/footer');
	}
	public function toko()
	{
		$data['toko'] = $this->M_Admin->get_toko();

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/toko/index', $data);
		$this->load->view('admin/footer');
	}
	public function toko_nonaktif()
	{
		$data['toko'] = $this->M_Admin->get_toko_not_active();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/toko/nonaktif_toko', $data);
		$this->load->view('admin/footer');
	}
	public function product()
	{
		$data['product'] = $this->M_Admin->get_produk();

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/produk/index', $data);
		$this->load->view('admin/footer');
	}
	public function transaksi()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/index');
		$this->load->view('admin/footer');
	}
	public function riwayat()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/riwayat_transaksi');
		$this->load->view('admin/footer');
	}
	public function payment()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/payment');
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
