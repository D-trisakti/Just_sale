<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_Admin');
		$this->load->model('M_User');
	}
	public function dashboard()
	{
		$data['user'] = $this->M_Admin->num_user();
		$data['toko'] = $this->M_Admin->num_toko();
		// $data['user'] = $this->M_Admin->hitung_user_aktif();
		// $data['toko'] = $this->M_Admin->hitung_toko_aktif();
		$data['transaksi'] = $this->M_Admin->hitung_transaksi();
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
		$total = $this->M_User->total_belanja_all();
		$data['nom'] = $total;
		// var_dump($total);
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
		$data['pay'] = $this->M_Admin->get_payment();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/payment', $data);
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
		$total = $this->M_User->total_belanja($id);
		$data['nom'] = $total['total'];
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
		// var_dump($data['master']);
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
	public function detail_retur($id)
	{
		$data['title'] = 'Kelola Refund';
		$data['trs'] = $this->M_Admin->transaksi_detail($id);
		$data['master'] = $this->M_Admin->transaksi_master($id);
		// var_dump($data['trs']);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/detail_retur', $data);
		$this->load->view('admin/footer');
	}
	public function detail_payment($id)
	{
		$data['title'] = 'Kelola Refund';
		$data['trs'] = $this->M_Admin->transaksi_detail($id);
		$data['master'] = $this->M_Admin->get_payment_master($id);
		// var_dump($data['master']);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/detail_payment', $data);
		$this->load->view('admin/footer');
	}
	public function refund($id)
	{
		$data['master'] = $this->M_Admin->transaksi_master($id);
		$data_retur = $this->db->query("SELECT * FROM retur_dana WHERE id_order ='$id'")->result_array();
		$id_user = $data_retur[0]['id_user'];
		$data['validation'] = $this->db->query("SELECT user_id FROM rekening WHERE user_id = '$id_user'")->num_rows();
		$data['title'] = 'Proses Refund Dana';
		$data['rek'] = $this->M_Admin->get_rekening_payment($id_user);
		//var_dump($id_user);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/refund', $data);
		$this->load->view('admin/footer');
	}
	public function pending_bayar($id_trs)
	{
		$this->db->query("UPDATE retur_dana  SET status_retur ='Pending', alasan ='Belum mendaftarkan rekening' WHERE id_transaksi = '$id_trs' ");
		redirect('admin/payment');
	}
	public function bayar_retur()
	{
		$config['allowed_types']      = 'gif|jpg|png|jpeg';
		$config['max_size']               = 4048;
		$config['upload_path'] = './assets/img/transaksi';
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('image')) {
			$new_image = $this->upload->data('file_name');
			$rek = $this->input->post('rekening');
			$id = $this->input->post('id');
			$status = "Refund";
			$this->db->query("UPDATE retur_dana SET no_rek = '$rek', status_retur ='$status',pay_img ='$new_image', alasan = '' WHERE id_order ='$id'");
			redirect('admin/payment');
		} else {
			$this->session->set_flashdata(
				'pesan',
				$this->upload->display_errors()
			);
			$id = $this->input->post('id');
			$data['master'] = $this->M_Admin->transaksi_master($id);
			$data_retur = $this->db->query("SELECT * FROM retur_dana WHERE id_order ='$id'")->result_array();
			$id_user = $data_retur[0]['id_user'];
			$data['validation'] = $this->db->query("SELECT user_id FROM rekening WHERE user_id = '$id_user'")->num_rows();
			$data['title'] = 'Proses Refund Dana';
			$data['rek'] = $this->M_Admin->get_rekening_payment($id_user);
			//var_dump($id_user);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/transaksi/refund', $data);
			$this->load->view('admin/footer');
		}
	}
	public function bayar_payment()
	{

		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '2048';
		$config['upload_path'] = './assets/img/transaksi';
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('image')) {
			$new_image = $this->upload->data('file_name');
			$rek = $this->input->post('rekening');
			$id = $this->input->post('id');
			$status = "Payed";
			$this->db->query("UPDATE retur_dana SET no_rek = '$rek', status_retur ='$status',pay_img ='$new_image', alasan = '' WHERE id_order ='$id'");
			redirect('admin/payment');
		} else {
			$this->session->set_flashdata(
				'pesan',
				$this->upload->display_errors()
			);
			$this->payment();

			// $id = $this->input->post('id');
			// $data['master'] = $this->M_Admin->transaksi_master($id);
			// $data_retur = $this->db->query("SELECT * FROM retur_dana WHERE id_order ='$id'")->result_array();
			// $id_user = $data_retur[0]['id_user'];
			// $data['validation'] = $this->db->query("SELECT user_id FROM rekening WHERE user_id = '$id_user'")->num_rows();
			// $data['title'] = 'Proses Refund Dana';
			// $data['rek'] = $this->M_Admin->get_rekening_payment($id_user);
			// //var_dump($id_user);
			// $this->load->view('admin/header', $data);
			// $this->load->view('admin/sidebar');
			// $this->load->view('admin/transaksi/refund', $data);
			// $this->load->view('admin/footer');
		}
	}
	public function get_rekening_detail()
	{
		$id = $this->input->post('rek');
		$detail = $this->db->query("SELECT * FROM rekening WHERE no_rek = '$id' ")->row_array();
		echo json_encode($detail);
	}
	public function payment_proses()
	{
		$id = $this->input->post('id');
		$data['master'] = $this->M_Admin->get_payment_master($id);
		$data_retur = $this->db->query("SELECT * FROM retur_dana WHERE id_transaksi ='$id'")->result_array();
		$id_user = $data_retur[0]['id_user'];
		$data['validation'] = $this->db->query("SELECT user_id FROM rekening WHERE user_id = '$id_user'")->num_rows();
		$data['title'] = 'Proses Refund Dana';
		$data['rek'] = $this->M_Admin->get_rekening_payment($id_user);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/transaksi/payment_proses', $data);
		$this->load->view('admin/footer');
	}
}
