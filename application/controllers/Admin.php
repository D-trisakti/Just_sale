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
		$data['user'] = $this->M_Admin->num_user();
		$data['toko'] = $this->M_Admin->num_toko();
		$data['title'] = 'Dashboard';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/footer');
	}
	public function user()
	{
		$data['user'] = $this->M_Admin->get_user();
		$data['title'] = 'Kelola Pengguna';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/pengguna/index', $data);
		$this->load->view('admin/footer');
	}
	public function user_not_active()
	{
		$data['user'] = $this->M_Admin->get_user_not_active();
		$data['title'] = 'Kelola Pengguna Non Aktif';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/pengguna/non_active_user', $data);
		$this->load->view('admin/footer');
	}
	public function toko()
	{
		$data['toko'] = $this->M_Admin->get_toko();
		$data['title'] = 'Kelola Toko';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/toko/index', $data);
		$this->load->view('admin/footer');
	}
	public function toko_nonaktif()
	{
		$data['toko'] = $this->M_Admin->get_toko_not_active();
		$data['title'] = 'Kelola Toko Non Aktif';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/toko/nonaktif_toko', $data);
		$this->load->view('admin/footer');
	}
	public function product()
	{
		$data['product'] = $this->M_Admin->get_produk();
		$data['title'] = 'Kelola Produk';

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/produk/index', $data);
		$this->load->view('admin/footer');
	}
	public function transaksi()
	{
		$data['title'] = 'Kelola Transaksi';
		$data['trs'] = $this->M_Admin->get_transaksi();
		var_dump($data['trs']);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/index', $data);
		$this->load->view('admin/footer');
	}
	public function riwayat()
	{
		$data['title'] = 'Kelola Riwayat';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/riwayat_transaksi');
		$this->load->view('admin/footer');
	}
	public function payment()
	{
		$data['title'] = 'Kelola Payment';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/payment');
		$this->load->view('admin/footer');
	}
	public function laporan()
	{
		$data['title'] = 'Kelola Laporan';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/laporan/index');
		$this->load->view('admin/footer');
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		redirect('admin_auth');
	}
	public function detail_pesanan($id)
	{
		$data['title'] = 'Kelola Laporan';
		$data['trs'] = $this->M_Admin->transaksi_detail($id);
		$data['master'] = $this->M_Admin->transaksi_master($id);
		var_dump($data['trs']);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/detail_pesanan', $data);
		$this->load->view('admin/footer');
	}
	public function proses_pesanan($id)
	{
		$this->db->query("UPDATE transaksi SET status = 'Pesanan Diteruskan Ke Penjual' WHERE id_transaksi IN (SELECT id_transaksi FROM keranjang WHERE id_order = '$id') ");
		$this->db->query("UPDATE keranjang SET status = 'Pesanan Diteruskan Ke Penjual'  WHERE id_order = '$id' ");
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-info alert-dismissible fade show" role="alert">
                Pesanan Berhasil Diproses
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'
		);
		redirect("admin/transaksi");
	}
	public function tolak_pesanan($id)
	{
		$data['master'] = $this->M_Admin->transaksi_master($id);
		var_dump($data['master']);
		$data['title'] = 'Tolak Pesanan';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/tolak_pesanan', $data);
		$this->load->view('admin/footer');
	}
	public function proses_tolak()
	{
		$id = $this->input->post('id');
		$txt = $this->input->post('alasan');
		$this->db->query("UPDATE transaksi SET status = 'Pesanan Di Tolak' , alasan_tolak = '$txt' WHERE id_transaksi IN (SELECT id_transaksi FROM keranjang WHERE id_order = '$id') ");
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-info alert-dismissible fade show" role="alert">
                Pesanan Berhasil Diproses
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'
		);
		redirect("admin/transaksi");
	}
}
