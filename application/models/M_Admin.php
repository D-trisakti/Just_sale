<?php 
defined ('BASEPATH') OR exit ('no direct script access allowed');

class M_Admin Extends CI_Model{

public function get_kota($id){
      return $this->db->get_where('m_ikabkota', ['id_propinsi' => $id])->result();
}
public function get_kecamatan($id){
      // return $this->db->query ("select * from m_ikecamatan where id_kabkota = $id")->result();
      return $this->db->get_where('m_ikecamatan', ['id_kabkota' => $id])->result();
}
public function get_kelurahan($id){
      // return $this->db->query ("select * from m_ikecamatan where id_kabkota = $id")->result();
      return $this->db->get_where('m_ikelurahan', ['id_kecamatan' => $id])->result();
}
public function select_province(){
    return  $query = $this -> db -> get ('m_ipropinsi')-> result_array();
}
}