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
            // $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim');
            if ($this->form_validation->run() == false) {

                  $data['api_province'] = $this->M_GetApi->get_all_province();
                  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                  $data['province'] = $this->M_Admin->select_province();
                  $this->load->view('users/header');
                  $this->load->view('Toko/buat_toko', $data);
            } else {
                  $id_tokos = htmlspecialchars($this->input->post('toko'), true);
                  $param = (int) $id_tokos;
                  $upload_image = $_FILES['image']['name'];
                  if ($upload_image) {

                        $config['upload_path']          = './assets/img/toko';
                        $config['allowed_types']        = 'gif|jpg|png|jpeg';
                        $config['max_size']             = 4048;
                        $this->load->library('upload', $config);
                  }
                  if ($this->upload->do_upload('image')) {
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
                  } else {
                        $this->session->set_flashdata(
                              'pesan',
                              $this->upload->display_errors()
                        );
                        $data['api_province'] = $this->M_GetApi->get_all_province();
                        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                        $data['province'] = $this->M_Admin->select_province();
                        $this->load->view('users/header');
                        $this->load->view('Toko/buat_toko', $data);
                  }
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
      function get_ukuran()
      {
            $id = $this->input->post('id');
            $prod = $this->input->post('prod');
            $data = $this->db->query("SELECT ukuran from produk_detail WHERE id_produk = '$prod' AND Warna = '$id'")->result_array();
            echo json_encode($data);
      }
      public function create_produk()
      {
            $this->form_validation->set_rules('nama', 'nama', 'trim|required');
            $this->form_validation->set_rules('des', 'des', 'trim|required');
            if ($this->form_validation->run() == false) {

                  $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                  $id_user = $data['user']['id'];
                  $data['toko'] = $this->M_User->get_toko($id_user);
                  $data['kategori'] = $this->M_User->get_kategori();
                  $this->load->view('users/header');
                  $this->load->view('Toko/buat_produk', $data);
                  $this->load->view('users/footer');
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
                        $nama = $this->input->post('nama');
                        $des = $this->input->post('des');
                        $file_name = $this->upload->data('file_name');
                        $nama = $this->input->post('nama');
                        $kategori = $this->input->post('kategori');
                        $subkategori = $this->input->post('subkategori');

                        $data_master = [
                              'id_toko' => $id_tokos,
                              'nama_produk' => $nama,
                              'deskripsi_produk' => $des,
                              'img_produk' => $file_name,
                              'kategori' => $kategori,
                              'subkategori' => $subkategori,
                              'status_barang' => 0
                        ];
                        $this->db->insert('produk', $data_master);

                        $produk = $this->db->get_where('produk', $data_master)->row_array();

                        $i = 0;
                        $data_detail = array();
                        foreach ($this->input->post('data_warna') as $warna) {
                              $data_ukuran = $this->input->post('data_ukuran')[$i];
                              $data_harga = $this->input->post('data_harga')[$i];
                              $data_stok = $this->input->post('data_stok')[$i];
                              $data_berat = $this->input->post('data_berat')[$i];
                              $arr = [
                                    'id_produk' => $produk['id_produk'],
                                    'warna' => $warna,
                                    'ukuran' => $data_ukuran,
                                    'harga' => $data_harga,
                                    'stok' => $data_stok,
                                    'berat' => $data_berat
                              ];

                              array_push($data_detail, $arr);
                        }
                        $this->db->insert_batch('produk_detail', $data_detail);
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
                        echo  $this->upload->display_errors();
                        die;
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
      public function edit_produk($id)
      {
            $this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required');
            $this->form_validation->set_rules('deskripsi_produk', 'deskripsi_produk', 'trim|required');
            $this->form_validation->set_rules('harga_produk', 'harga_produk', 'required');
            $this->form_validation->set_rules('jumlah_produk', 'jumlah_produk', 'required|trim');
            if ($this->form_validation->run() == false) {
                  $data['produk'] = $this->M_User->detail_produk($id);
                  $data['kategori'] = $this->M_User->get_kategori();
                  $data['kategorisub'] = $this->db->query("SELECT p.kategori ,p.subkategori,sb.nama_sub_kategori,k.nama_kategori FROM produk p JOIN kategori_produk k ON p.kategori JOIN sub_kategori_produk sb ON p.subkategori = sb.id_sub_kategori WHERE id_produk ='$id' AND p.kategori = k.id_kategori AND p.subkategori = sb.id_sub_kategori ")->row_array();
                  $this->load->view('users/header');
                  $this->load->view('Toko/edit_produk', $data);
                  $this->load->view('users/footer');
            } else {
                  $id_tokos = htmlspecialchars($this->input->post('id_toko'), true);
                  $param = (int) $id_tokos;
                  $this->M_User->edit_produk($id);
                  $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Produk Berhasil di Update
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                  );
                  redirect("toko/kelola_produk/$param");
            };
      }
      public function pesanan_masuk($id)
      {
            $data['toko'] = $this->M_User->get_toko_by_id($id);
            $data['pesan'] = $this->M_User->get_pesanan_toko($id);
            $this->load->view('users/header');
            $this->load->view('Toko/pesanan_masuk', $data);
            $this->load->view('users/footer');
      }

      public function transaksi_toko()
      {
            $this->load->view('users/header');
            $this->load->view('Toko/transaksi');
            $this->load->view('users/footer');
      }
      public function riwayat_transaksi_toko($id)
      {
            $data['toko'] = $this->M_User->get_toko_by_id($id);
            $data['pesan'] = $this->M_User->get_riwayat_pesanan_toko($id);

            $this->load->view('users/header');
            $this->load->view('Toko/riwayat_transaksi', $data);
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
            $data['produk'] = $this->M_User->detail_produk_master($id);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['toko'] = $this->M_User->detail_toko($id);
            $data['warna'] = $this->db->query("SELECT warna,ukuran FROM produk_detail WHERE id_produk = '$id' ")->result_array();
            $data['nilai'] = $this->M_User->get_masukan($id);
            $data['detail'] = $this->M_User->get_detail_produk($id);
            $data['total_beli'] = $this->db->query("SELECT COUNT(id_produk_detail) AS total FROM keranjang WHERE status ='barang di terima'")->row_array();

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
            $id_pesan = $this->input->post("order_no");
            foreach ($id_pesan as $psn) {
                  $pesan = $this->input->post($psn . "pesan")[0];
                  $subtotal = $this->input->post($psn . "subtotal")[0];
                  $subs = explode('.', $subtotal);
                  $subtotals = $subs[1];
                  $jumlah = $this->input->post($psn . 'quantity')[0];
                  $data = [
                        'id_pesan' => $psn,
                        'pesan_pembeli' => $pesan,
                        'subtotal' => $subtotal,
                        'jumlah_pesan' => $jumlah
                  ];

                  //$this->db->update_batch('keranjang', $data, 'id_pesan');
                  $this->db->query("UPDATE keranjang set pesan_pembeli ='$pesan', sub_total ='$subtotals', jumlah_pesan ='$jumlah',status='pending' where id_pesan ='$psn'");
            }
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            var_dump($subtotal);
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
            $jumlah = $this->input->post('quantity');
            $mix = array();
            for ($i = 0; $i < count($id_pesan); $i++) {
                  array_push($mix, array(
                        "id_pesan" => $id_pesan[$i],
                        "pesan" => $pesan[$i],
                        "subtotal" => $subtotal[$i],
                        "jumlah_pesan" => $jumlah[$i]
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
            $a = 0;
            $b = 0;
            $c = 0;
            foreach ($id_pesan as $i) {
                  $a = $this->db->query("select sum(berat) as berat from keranjang where id_pesan = '$i' ")->row_array();
                  $b = $a['berat'];
                  $c = $c + $b;
            };
            $data['berat'] = $c;
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
            $id_pesan = $this->input->post("order_no");
            foreach ($id_pesan as $psn) {
                  $pesan = $this->input->post($psn . "pesan")[0];
                  $subtotal = $this->input->post($psn . "subtotal")[0];
                  $jumlah = $this->input->post($psn . 'quantity')[0];
                  $data = [
                        'id_pesan' => $psn,
                        'pesan_pembeli' => $pesan,
                        'subtotal' => $subtotal,
                        'jumlah_pesan' => $jumlah
                  ];

                  //$this->db->update_batch('keranjang', $data, 'id_pesan');
                  $this->db->query("UPDATE keranjang set pesan_pembeli ='$pesan', sub_total ='$subtotal', jumlah_pesan ='$jumlah' where id_pesan ='$psn'");
            }

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id_user = $data['user']['id'];
            //$data['produk'] = $this->M_User->get_item_cart($id);
            $mix = array();
            for ($i = 0; $i < count($id_pesan); $i++) {
                  array_push($mix, array(
                        "id_pesan" => $id_pesan[$i],
                        "pesan" => $pesan[$i],
                        "subtotal" => $subtotal[$i],
                        "jumlah_pesan" => $jumlah[$i]
                  ));
            }
            $data['mix'] = $mix;
            die;
            $id = "";
            foreach ($id_pesan as $a) {
                  $id  = $id . $a . ",";
            }

            $id = rtrim($id, ",");


            $data['chart'] = $this->M_User->get_data_chart($id, $id_user);
            var_dump($data['chart']);
            $a = 0;
            $b = 0;
            $c = 0;
            foreach ($id_pesan as $i) {
                  $a = $this->db->query("select sum(berat) as berat from keranjang where id_pesan = '$i' ")->row_array();
                  $b = $a['berat'];
                  $c = $c + $b;
            };
            $data['berat'] = $c;
            $data['filter'] = $id_pesan;
            $data['api_province'] = $this->M_GetApi->get_all_province();
            $this->load->view('users/header');
            $this->load->view('Toko/shipping', $data);
            $this->load->view('users/footer');
      }
      public function konfirmasi_bayar()
      {
            var_dump($_POST);

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $idusr = $data['user']['id'];
            $pesan = $this->input->post('pesan');
            $toko_in = $this->input->post('id_toko');
            $toko_out = $this->input->post('id_toko_out');
            $prefix = 'TRS';
            $prefix2 = 'ORDR';
            $kotas = $this->input->post('kota');
            $kota = (explode("/", $kotas));
            $date = date('YmdHi');
            $id_trans = $prefix .  $date;
            $id_order = $prefix2 . $date;
            $data = array();

            $index = 0;
            foreach ($pesan as $psn) :
                  $index2 = 0;
                  if (is_array($this->input->post('id_transaksi')) == 1) {
                        foreach ($toko_out as $out) :

                              if ($toko_in[$index] == $out) {
                                    $trans = $this->input->post('id_transaksi')[$index2];
                                    $subs = $this->input->post('subtotal_item')[$index];
                                    $sub_total = (explode(" ", $subs));
                                    $ongkir = $this->input->post('ongkirs')[$index2];
                                    $layanan = $this->input->post('id_layanan')[$index2];
                                    $layanan_id = (explode("/", $layanan));
                                    $id_kurir = $this->input->post('id_kurir')[$index2];
                              }
                              $index2++;
                        endforeach;
                  } else {
                        $trans = $this->input->post('id_transaksi');
                        $subs = $this->input->post('subtotal_item');
                        $sub_total = (explode(" ", $subs));
                        $ongkir = $this->input->post('ongkirs');
                        $layanan = $this->input->post('id_layanan');
                        $layanan_id = (explode("/", $layanan));
                        $id_kurir = $this->input->post('id_kurir');
                  }
                  array_push($data, array(
                        'id_pesan' => $psn,
                        'alamat_pengiriman' => $this->input->post('alamat'),
                        'kota_pesan' => $kota[0],
                        'provinsi_pesan' => $this->input->post('provinsi'),
                        'ongkir' => $ongkir,
                        //'jumlah_pesan' => $this->input->post('jumlah_pesanan')[$index],
                        //'sub_total' => $sub_total[1],
                        //'pesan_pembeli' => $this->input->post('pesan_pembeli')[$index],
                        'id_kurir' => $id_kurir,
                        'id_layanan' => $layanan_id[0],
                        'status' => 'belum bayar',
                        'id_transaksi' => $trans,
                        'id_order' => $id_order
                  ));
                  $index++;
            endforeach;
            $this->db->update_batch('keranjang', $data, 'id_pesan');
            var_dump($id_order);
            //die;
            $item = $this->db->query("SELECT SUM(sub_total) as subtotal,ongkir,id_transaksi FROM keranjang WHERE id_order = '$id_order' GROUP BY id_transaksi ")->result_array();
            var_dump(($item));

            foreach ($item as $i) :
                  $trs_data = [
                        'id_transaksi' => $i['id_transaksi'],
                        'alamat_pengiriman' => $this->input->post('alamat'),
                        'total' => $i['subtotal'],
                        'status' => 'pending',
                        'tanggal_transaksi' => date("Y-m-d H:i:s"),
                        'id_user' => $idusr
                  ];
                  $this->db->insert('transaksi', $trs_data);
            endforeach;
            header("Location: payment/" . $id_order);
      }
      public function payment($id_order)
      {
            $total = $this->M_User->total_belanja($id_order);
            $data['nom'] = $total['total'];
            $data['trs'] = $id_order;
            $this->load->view('users/header');
            $this->load->view('Toko/payment', $data);
            $this->load->view('users/footer');
      }
      public function thank_you()
      {
            $trs = $this->input->post('trs');
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $idusr = $data['user']['id'];
            $upload_image = $_FILES['image']['name'];
            $image_types = explode(".", $upload_image);
            $types = end($image_types);
            $image_name = 'IMGPAY' . $trs . "." . $types;
            if ($upload_image) {
                  $config['upload_path']         = './assets/img/transaksi';
                  $config['allowed_types']      = 'gif|jpg|png|jpeg';
                  $config['max_size']               = 4048;
                  $config['file_name']              = $image_name;
                  $this->load->library('upload', $config);
            }
            if ($this->upload->do_upload('image')) {
                  $data = array(
                        'bukti_tf' => $image_name,
                        'status' => '',
                  );
                  $this->db->query("UPDATE transaksi SET bukti_tf ='$image_name',status ='proses by admin'  where id_transaksi IN(SELECT id_transaksi FROM keranjang WHERE id_order = '$trs')");
                  $this->load->view('users/header');
                  $this->load->view('Toko/thank_you');
                  $this->load->view('users/footer');
            } else {
                  $this->session->set_flashdata(
                        'pesan',
                        $this->upload->display_errors()
                  );
                  $this->load->view('users/header');
                  $this->load->view('Toko/thank_you');
                  $this->load->view('users/footer');
            }
      }
      public function riwayat_pembelian()
      {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $data['user']['id'];
            $data['trs'] = $this->M_User->riwayat_transaksi($id);
            // $validation = $this->M_User->validasi_status($id);
            // foreach ($validation as $validation) {
            //       if ($validation['statement'] == 1) {
            //             $this -> db -> query("")
            //       } else {
            //             echo "tidak eksekusi";
            //       }
            // }
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
            $berat = $this->input->post('berat');
            $beratint = (int)$berat;
            $ongkir = $this->M_GetApi->get_ongkir($origin, $des, $kurir, $beratint);
            echo json_encode($ongkir);
      }
      public function get_ongkir_value()
      {
            $origin = $this->input->post('origin');
            $des = $this->input->post('des');
            $kurir = $this->input->post('kurir');
            $ongkir_value = $this->M_GetApi->get_ongkir($origin, $des, $kurir);
            echo json_encode($ongkir_value);
      }
      public function terima_pesan($id)
      {
            $data['trs'] = $id;
            $this->load->view('users/header');
            $this->load->view('Toko/terima_pesanan', $data);
            $this->load->view('users/footer');
      }
      public function tolak_pesan($id)
      {
            $data['trs'] = $id;
            $this->load->view('users/header');
            $this->load->view('Toko/tolak_pesanan', $data);
            $this->load->view('users/footer');
      }
      public function tolak_pemesanan()
      {
            $alasan = $this->input->post('alasan');
            $trs = $this->input->post('trs');
            $this->db->query("UPDATE keranjang SET status ='Pemesanan Barang di tolak' , alasan_tolak = '$alasan'  WHERE  id_pesan = '$trs' ");
            $toko = $this->db->query("SELECT  id_toko FROM keranjang WHERE id_pesan = '$trs' limit 1")->result_array();
            $id = $toko[0]['id_toko'];
            $this->session->set_flashdata(
                  'pesan',
                  '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 Status Pesanan Telah diupdate
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect("toko/pesanan_masuk/$id");
      }
      public function input_resi()
      {
            $resi = $this->input->post('resi');
            $trs = $this->input->post('trs');
            $this->db->query("UPDATE keranjang SET status ='barang sedang dikirim' , no_resi = '$resi'  WHERE  id_pesan = '$trs' ");
            $toko = $this->db->query("SELECT  id_toko FROM keranjang WHERE id_pesan = '$trs' limit 1")->result_array();
            $id = $toko[0]['id_toko'];
            $this->session->set_flashdata(
                  'pesan',
                  '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 Status Pesanan Telah diupdate
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect("toko/pesanan_masuk/$id");
      }
      public function pesanan_di_penjual($id)
      {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id_user = $data['user']['id'];
            $data['master'] = $this->M_User->riwayat_transaksi_master($id, $id_user);
            $data['trs'] = $this->M_User->riwayat_transaksi_detail_penjual($id);
            $id_order = $data['master']['id_order'];
            $data['total_belanja'] = $this->M_User->total_belanja($id_order);
            $this->load->view('users/header');
            $this->load->view('Toko/transaksi_di_penjual', $data);
            $this->load->view('users/footer');
      }
      public function barang_diterima_pembeli($id)
      {
            $ids = (explode('-', $id));
            $id_pesan = $ids[0];
            $id_barang = $ids[1];
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $retur = $this->db->query("SELECT 
            k.id_transaksi,
           (select user_id from toko where id_toko in (select id_toko from keranjang where id_pesan = '$id_pesan')) as user_id,
            t.bukti_tf
            FROM 
            keranjang k
            JOIN user u ON k.id_user = u.id
            JOIN transaksi t on k.id_transaksi = t.id_transaksi
            WHERE
            k.id_pesan = '$id_pesan'
      ")->row_array();

            $id_user = $retur['user_id'];
            $id_trs = $retur['id_transaksi'];
            $bukti_tf = $retur['bukti_tf'];
            $arr = [
                  'id_user ' => $id_user,
                  'id_transaksi' => $id_trs,
                  'bukti_tf' => $bukti_tf,
                  'status_retur' => 'Proses by admin',
                  'jenis_pembayaran' => 'Pembayaran produk'
            ];
            $this->db->insert('retur_dana', $arr);
            $this->db->query("UPDATE keranjang SET status ='barang di terima' WHERE id_pesan = '$id_pesan' ");
            $this->db->query("UPDATE transaksi SET status ='barang di terima' WHERE id_transaksi = '$id_trs' ");
            header("Location: ../penilaian_produk/" . $id_barang);
      }
      public  function penilaian_produk($id_barang)
      {
            $data['produk'] = $this->M_User->masukan_detail($id_barang);
            var_dump($data['produk']);
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('users/header');
            $this->load->view('Toko/masukan', $data);
            $this->load->view('users/footer');
      }
      public function beri_masukan()
      {
            $this->M_User->masukan();
            redirect('users/index');
      }
      public function batal_pesan_pembeli($id_order)
      {
            $this->db->query("UPDATE keranjang SET status ='Pesanan Dibatalkan Pembeli' WHERE id_order = '$id_order'");
            $this->db->query("UPDATE transaksi SET status = 'Pesanan Dibatalkan Pembeli' WHERE id_transaksi IN (SELECT id_transaksi FROM keranjang WHERE id_order = '$id_order')");
            $retur = $this->db->query("
            SELECT 
            k.id_order,
            k.id_user,
            t.bukti_tf
            FROM 
            keranjang k
            JOIN user u ON k.id_user = u.id
            JOIN transaksi t on k.id_transaksi = t.id_transaksi
            WHERE
            k.id_order = '$id_order'
            ")->row_array();
            $id_user = $retur['id_user'];
            $id_order = $retur['id_order'];
            $bukti_tf = $retur['bukti_tf'];

            $data = [
                  'id_user ' => $id_user,
                  'id_order' => $id_order,
                  'bukti_tf' => $bukti_tf,
                  'status_retur' => 'Proses by admin',
                  'jenis_pembayaran' => 'Retur'
            ];
            $this->db->insert('retur_dana', $data);
            $this->session->set_flashdata(
                  'pesan',
                  '<div class="alert alert-info alert-dismissible fade show" role="alert">
                 Status Pesanan Telah diupdate
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('toko/keranjang_belanja');
      }
}
