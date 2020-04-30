<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this -> load ->view('welcome/header');
		$this -> load ->view('welcome/index');
		$this -> load ->view('welcome/footer');
	}
	public function login()
	{
		$this -> load ->view('welcome/header'); 
		$this -> load -> view('welcome/login');
		$this -> load ->view('welcome/footer');
	}
	public function register(){
		$this -> load -> model ('M_Admin');
		$data['province'] = $this -> M_Admin -> select_province();
		$this->form_validation->set_rules('provinsis', '', 'required| greater_than[0]');
		$this->form_validation->set_rules('kotas', '', 'required| greater_than[0]');
		$this->form_validation->set_rules('kecamatan', '', 'required| greater_than[0]');
		$this->form_validation->set_rules('kelurahan', '', 'required| greater_than[0]');
		$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required|trim');
		$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'Email sudah ada']);
		$this->form_validation->set_rules('notelepon', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim');
		$this->form_validation->set_rules('kota', 'Kota', 'required|trim');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
		$this->form_validation->set_rules('TTL', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('password', 'password', 'required|trim|matches[password_konfirmasi]', [
		    'matches' => 'Password tidak sama',
		    'min_length' => 'Password terlalu pendek',
		    'max_length' => 'Password terlalu panjang'
		]);
		$this->form_validation->set_rules('password_konfirmasi', 'password', 'required|trim|matches[password]');
		if ($this->form_validation->run() == false) {
		    $this->load->view('welcome/header');
		    $this->load->view('welcome/register',$data);
		} else {
			$this -> load -> model ('M_Welcome');
			$this -> M_Welcome -> register();
		}
	}
	function get_city(){
		$this -> load -> model ('M_Admin');
		$id=$this->input->post('id');
		$data=$this-> M_Admin->get_kota($id);
		echo json_encode($data);
	  }
	  function get_kecamatan(){
		$this -> load -> model ('M_Admin');
		$id=$this->input->post('id');
		$data=$this-> M_Admin->get_kecamatan($id);
		echo json_encode($data);
	  }
	  function get_kelurahan(){
		$this -> load -> model ('M_Admin');
		$id=$this->input->post('id');
		$data=$this-> M_Admin->get_kelurahan($id);
		echo json_encode($data);
	  }

	
	public function catalog(){
		$this -> load -> view ('welcome/header');
		$this -> load -> view ('welcome/catalog');
		$this -> load -> view ('welcome/footer');
	}
}