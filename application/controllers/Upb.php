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
        $metodep = $this->input->post('metode_pembayaran');
        $realisasi = $this->input->post('realisasi');
        $status = 'waiting approvel';
        $ArrUpdate = array(

            'jumlah' => $jumlah,
            'harga' => $harga,
            'satuan' => $satuan,
            'total' => $total,
            'metode_pembayaran' => $metodep,
            'status' => $status,
            'realisasi' => $realisasi

        );
        $this->Upb_model->updatePengajuan($id, $ArrUpdate);
        // Redirect('admin', 'refresh');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    public function ditolak($id)
    {
        $sql = "UPDATE pengajuan SET status='ditolak' WHERE id=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Telah Disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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

    // //ASAL BARANG
    // public function asal_barang()
    // {
    //     $this->load->model('Upbmaster_model', 'Upbmaster_model');
    //     $data['nama_asal_barang'] = $this->db->get('asal_barang')->result_array();


    //     $data['asal_barang'] = $this->Upbmaster_model->getAsalBarang();
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/admin_sidebar');
    //     $this->load->view('admin/asal_barang', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function tambah_asal_barang()
    // {
    //     $data['nama_asal_barang'] = $this->db->get('asal_barang')->result_array();

    //     $this->form_validation->set_rules('nama_asal_barang', 'Barang', 'required');
    //     $data = [

    //         'nama_asal_barang' => $this->input->post('nama_asal_barang')
    //     ];
    //     $this->db->insert('asal_barang', $data);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Asal Barang added!</div>');
    //     redirect('admin/asal_barang');
    // }

    // public function fungsi_edit_asal_barang()
    // {
    //     $id = $this->input->post('id_asal_barang');
    //     $nama_asal_barang = $this->input->post('nama_asal_barang');
    //     $ArrUpdate = array(
    //         'nama_asal_barang' => $nama_asal_barang


    //     );
    //     $this->Upbmaster_model->updateAsalBarang($id, $ArrUpdate);
    //     $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Asal Barang Edited!</div>');
    //     Redirect(base_url('admin/asal_barang'));
    // }

    // public function fungsi_delete_asal_barang($id)
    // {
    //     $this->Upbmaster_model->hapus($id);
    //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Asal Barang Deleted!</div>');
    //     Redirect(Base_url('admin/asal_barang'));
    // }

    // //JENIS BARANG 
    // public function jenis_barang()
    // {
    //     $this->load->model('Upbmaster_model', 'Upbmaster_model');
    //     $data['jenis_barang'] = $this->db->get('jenis_barang')->result_array();


    //     $data['jenis_barang'] = $this->Upbmaster_model->getJenisBarang();
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/admin_sidebar');
    //     $this->load->view('admin/jenis_barang', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function tambah_jenis_barang()
    // {
    //     $data['jenis_barang'] = $this->db->get('jenis_barang')->result_array();

    //     $this->form_validation->set_rules('nama_asal_barang', 'Barang', 'required');
    //     $data = [

    //         'jenis_barang' => $this->input->post('jenis_barang')
    //     ];
    //     $this->db->insert('jenis_barang', $data);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Barang added!</div>');
    //     redirect('admin/jenis_barang');
    // }

    // public function fungsi_edit_jenis_barang()
    // {
    //     $id = $this->input->post('id_jenis_barang');
    //     $jenis_barang = $this->input->post('jenis_barang');
    //     $ArrUpdate = array(
    //         'jenis_barang' => $jenis_barang


    //     );
    //     $this->Upbmaster_model->updateJenisBarang($id, $ArrUpdate);
    //     $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Jenis Barang Edited!</div>');
    //     Redirect(base_url('admin/jenis_barang'));
    // }

    // public function fungsi_delete_jenis_barang($id)
    // {
    //     $this->Upbmaster_model->hapusjenisbarang($id);
    //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jenis Barang Deleted!</div>');
    //     Redirect(Base_url('admin/jenis_barang'));
    // }

    // //LANTAI
    // public function lantai()
    // {
    //     $this->load->model('Upbmaster_model', 'Upbmaster_model');
    //     $data['lantai'] = $this->db->get('lantai')->result_array();


    //     $data['lantai'] = $this->Upbmaster_model->getLantai();
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/admin_sidebar');
    //     $this->load->view('admin/lantai', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function tambah_lantai()
    // {
    //     $data['lantai'] = $this->db->get('lantai')->result_array();

    //     $this->form_validation->set_rules('lantai', 'Barang', 'required');
    //     $data = [

    //         'kode' => $this->input->post('kode'),
    //         'lantai' => $this->input->post('lantai')
    //     ];
    //     $this->db->insert('lantai', $data);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Lantai added!</div>');
    //     redirect('upb/lantai');
    // }

    // public function fungsi_edit_lantai()
    // {
    //     $id = $this->input->post('id');
    //     $kode = $this->input->post('kode');
    //     $lantai = $this->input->post('lantai');
    //     $ArrUpdate = array(
    //         'kode' => $kode,
    //         'lantai' => $lantai


    //     );
    //     $this->Upbmaster_model->updateLantai($id, $ArrUpdate);
    //     $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data Lantai Edited!</div>');
    //     Redirect(base_url('admin/lantai'));
    // }

    // public function fungsi_delete_lantai($id)
    // {
    //     $this->Upbmaster_model->hapuslantai($id);
    //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Lantai Deleted!</div>');
    //     Redirect(Base_url('admin/jenis_barang'));
    // }

    // //GOLONGAN
    // public function golongan()
    // {
    //     $this->load->model('Upbmaster_model', 'Upbmaster_model');
    //     $data['golongan'] = $this->db->get('golongan')->result_array();


    //     $data['golongan'] = $this->Upbmaster_model->getGolongan();
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/admin_sidebar');
    //     $this->load->view('admin/golongan', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function tambah_golongan()
    // {
    //     $data['golongan'] = $this->db->get('golongan')->result_array();

    //     $this->form_validation->set_rules('lantai', 'Barang', 'required');
    //     $data = [

    //         'kode' => $this->input->post('kode'),
    //         'keterangan' => $this->input->post('keterangan')
    //     ];
    //     $this->db->insert('golongan', $data);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Golongan added!</div>');
    //     redirect('admin/golongan');
    // }

    // public function fungsi_edit_golongan()
    // {
    //     $id = $this->input->post('id_golongan');
    //     $kode = $this->input->post('kode');
    //     $keterangan = $this->input->post('keterangan');
    //     $ArrUpdate = array(
    //         'kode' => $kode,
    //         'keterangan' => $keterangan


    //     );
    //     $this->Upbmaster_model->updateGolongan($id, $ArrUpdate);
    //     $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data Golongan Edited!</div>');
    //     Redirect(base_url('admin/golongan'));
    // }

    // public function fungsi_delete_golongan($id)
    // {
    //     $this->Upbmaster_model->hapusgolongan($id);
    //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Golongan Deleted!</div>');
    //     Redirect(Base_url('admin/golongan'));
    // }

    // //KLASIFIKASI
    // public function klasifikasi()
    // {
    //     $this->load->model('Upbmaster_model', 'Upbmaster_model');
    //     $data['klasifikasi'] = $this->db->get('klasifikasi')->result_array();



    //     $data['golongan'] = $this->Upbmaster_model->getGolongan();


    //     $data['klasifikasi'] = $this->Upbmaster_model->getKlasifikasi();
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/admin_sidebar');
    //     $this->load->view('admin/klasifikasi', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function add_klasifikasi()
    // {
    //     $data['keterangan'] = $this->db->get('klasifikasi')->result_array();
    //     $data = [

    //         'kode_klas' => $this->input->post('kode'),
    //         'keterangan_klas' => $this->input->post('keterangan'),
    //         'golongan_id' => $this->input->post('golongan_id')

    //     ];
    //     $this->db->insert('klasifikasi', $data);


    //     redirect('admin/klasifikasi');
    // }

    // public function fungsi_delete_klasifikasi($id_klas)
    // {
    //     $this->Upbmaster_model->hapus_klasifikasi($id_klas);
    //     Redirect(Base_url('admin/klasifikasi'));
    // }
}