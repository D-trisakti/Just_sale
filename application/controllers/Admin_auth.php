<?php
defined('BASEPATH') or exit('No direct acess script allowed');

class Admin_auth extends CI_Controller
{


      public function index()
      {
            $this->form_validation->set_rules('username', 'username', 'required|trim');
            $this->form_validation->set_rules('password', 'password', 'required|trim');

            if ($this->form_validation->run() == false) {
                  $this->load->view('admin/login');
            } else {
                  $this->verify_login();
            }
      }
      private function verify_login()
      {
            $id = $this->input->post('username');
            $password = $this->input->post('password');
            $data = $this->db->get_where('admin', ['username' => $id])->row_array();
            // var_dump ($data['password']);
            // die;
            if ($data) {
                  if (password_verify($password, $data['password'])) {
                        $this->session->set_userdata($data);
                        $data = [
                              'id' => $data['id']
                        ];
                        redirect('admin/dashboard');
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
					<b>Error Alert:</b> Password salah
				    </div>
				  </div>'
                        );
                        redirect('admin_auth');
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
		<b>Username Tidak Terdaftar</b>
		</div>
		</div>'
                  );
                  redirect('admin_auth');
            }
      }
}