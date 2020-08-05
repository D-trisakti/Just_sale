<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_Welcome extends CI_Model
{

      public function register()
      {
            $user = [
                  'email' => htmlspecialchars($this->input->post('email', true)),
                  'password' => password_hash($this->input->post('password2'), PASSWORD_DEFAULT),
                  'user_status' => 0, //tidak aktif
                  'first_name' => htmlspecialchars($this->input->post('namadepan', true)),
                  'last_name' => htmlspecialchars($this->input->post('namabelakang', true)),
                  'address' => htmlspecialchars($this->input->post('alamat', true)),
                  'phone' => htmlspecialchars($this->input->post('notelepon', true)),
                  // 'postal_code' => htmlspecialchars($this->input->post('kode_pos', true)),
                  // 'provinsi' => htmlspecialchars($this->input->post('provinsi', true)),
                  // 'kota' => htmlspecialchars($this->input->post('kota', true)),
                  // 'kelurahan' => htmlspecialchars($this->input->post('kelurahan', true)),
                  // 'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
                  // 'TTL' => htmlspecialchars($this->input->post('TTL', true)),
                  'date_created' => date("Y-m-d H:i:s")
            ];
            $this->db->insert('user', $user);
      }
      public function get_item()
      {
            return $data = $this->db->query('SELECT * FROM produk ORDER BY id_produk DESC LIMIT 8')->result_array();
      }
}
