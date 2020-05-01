<?php
defined ('BASEPATH') OR exit ('no scipt direct access allowed');

class M_user extends CI_Model {

      public function get_toko ($id){
            return $this->db->get_where('toko', ['user_id' => $id])->result_array();
      }
}