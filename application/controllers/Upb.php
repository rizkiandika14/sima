<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upb extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/dashboard');
        $this->load->view('templates/footer');
    }

    public function pengajuan()
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $data['nama_brg'] = $this->db->get('pengajuan')->result_array();
        $this->load->model('User_model', 'user_model');

        $data['user'] = $this->user_model->getDataUser();
        // $data['dpengajuan'] = $this->dpengajuan_model->getPengajuanTemp();
        $data['pengajuandiv'] = $this->Upb_model->getDivisiTemp();
        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/pengajuan', $data);
        $this->load->view('templates/footer');
    }


    public function dtpengajuan()
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $data['nama_brg'] = $this->db->get('pengajuan')->result_array();
        $this->load->model('User_model', 'user_model');

        $data['user'] = $this->user_model->getDataUser();
        $data['dpengajuan'] = $this->dpengajuan_model->getPengajuanTemp();
        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/div_pengajuan', $data);
        $this->load->view('templates/footer');
    }


    public function pengajuanDetail($waktu, $divisi, $minggu)
    {
        $this->load->model('Upb_model', 'upb_model');
        $data['waktu'] = $this->Upb_model->getPengajuanDetail($waktu, $divisi, $minggu);
        $data['dpengajuan'] = $this->Upb_model->getPengajuanTemp($waktu, $divisi, $minggu);
        $data['divisi'] = $divisi;
        $data['minggu'] = $minggu;
        $data['tanggal'] = $waktu;


        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/div_pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function purchaserequisition()
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $data['nama_brg'] = $this->db->get('pengajuan')->result_array();
        $this->load->model('User_model', 'user_model');

        $data['user'] = $this->user_model->getDataUser();
        // $data['dpengajuan'] = $this->dpengajuan_model->getPengajuanTemp();
        $data['pengajuanpr'] = $this->Upb_model->getDivisiTempPr();
        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/pr', $data);
        $this->load->view('templates/footer');
    }
    public function pengajuanDetailPr($waktu, $divisi, $minggu)
    {
        $this->load->model('Upb_model', 'upb_model');
        $data['waktu'] = $this->Upb_model->getPengajuanPrDetail($waktu, $divisi, $minggu);
        $data['dpengajuanpr'] = $this->Upb_model->getPengajuanTempPr($waktu, $divisi, $minggu);
        $data['divisi'] = $divisi;
        $data['minggu'] = $minggu;
        $data['tanggal'] = $waktu;


        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/pr_detail', $data);
        $this->load->view('templates/footer');
    }


    //PURCHASE ORDER
    public function purchaseorder()
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $data['nama_brg'] = $this->db->get('pengajuan')->result_array();
        $this->load->model('User_model', 'user_model');

        $data['user'] = $this->user_model->getDataUser();
        // $data['dpengajuan'] = $this->dpengajuan_model->getPengajuanTemp();
        $data['pengajuanpo'] = $this->Upb_model->getDivisiTempPo();
        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/po', $data);
        $this->load->view('templates/footer');
    }

    public function pengajuanDetailPo($waktu, $divisi, $minggu)
    {
        $this->load->model('Upb_model', 'upb_model');
        $data['waktu'] = $this->Upb_model->getPengajuanPoDetail($waktu, $divisi, $minggu);
        $data['dpengajuanpo'] = $this->Upb_model->getPengajuanTempPo($waktu, $divisi, $minggu);
        $data['divisi'] = $divisi;
        $data['minggu'] = $minggu;
        $data['tanggal'] = $waktu;


        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/po_detail', $data);
        $this->load->view('templates/footer');
    }

    public function selesai($id)
    {
        $sql = "UPDATE pengajuan SET status='Telah Diterima' WHERE id=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Activated<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }


    public function aset()
    {
        $this->load->model('Aset_model', 'Aset_model');
        $data['nama_brg'] = $this->db->get('aset')->result_array();


        $data['aset'] = $this->Aset_model->getAset();
        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/aset', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_barang()
    {
        $data['nama_brg'] = $this->db->get('aset')->result_array();

        $this->form_validation->set_rules('nama_brg', 'Barang', 'required');
        $data = [
            'nama_brg' => $this->input->post('nama_brg'),
            'merek' => $this->input->post('merek'),
            'asal_brg' => $this->input->post('asal_brg'),
            'thn_perolehan' => $this->input->post('thn_perolehan'),
            'tgl_perolehan' => $this->input->post('tgl_perolehan'),
            'hrg_perolehan' => $this->input->post('hrg_perolehan'),
            'keadaan_brg' => $this->input->post('keadaan_brg'),
            'peruntukan' => $this->input->post('peruntukan'),
            'ket' => $this->input->post('ket'),
            'jenis_brg' => $this->input->post('jenis_brg')
        ];
        $this->db->insert('aset', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang added!</div>');
        redirect('upb/aset');
    }

    public function fungsi_edit()
    {
        $id = $this->input->post('id');
        $nama_brg = $this->input->post('nama_brg');
        $merek = $this->input->post('merek');
        $asal_brg = $this->input->post('asal_brg');
        $thn_perolehan = $this->input->post('thn_perolehan');
        $tgl_perolehan = $this->input->post('tgl_perolehan');
        $hrg_perolehan = $this->input->post('hrg_perolehan');
        $keadaan_brg = $this->input->post('keadaan_brg');
        $peruntukan = $this->input->post('peruntukan');
        $ket = $this->input->post('ket');
        $jenis_brg = $this->input->post('jenis_brg');
        $ArrUpdate = array(
            'nama_brg' => $nama_brg,
            'merek' => $merek,
            'asal_brg' => $asal_brg,
            'thn_perolehan' => $thn_perolehan,
            'tgl_perolehan' => $tgl_perolehan,
            'hrg_perolehan' => $hrg_perolehan,
            'keadaan_brg' => $keadaan_brg,
            'peruntukan' => $peruntukan,
            'ket' => $ket,
            'jenis_brg' => $jenis_brg

        );
        $this->Aset_model->updateAset($id, $ArrUpdate);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Barang Edited!</div>');
        Redirect(base_url('upb/aset'));
    }

    public function fungsi_delete($id)
    {
        $this->Aset_model->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Barang Deleted!</div>');
        Redirect(Base_url('upb/aset'));
    }

    public function setuju()
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d');
        $id = $this->input->post('id');

        $jumlah = $this->input->post('jumlah');
        $harga = $this->input->post('harga');
        $satuan = $this->input->post('satuan');
        $total = $this->input->post('total');
        $waktu = date('Y-m-d');
        $realisasi = $this->input->post('realisasi');
        $status = 'disetujui upb';
        $ArrUpdate = array(

            'jumlah' => $jumlah,
            'harga' => $harga,
            'satuan' => $satuan,
            'total' => $total,
            'waktu_validasi' => $waktu,
            'status' => $status,
            'realisasi' => $realisasi

        );
        $this->Upb_model->updatePengajuan($id, $ArrUpdate);
        // Redirect('admin', 'refresh');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    public function proses()
    {

        $id = $this->input->post('id');

        $jumlah = $this->input->post('jumlah');
        $harga = $this->input->post('harga');
        $satuan = $this->input->post('satuan');
        $total = $this->input->post('total');
        $realisasi = $this->input->post('realisasi');
        $status = 'waiting approvel';
        $ArrUpdate = array(

            'jumlah' => $jumlah,
            'harga' => $harga,
            'satuan' => $satuan,
            'total' => $total,

            'status' => $status,
            'realisasi' => $realisasi

        );
        $this->Upb_model->updatePengajuan($id, $ArrUpdate);
        // Redirect('admin', 'refresh');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    public function editmetodep()
    {

        $id = $this->input->post('id');

        $jumlah = $this->input->post('jumlah');
        $harga = $this->input->post('harga');
        $satuan = $this->input->post('satuan');
        $total = $this->input->post('total');
        // $metodep = $this->input->post('metode_pembayaran');
        $realisasi = $this->input->post('realisasi');
        // $status = 'waiting approvel';
        $ArrUpdate = array(

            'jumlah' => $jumlah,
            'harga' => $harga,
            'satuan' => $satuan,
            'total' => $total,
            // 'metode_pembayaran' => $metodep,
            // 'status' => $status,
            'realisasi' => $realisasi

        );
        $this->Upb_model->updatePengajuan($id, $ArrUpdate);
        // Redirect('admin', 'refresh');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }



    public function tolak()
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d');
        $id = $this->input->post('id');

        $jumlah = $this->input->post('jumlah');
        $harga = $this->input->post('harga');
        $satuan = $this->input->post('satuan');
        $total = $this->input->post('total');
        $waktu = date('Y-m-d');
        $realisasi = $this->input->post('realisasi');
        $keterangan = $this->input->post('keterangan');
        $status = 'ditolak upb';
        $ArrUpdate = array(

            'jumlah' => $jumlah,
            'harga' => $harga,
            'satuan' => $satuan,
            'total' => $total,
            'waktu_validasi' => $waktu,
            'status' => $status,
            'realisasi' => $realisasi,
            'keterangan' => $keterangan

        );
        $this->Upb_model->updatePengajuan($id, $ArrUpdate);
        // Redirect('admin', 'refresh');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    public function diproses($id)
    {
        $sql = "UPDATE pengajuan SET status='waiting approvement' WHERE id=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Telah Disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    //SURAT MAASUK
    public function suratmasuk()
    {
        $this->load->model('Upb_model', 'upb_model');
        // $data['users'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suratmasuk'] = $this->Upb_model->getAllSuratMasuk();


        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/suratmasuk', $data);
        $this->load->view('templates/footer');
    }

    public function add_suratmasuk()
    {
        $data['suratmasuk'] = $this->db->get('suratmasuk')->result_array();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('perihal', 'perihal', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');

        //jika ada gambar
        $upload_pdf = $_FILES['file'];

        if ($upload_pdf) {
            $config['allowed_types'] = 'pdf';
            $config['upload_path'] = './assets/surat/suratmasuk/';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $new_file = $this->upload->data('file_name');
                $data = [
                    'tanggal' => $this->input->post('tanggal'),
                    'perihal' => $this->input->post('perihal'),
                    'isi' => $this->input->post('isi'),
                    'no_surat' => $this->input->post('no_surat'),
                    'pengirim' => $this->input->post('pengirim'),
                    'file' => $new_file
                ];
                $this->db->insert('suratmasuk', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Added!!</div>');
                redirect('upb/suratmasuk');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">' . $this->upload->display_errors() . '</div>');
                redirect('upb/suratmasuk');
            }
        }
    }

    public function fungsi_delete_sm($id_suratmasuk)
    {
        $this->Upb_model->hapus($id_suratmasuk);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Deleted!</div>');
        Redirect(Base_url('upb/suratmasuk'));
    }
    public function detail_suratmasuk($id_suratmasuk)
    {
        $this->load->model('Upb_model', 'upb_model');
        // $data['users'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suratmasuk'] = $this->Upb_model->getDetailSuratmasuk($id_suratmasuk);

        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/detail_suratmasuk', $data);
        $this->load->view('templates/footer');
    }

    //SURAT KELUAR
    public function suratkeluar()
    {
        $this->load->model('Upb_model', 'upb_model');
        // $data['users'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suratkeluar'] = $this->Upb_model->getAllSuratKeluar();


        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/suratkeluar', $data);
        $this->load->view('templates/footer');
    }

    public function fungsi_delete_sk($id_suratkeluar)
    {
        $this->Upb_model->hapus_sk($id_suratkeluar);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Deleted!</div>');
        Redirect(Base_url('upb/suratkeluar'));
    }

    public function add_suratkeluar()
    {
        $data['suratkeluar'] = $this->db->get('suratkeluar')->result_array();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');

        //jika ada gambar
        $upload_pdf = $_FILES['file'];

        if ($upload_pdf) {
            $config['allowed_types'] = 'pdf';
            $config['upload_path'] = './assets/surat/suratkeluar/';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $new_file = $this->upload->data('file_name');
                $data = [
                    'tanggal' => $this->input->post('tanggal'),
                    'perihal' => $this->input->post('perihal'),
                    'isi' => $this->input->post('isi'),
                    'no_surat' => $this->input->post('no_surat'),
                    'tujuan_pengiriman' => $this->input->post('tujuan_pengiriman'),
                    'file' => $new_file
                ];
                $this->db->insert('suratkeluar', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi Added!!</div>');
                redirect('upb/suratkeluar');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">' . $this->upload->display_errors() . '</div>');
                redirect('upb/suratkeluar');
            }
        }
    }

    public function detail_suratkeluar($id_suratkeluar)
    {
        $this->load->model('Upb_model', 'upb_model');
        // $data['users'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['suratkeluar'] = $this->Upb_model->getDetailSuratkeluar($id_suratkeluar);

        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/detail_suratkeluar', $data);
        $this->load->view('templates/footer');
    }


    //BARANG
    public function barang()
    {
        $this->load->model('Upb_model', 'upb_model');
        $data['barang'] = $this->upb_model->getBarang();
        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/barang', $data);
        $this->load->view('templates/footer');
    }

    public function add_barang()
    {
        $data['asal_barang'] = $this->db->get('asal_barang')->result_array();
        $this->load->model('Upb_model', 'upb_model');
        $data['kode_bangunan'] = $this->upb_model->kode_bangunan();
        $data['ruangan'] = $this->db->get('tbl_ruangan')->result_array();
        // $data['subklasifikasi'] = $this->upb_model->kode_barang();
        $data['jenisbarang'] = $this->db->get('jenis_barang')->result_array();
        $this->load->model('Barang_model', 'barang_model');
        $data['satuans'] = $this->barang_model->getSatuan();

        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/add_barang', $data);
        $this->load->view('templates/footer');
    }

    public function add_barang_fungsi()
    {
        //jika ada gambar
        $photo = $_FILES['foto_barang']['name'];

        if ($photo) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/barang/';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto_barang')) {

                $photo = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">' . $this->upload->display_errors() . '</div>');
                $referred_from = $this->session->userdata('referred_from');
                redirect($referred_from, 'refresh');
            }
        }
        $data = [

            'id_ruangan' => $this->input->post('id_ruangan'),
            'id_subklasifikasi' => $this->input->post('id_subklasifikasi'),
            'id_jenis_barang' => $this->input->post('id_jenis_barang'),
            'kode_lokasi' => $this->input->post('kode_lokasi'),
            'kode_barang' => $this->input->post('kode_barang') . '/' . $this->input->post('bulan_perolehan') . '.' . $this->input->post('tahun_perolehan'),
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah_barang' => $this->input->post('jumlah_barang'),
            'spesifikasi_teknis' => $this->input->post('spesifikasi_teknis'),
            'serial_number' => $this->input->post('serial_number'),
            'model_number' => $this->input->post('model_number'),
            'id_asal_barang' => $this->input->post('id_asal_barang'),
            'tahun_perolehan' => $this->input->post('tahun_perolehan'),
            'tanggal_perolehan' => $this->input->post('tanggal_perolehan'),
            'harga_perolehan' => $this->input->post('harga_perolehan'),
            'keadaan_barang' => $this->input->post('keadaan_barang'),
            'peruntukan' => $this->input->post('peruntukan'),
            'keterangan' => $this->input->post('keterangan'),
            'foto_barang' => $photo,

        ];
        $this->db->insert('tbl_barang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Barang Added!</div>');

        redirect('upb/barang');
    }

    public function detail_barang($id_barang)
    {

        $this->load->model('Upb_model', 'upb_model');
        $data['detail_barang'] = $this->upb_model->ambil_id_barang($id_barang);
        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/detail_barang', $data);
        $this->load->view('templates/footer');
    }

    public function fungsi_delete_barang($id_barang)
    {
        $this->Upb_model->hapusbarang($id_barang);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Barang Deleted!</div>');
        Redirect(Base_url('upb/barang'));
    }

    public function fungsi_edit_barang()
    {
        $data['asal_barang'] = $this->db->get('asal_barang')->result_array();
        $this->load->model('Upbmaster_model', 'upbmaster_model');
        $data['kode_bangunan'] = $this->upbmaster_model->kode_bangunan();
        $data['ruangan'] = $this->db->get('tbl_ruangan')->result_array();
        // $data['subklasifikasi'] = $this->upbmaster_model->kode_barang();
        $data['jenisbarang'] = $this->db->get('jenis_barang')->result_array();

        // $data['bangunan'] = $this->db->get_where('tbl_bangunan', ['id_bangunan' => $this->input->post('id_bangunan')])->row_array();
        $data['ruangan'] = $this->db->get_where('tbl_ruangan', ['id_ruangan' => $this->input->post('id_ruangan')])->row_array();
        $data['barang'] = $this->db->get_where('tbl_barang', ['id_barang' => $this->input->post('id_barang')])->row_array();
        $id_barang = $this->input->post('id_barang');
        $id_ruangan = $this->input->post('id_ruangan');
        $id_subklasifikasi = $this->input->post('id_subklasifikasi');
        $id_jenis_barang = $this->input->post('id_jenis_barang');
        $kode_lokasi = $this->input->post('kode_lokasi');
        $kode_barang = $this->input->post('kode_barang') . '/' . $this->input->post('bulan_perolehan') . '.' . $this->input->post('tahun_perolehan');
        $nama_barang = $this->input->post('nama_barang');
        $jumlah_barang = $this->input->post('jumlah_barang');
        $satuan_barang = $this->input->post('satuan');
        $spesifikasi_teknis = $this->input->post('spesifikasi_teknis');
        $serial_number = $this->input->post('serial_number');
        $model_number = $this->input->post('model_number');
        $id_asal_barang = $this->input->post('id_asal_barang');
        $tahun_perolehan = $this->input->post('tahun_perolehan');
        $tanggal_perolehan = $this->input->post('tanggal_perolehan');
        $harga_perolehan = $this->input->post('harga_perolehan');
        $keadaan_barang = $this->input->post('keadaan_barang');
        $peruntukan = $this->input->post('peruntukan');
        $keterangan = $this->input->post('keterangan');

        //jika ada gambar
        $photo = $_FILES['foto_barang']['name'];

        if ($photo) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/barang/';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto_barang')) {
                $old_image = $data['barang']['foto_barang'];
                if ($old_image != '') {
                    unlink(FCPATH . 'assets/img/barang/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_barang', $new_image);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">' . $this->upload->display_errors() . '</div>');
                redirect('upb/edit_barang');
            }
        }

        $this->db->set('id_ruangan', $id_ruangan);
        $this->db->set('id_subklasifikasi', $id_subklasifikasi);
        $this->db->set('id_jenis_barang', $id_jenis_barang);
        $this->db->set('kode_lokasi', $kode_lokasi);
        $this->db->set('kode_barang', $kode_barang);
        $this->db->set('nama_barang', $nama_barang);
        $this->db->set('jumlah_barang', $jumlah_barang);
        $this->db->set('satuan_barang', $satuan_barang);
        $this->db->set('spesifikasi_teknis', $spesifikasi_teknis);
        $this->db->set('serial_number', $serial_number);
        $this->db->set('model_number', $model_number);
        $this->db->set('id_asal_barang', $id_asal_barang);
        $this->db->set('tahun_perolehan', $tahun_perolehan);
        $this->db->set('tanggal_perolehan', $tanggal_perolehan);
        $this->db->set('harga_perolehan', $harga_perolehan);
        $this->db->set('keadaan_barang', $keadaan_barang);
        $this->db->set('peruntukan', $peruntukan);
        $this->db->set('keterangan', $keterangan);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tbl_barang');

        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data Barang Edited!</div>');
        Redirect(base_url('upb/barang'));
    }

    public function updatebarang($id_barang)
    {
        $this->load->model('Barang_model', 'barang_model');
        $data['satuans'] = $this->barang_model->getSatuan();
        $this->load->model('Upbmaster_model', 'upbmaster_model');
        $data['ruangan'] = $this->db->get('tbl_ruangan')->result_array();
        $data['jenisbarang'] = $this->db->get('jenis_barang')->result_array();
        $data['kode_bangunan'] = $this->upbmaster_model->kode_bangunan();
        // $data['subklasifikasi'] = $this->upbmaster_model->kode_barang();
        $data['asal_barang'] = $this->db->get('asal_barang')->result_array();
        $this->load->model('Upbmaster_model', 'upbmaster_model');
        $data['detail_barang'] = $this->upbmaster_model->ambil_id_barang($id_barang);
        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/edit_barang', $data);
        $this->load->view('templates/footer');
    }

    //BERITA ACARA
    // public function detpengajuan()
    // {
    //     $this->load->model('Upb_model', 'upb_model');
    //     $data['pencarian_data'] = $this->upb_model->getAll();

    //     $this->load->view('templates/header');
    //     $this->load->view('templates/upb_sidebar');
    //     $this->load->view('upb/berita_acara', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function datepengajuan()
    // {
    //     $tgla = $this->input->post('tgla');
    //     $tglb = $this->input->post('tglb');
    //     $status = $this->input->post('status');
    //     $this->load->model('Pengajuan_model', 'pengajuan_model');
    //     $data['pencarian_data'] = $this->pengajuan_model->getDate($tgla, $tglb, $status);


    //     $this->load->view('templates/header');
    //     $this->load->view('templates/upb_sidebar');
    //     $this->load->view('upb/berita_acara', $data);
    //     $this->load->view('templates/footer');
    // }

    public function berita_acara()
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $data['nama_brg'] = $this->db->get('pengajuan')->result_array();
        $this->load->model('User_model', 'user_model');

        $data['user'] = $this->user_model->getDataUser();
        // $data['dpengajuan'] = $this->dpengajuan_model->getPengajuanTemp();
        $data['berita_acara'] = $this->Upb_model->getDivisi2TempPo();
        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/berita_acara', $data);
        $this->load->view('templates/footer');
    }

    public function berita_acara_detail($waktu, $divisi, $minggu)
    {
        $this->load->model('Upb_model', 'upb_model');
        $data['waktu'] = $this->Upb_model->getBeritaAcaraDetail($waktu, $divisi, $minggu);
        $data['dberita_acara'] = $this->Upb_model->getBeritaAcaraTemp($waktu, $divisi, $minggu);
        $data['divisi'] = $divisi;
        $data['minggu'] = $minggu;
        $data['tanggal'] = $waktu;


        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/berita_acara_detail', $data);
        $this->load->view('templates/footer');
    }

    //DATA PENGAJUAN DITOLAK
    public function datapengajuan()
    {
        $this->load->model('Upb_model', 'upb_model');
        $data['pencarian_data'] = $this->upb_model->getAll();

        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/data_pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function datepengajuan()
    {
        $tgla = $this->input->post('tgla');
        $tglb = $this->input->post('tglb');
        // $status = $this->input->post('status');
        $this->load->model('Upb_model', 'upb_model');
        $data['pencarian_data'] = $this->upb_model->getDate($tgla, $tglb);


        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/data_pengajuan', $data);
        $this->load->view('templates/footer');
    }

    //ARSIP NOTA
    public function arsipnota()
    {
        $this->load->model('Upb_model', 'upb_model');
        // $data['users'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['arsipnota'] = $this->Upb_model->getAllArsipNota();


        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/arsip_nota', $data);
        $this->load->view('templates/footer');
    }

    public function add_arsipnota()
    {
        $photo = $_FILES['foto_nota']['name'];

        if ($photo) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/arsip/arsipnota/';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto_nota')) {

                $photo = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">' . $this->upload->display_errors() . '</div>');
                redirect('upb/arsipnota');
            }
        }
        $data = [

            'tanggal' => $this->input->post('tanggal'),
            'nama_vendor' => $this->input->post('nama_vendor'),
            'foto_nota' => $photo
        ];
        $this->db->insert('arsipnota', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data  added!</div>');
        redirect('upb/arsipnota');
    }

    //ARSIP GAMBAR
    public function arsipgambar()
    {
        $this->load->model('Upb_model', 'upb_model');
        // $data['users'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['arsipgambar'] = $this->Upb_model->getAllArsipGambar();


        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
        $this->load->view('upb/arsip_gambar', $data);
        $this->load->view('templates/footer');
    }

    public function add_arsipgambar()
    {
        $photo = $_FILES['image']['name'];

        if ($photo) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/arsip/arsipgambar/';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {

                $photo = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">' . $this->upload->display_errors() . '</div>');
                redirect('upb/arsipgambar');
            }
        }
        $data = [

            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'image' => $photo
        ];
        $this->db->insert('arsipgambar', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data  added!</div>');
        redirect('upb/arsipgambar');
    }
}