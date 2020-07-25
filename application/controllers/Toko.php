<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller
{

      public function __construct()
      {
            parent::__construct();
            $this->load->model('M_Admin');
            $this->load->model('M_User');
            $this->load->model('M_GetApi');
            if (!$this->session->userdata('email')) {
                  $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-info">
                      <div class="container">
                      <div class="alert-icon">
                      <i class="material-icons">error_outline</i>
                      </div>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true"><i class="material-icons">clear</i></span>
                      </button>
                      <b>Anda harus login untuk melanjutkan</b>
                      </div>
                      </div>'
                  );
                  redirect('welcome/login');
            } else {
                  $this->load->model('M_User');
            }
      }
      public function index()
      {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $data['user']['id'];
            $data['toko'] = $this->M_User->get_toko($id);

            $this->load->view('users/header');
            $this->load->view('Toko/kelola_toko', $data);
            $this->load->view('users/footer');
      }
      public function detail_toko($id)
      {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['toko'] = $this->M_User->detail_toko($id);
            $id_prov = $data['toko']['provinsi'];
            $id_kota = $data['toko']['kota'];
            $id_kec = $data['toko']['kecamatan'];
            $id_kel = $data['toko']['kelurahan'];
            $data['produk'] = $this->M_User->get_produk_by_toko($id);
            $data['city'] = $this->M_GetApi->get_city_toko($id_prov, $id_kota);
            $data['province'] = $this->M_GetApi->get_city($id_prov);
            $this->load->view('users/header');
            $this->load->view('Toko/index', $data);
            $this->load->view('users/footer');
      }
      public function create_toko()
      {
            $this->form_validation->set_rules('nama_toko', 'nama toko', 'trim|required');
            $this->form_validation->set_rules('Deskripsi_toko', 'Deskripsi toko', 'trim|required');
            $this->form_validation->set_rules('notelepon', 'Nomor Telepon', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
            $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim');
            if ($this->form_validation->run() == false) {

                  $data['api_province'] = $this->M_GetApi->get_all_province();
                  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                  $data['province'] = $this->M_Admin->select_province();
                  $this->load->view('users/header');
                  $this->load->view('Toko/buat_toko', $data);
            } else {
                  $this->M_User->create_toko();
                  $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-success">
                  <div class="container">
                  <div class="alert-icon">
                  <i class="material-icons">error_outline</i>
                  </div>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true"><i class="material-icons">clear</i></span>
                  </button>
                  <b>Toko berhasil Ditambahkan</b>
                  </div>
                  </div>'
                  );
                  redirect('toko');
            }
      }
      public function edit_toko($id)
      {
            $data['api_province'] = $this->M_GetApi->get_all_province();
            $data['toko'] = $this->M_User->get_toko_by_id($id);
            $id_prov = $data['toko']['provinsi'];
            $id_kota = $data['toko']['kota'];
            $id_kec = $data['toko']['kecamatan'];
            $id_kel = $data['toko']['kelurahan'];
            $this->load->model('M_Admin');
            // $data['province'] = $this->M_Admin->select_province();
            // $data['prov_name'] = $this->M_Admin->get_province_name($id_prov);
            // $data['kota_name'] = $this->M_Admin->get_kota_name($id_prov, $id_kota);
            // $data['kecamatan_name'] = $this->M_Admin->get_kec_name($id_prov, $id_kota, $id_kec);
            // $data['kelurahan_name'] = $this->M_Admin->get_kel_name($id_prov, $id_kota, $id_kec, $id_kel);

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['province'] = $this->M_Admin->select_province();
            $data['city'] = $this->M_GetApi->get_city_toko($id_prov, $id_kota);

            $this->load->view('users/header');
            $this->load->view('Toko/edit_toko', $data);
      }
      public function edit_toko_process()
      {
            $id = $this->input->post("id");
            $kota_pos = $this->input->post("kota");
            $explod = explode("/", $kota_pos);
            $kota = $explod[0];
            $kode_pos = $explod[1];
            $this->M_User->update_toko($id, $kode_pos, $kota);
            $this->session->set_flashdata(
                  'pesan',
                  '<div class="alert alert-success">
            <div class="container">
            <div class="alert-icon">
            <i class="material-icons">error_outline</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            <b>Toko berhasil Diupdate</b>
            </div>
            </div>'
            );
            redirect('toko');
      }

      public function deactive_toko($id)
      {
            // var_dump($_POST);
            // die;
            $this->M_User->deactive_toko($id);
            $this->session->set_flashdata(
                  'pesan',
                  '<div class="alert alert-success">
            <div class="container">
            <div class="alert-icon">
            <i class="material-icons">error_outline</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            <b>Toko Berhasil Dinonaktifkan</b>
            </div>
            </div>'
            );
            redirect('toko');
      }
      public function active_toko($id)
      {
            // var_dump($_POST);
            // die;
            $this->M_User->active_toko($id);
            $this->session->set_flashdata(
                  'pesan',
                  '<div class="alert alert-success">
            <div class="container">
            <div class="alert-icon">
            <i class="material-icons">error_outline</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>
            <b>Toko Berhasil Diaktifkan</b>
            </div>
            </div>'
            );
            redirect('toko');
      }

      public function kelola_produk($id)
      {
            $data['toko'] = $this->M_User->get_toko_by_id($id);
            $data['produk'] = $this->M_User->get_produk($id);
            $this->load->view('users/header');
            $this->load->view('Toko/kelola_produk', $data);
            $this->load->view('users/footer');
      }
      function get_subkategori()
      {
            $id = $this->input->post('id');
            $data = $this->M_User->get_subkategori($id);
            echo json_encode($data);
      }
      public function create_produk()
      {
            $this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required');
            $this->form_validation->set_rules('deskripsi_produk', 'deskripsi_produk', 'trim|required');
            $this->form_validation->set_rules('harga_produk', 'harga_produk', 'required');
            $this->form_validation->set_rules('jumlah_produk', 'jumlah_produk', 'required|trim');
            if ($this->form_validation->run() == false) {
                  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                  $id_user = $data['user']['id'];
                  $data['toko'] = $this->M_User->get_toko($id_user);
                  $data['kategori'] = $this->M_User->get_kategori();
                  $this->load->view('users/header');
                  $this->load->view('Toko/buat_produk', $data);
            } else {
                  $id_tokos = htmlspecialchars($this->input->post('toko'), true);
                  $param = (int) $id_tokos;
                  $upload_image = $_FILES['image']['name'];
                  if ($upload_image) {

                        $config['upload_path']          = './assets/img/product';
                        $config['allowed_types']        = 'gif|jpg|png|jpeg';
                        $config['max_size']             = 4048;
                        $this->load->library('upload', $config);
                  }
                  if ($this->upload->do_upload('image')) {
                        $this->M_User->create_produk();
                        $this->session->set_flashdata(
                              'pesan',
                              '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          Produk Berhasil di tambahkan
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>'
                        );
                        redirect("toko/kelola_produk/$param");
                  } else {
                        $this->session->set_flashdata(
                              'pesan',
                              $this->upload->display_errors()
                        );
                        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                        $id_user = $data['user']['id'];
                        $data['toko'] = $this->M_User->get_toko($id_user);
                        $data['kategori'] = $this->M_User->get_kategori();
                        $this->load->view('users/header');
                        $this->load->view('Toko/buat_produk', $data);
                  }
            }
      }
      public function edit_produk()
      {
            $this->load->view('users/header');
            $this->load->view('Toko/edit_produk');
            $this->load->view('users/footer');
      }
      public function pesanan_masuk()
      {
            $this->load->view('users/header');
            $this->load->view('Toko/pesanan_masuk');
            $this->load->view('users/footer');
      }

      public function transaksi_toko()
      {
            $this->load->view('users/header');
            $this->load->view('Toko/transaksi');
            $this->load->view('users/footer');
      }
      public function riwayat_transaksi_toko()
      {
            $this->load->view('users/header');
            $this->load->view('Toko/riwayat_transaksi');
            $this->load->view('users/footer');
      }
      public function pengaduan_pelanggan()
      {
            $this->load->view('users/header');
            $this->load->view('users/form_pengaduan_pelanggan');
            $this->load->view('users/footer');
      }
      public function detail_produk($id)
      {
            $data['produk'] = $this->M_User->detail_produk($id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['toko'] = $this->M_User->detail_toko($id);
            // $id_prov = $data['toko']['provinsi'];
            // $id_kota = $data['toko']['kota'];
            // $id_kec = $data['toko']['kecamatan'];
            // $id_kel = $data['toko']['kelurahan'];
            // $data['prov_name'] = $this->M_Admin->get_province_name($id_prov);
            // $data['kota_name'] = $this->M_Admin->get_kota_name($id_prov, $id_kota);
            // $data['kecamatan_name'] = $this->M_Admin->get_kec_name($id_prov, $id_kota, $id_kec);
            // $data['kelurahan_name'] = $this->M_Admin->get_kel_name($id_prov, $id_kota, $id_kec, $id_kel);
            $this->load->view('users/header');
            $this->load->view('Toko/detail_produk', $data);
            $this->load->view('users/footer');
      }
      public function delete_produk($id)
      {
            $id_produk = $this->db->get_where('produk', ['id_produk' => $id])->row_array();
            $param = $id_produk['id_toko'];
            $params = (int) $param;
            $this->M_User->delete_produk($id);

            $this->session->set_flashdata(
                  'pesan',
                  '<div class="alert alert-info alert-dismissible fade show" role="alert">
                Produk telah di hapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect("toko/kelola_produk/$params");
      }
      public function add_keranjang_belanja()
      {
            $this->M_User->add_item_cart();
            redirect('toko/keranjang_belanja');
      }
      public function keranjang_belanja()
      {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $data['user']['id'];
            $data['produk'] = $this->M_User->get_item_cart($id);
            $this->load->view('users/header');
            $this->load->view('Toko/shopping_cart', $data);
            $this->load->view('users/footer');
      }
      public function delete_keranjang($id)
      {
            $this->M_User->delete_keranjang($id);
            $this->session->set_flashdata(
                  'pesan',
                  '<div class="alert alert-info alert-dismissible fade show" role="alert">
                Produk telah di hapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect("toko/keranjang_belanja");
      }
      public function shipping()
      {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            // $id_prov = $data['user']['provinsi'];
            // $id_kota = $data['user']['kota'];
            // $id_kec = $data['user']['kecamatan'];
            // $id_kel = $data['user']['kelurahan'];
            // $this->load->model('M_Admin');
            // $data['province'] = $this->M_Admin->select_province();
            // $data['prov_name'] = $this->M_Admin->get_province_name($id_prov);
            // $data['kota_name'] = $this->M_Admin->get_kota_name($id_prov, $id_kota);
            // $data['kecamatan_name'] = $this->M_Admin->get_kec_name($id_prov, $id_kota, $id_kec);
            // $data['kelurahan_name'] = $this->M_Admin->get_kel_name($id_prov, $id_kota, $id_kec, $id_kel);
            // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id_user = $data['user']['id'];
            // $data['produk'] = $this->M_User->get_item_cart($id);
            $id_pesan = $this->input->post("order_no");
            $pesan = $this->input->post("pesan");
            $subtotal = $this->input->post("subtotal");
            $mix = array();
            for ($i = 0; $i < count($id_pesan); $i++) {
                  array_push($mix, array(
                        "id_pesan" => $id_pesan[$i],
                        "pesan" => $pesan[$i],
                        "subtotal" => $subtotal[$i]
                  ));
            }
            $data['mix'] = $mix;
            $id = "";
            foreach ($id_pesan as $a) {
                  $id  = $id . $a . ",";
            }
            $id = rtrim($id, ",");
            $data['chart'] = $this->M_User->get_data_chart($id, $id_user);

            $data['api_province'] = $this->M_GetApi->get_all_province();
            $this->load->view('users/header');
            $this->load->view('Toko/shipping_filled', $data);
            $this->load->view('users/footer');
      }
      public function get_kota()
      {
            $id = $this->input->post('province_id');
            $city = $this->M_GetApi->get_city($id);
            echo json_encode($city);
      }
      public function new_shipping()
      {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id_prov = $data['user']['provinsi'];
            $id_kota = $data['user']['kota'];
            $id_kec = $data['user']['kecamatan'];
            $id_kel = $data['user']['kelurahan'];
            $this->load->model('M_Admin');
            $data['province'] = $this->M_Admin->select_province();
            $data['prov_name'] = $this->M_Admin->get_province_name($id_prov);
            $data['kota_name'] = $this->M_Admin->get_kota_name($id_prov, $id_kota);
            $data['kecamatan_name'] = $this->M_Admin->get_kec_name($id_prov, $id_kota, $id_kec);
            $data['kelurahan_name'] = $this->M_Admin->get_kel_name($id_prov, $id_kota, $id_kec, $id_kel);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $data['user']['id'];
            $data['produk'] = $this->M_User->get_item_cart($id);
            $this->load->view('users/header');
            $this->load->view('Toko/shipping', $data);
            $this->load->view('users/footer');
      }
      public function payment()
      {
            $pesan = $this->input->post('pesan');
            $toko_in = $this->input->post('id_toko');
            $toko_out = $this->input->post('id_toko_out');
            $prefix = 'TRS';
            $date = date('YmdHi');
            $id_trans = $prefix .  $date;
            $data = array();
            $index = 0;
            foreach ($pesan as $psn) :
                  $index2 = 0;
                  $subs = $this->input->post('subtotal_item')[$index];
                  $sub_total = (explode(" ", $subs));
                  foreach ($toko_out as $out) :
                        if ($toko_in[$index] == $out) {
                              $ongkir = $this->input->post('ongkirs')[$index2];
                              $layanan = $this->input->post('id_layanan')[$index2];
                              $layanan_id = (explode("/", $layanan));
                              $id_kurir = $this->input->post('id_kurir')[$index2];
                        }
                        $index2++;
                  endforeach;
                  array_push($data, array(
                        'id_pesan' => $psn,
                        'alamat_pengiriman' => $this->input->post('alamat'),
                        'ongkir' => $ongkir,
                        'jumlah_pesan' => $this->input->post('jumlah_pesanan')[$index],
                        'sub_total' => $sub_total[1],
                        'pesan_pembeli' => $this->input->post('pesan_pembeli')[$index],
                        'id_kurir' => $id_kurir,
                        'id_layanan' => $layanan_id[0],
                        'status' => 'pending',
                        'id_transaksi' => $id_trans
                  ));
                  $index++;
            endforeach;
            var_dump($data);
            $this->db->update_batch('keranjang', $data, 'id_pesan');
            $trs_data = [
                  'id_transaksi' => $id_trans,
                  'alamat_pengiriman' => $this->input->post('alamat'),
                  'total' => $this->input->post('grand'),
                  'status' => 'pending',
                  'tanggal_transaksi' => date("Y-m-d H:i:s")
            ];
            $this->db->insert('transaksi', $trs_data);
            $this->load->view('users/header');
            $this->load->view('Toko/payment');
            $this->load->view('users/footer');
      }
      public function thank_you()
      {
            $this->load->view('users/header');
            $this->load->view('Toko/thank_you');
            $this->load->view('users/footer');
      }
      public function riwayat_pembelian()
      {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $data['user']['id'];
            $data['trs'] = $this->M_User->riwayat_transaksi($id);;
            $this->load->view('users/header');
            $this->load->view('Toko/buyer_transaksi', $data);
            $this->load->view('users/footer');
      }
      public function riwayat_pembelian_detail($id)
      {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id_user = $data['user']['id'];
            $data['master'] = $this->M_User->riwayat_transaksi_master($id, $id_user);
            $data['trs'] = $this->M_User->riwayat_transaksi_detail($id);
            $this->load->view('users/header');
            $this->load->view('Toko/detail_pembelian', $data);
            $this->load->view('users/footer');
      }
      public function trace()
      {
            $this->load->view('users/header');
            $this->load->view('Toko/lacak_pesanan');
            $this->load->view('users/footer');
      }
      public function get_ongkir()
      {
            $origin = $this->input->post('origin');
            $des = $this->input->post('des');
            $kurir = $this->input->post('kurir');
            $ongkir = $this->M_GetApi->get_ongkir($origin, $des, $kurir);
            echo json_encode($ongkir);
      }
      public function get_ongkir_value()
      {
            $origin = $this->input->post('origin');
            $des = $this->input->post('des');
            $kurir = $this->input->post('kurir');
            $service = $this->input->post('service');
            $ongkir_value = $this->M_GetApi->get_ongkir($origin, $des, $kurir, $service);
            echo json_encode($ongkir_value);
      }
}
