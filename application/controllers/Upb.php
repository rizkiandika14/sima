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
        // $metodep = $this->input->post('metode_pembayaran');
        $realisasi = $this->input->post('realisasi');
        $status = 'waiting approvel';
        $ArrUpdate = array(

            'jumlah' => $jumlah,
            'harga' => $harga,
            'satuan' => $satuan,
            'total' => $total,
            // 'metode_pembayaran' => $metodep,
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
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
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
                    'judul' => $this->input->post('judul'),
                    'isi' => $this->input->post('isi'),
                    'file' => $new_file
                ];
                $this->db->insert('suratmasuk', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi Added!!</div>');
                redirect('upb/suratmasuk');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">' . $this->upload->display_errors() . '</div>');
                redirect('upb/suratmasuk');
            }
        }
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
                    'judul' => $this->input->post('judul'),
                    'isi' => $this->input->post('isi'),
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
}