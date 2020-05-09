<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin Extends CI_Controller {

      public function admin_login()
	{
		$this->form_validation->set_rules('username', 'username', 'required|trim');
		  $this->form_validation->set_rules('password', 'password', 'required|trim');
		  
		  if ($this -> form_validation -> run() == false){
                  $this -> load -> view('admin/login');
		  }else{		
			$this->verify_login();
		  }
	}
	private function verify_login()  {
		$id = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->db->get_where('admin', ['username' => $id])->row_array();
		// var_dump ($data['password']);
		// die;
		if ($data) 
		{
			  if (password_verify($password, $data['password'])) 
			      {
				$this->session->set_userdata($data);
				$data = [
				    'id' =>$data['id']
				];
				redirect('admin/dashboard');
				}	 
				  else 
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
					<b>Error Alert:</b> Password salah
				    </div>
				  </div>'
				);
				redirect('admin/admin_login');
			  }
			  
		    } 
		    else 
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
		<b>Username Tidak Terdaftar</b>
		</div>
		</div>'
		    );
		    redirect('admin/admin_login');
		}
	}
      public function dashboard(){
            $this -> load -> view('admin/header');
            $this -> load -> view('admin/sidebar');
            $this -> load -> view('admin/dashboard');
            $this -> load -> view('admin/footer');
      }
      public function user(){
            $this -> load -> view('admin/header');
            $this -> load -> view('admin/sidebar');
            $this -> load -> view('admin/pengguna/index');
            $this -> load -> view('admin/footer');
	}
	public function user_not_active(){
            $this -> load -> view('admin/header');
            $this -> load -> view('admin/sidebar');
            $this -> load -> view('admin/pengguna/non_active_user');
            $this -> load -> view('admin/footer');
      }
      public function toko(){
            $this -> load -> view('admin/header');
            $this -> load -> view('admin/sidebar');
            $this -> load -> view('admin/toko/index');
            $this -> load -> view('admin/footer');
      }
      public function transaksi(){
            $this -> load -> view('admin/header');
            $this -> load -> view('admin/sidebar');
            $this -> load -> view('admin/transaksi/index');
            $this -> load -> view('admin/footer');
      }
      public function laporan(){
            $this -> load -> view('admin/header');
            $this -> load -> view('admin/sidebar');
            $this -> load -> view('admin/laporan/index');
            $this -> load -> view('admin/footer');
      }
}