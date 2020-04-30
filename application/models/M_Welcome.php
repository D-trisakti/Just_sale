<?php 
defined ('BASEPATH') OR exit ('no direct script access allowed');

class M_Welcome Extends CI_Model{

public function register(){
            $user = [
                  'email' => htmlspecialchars($this -> input -> post ('email',true)),
                  'password' => password_hash($this -> input -> post ('password1'), PASSWORD_DEFAULT),
                  'user_status' => 0, //tidak aktif
                  'first_name' => htmlspecialchars($this -> input ->post ('nama_depan',true)),
                  'last_name' => htmlspecialchars ($this -> input -> post ('nama_belakang',true)),
                  'address' => htmlspecialchars ($this -> input -> post ('alamat',true)),
                  'phone' => htmlspecialchars ($this -> input -> post ('notelepon',true)),
                  'postal_code' => htmlspecialchars ($this -> input -> post ('kode_pos',true)),
                  'city' => htmlspecialchars ($this -> input -> post ('kota',true)),
                  'province' => htmlspecialchars ($this -> input -> post ('provinsi',true)),
                  'TTL' => htmlspecialchars ($this -> input -> post ('TTL',true)),
                  'date_created' => date("Y-m-d H:i:s")
            ];
            $this -> db -> insert ('user',$user);
        }
}