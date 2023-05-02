<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('templates/footer');
    }

    public function barang()
    {
        $this->load->model('Barang_model', 'barang_model');
        $data['nama_brg'] = $this->db->get('barang')->result_array();


        $data['barang'] = $this->barang_model->getBarang();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/barang', $data);
        $this->load->view('templates/footer');
    }

    public function barang_temp()
    {
        $this->load->model('Temp_model', 'temp_model');
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();

        $data['barang_temp'] = $this->temp_model->getBarangTemp();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_barang()
    {
        $data['nama_brg'] = $this->db->get('barang')->result_array();

        $this->form_validation->set_rules('nama_brg', 'Barang', 'required');
        $data = [
            'nama_brg' => $this->input->post('nama_brg')
        ];
        $this->db->insert('barang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang added!</div>');
        redirect('admin/barang');
    }

    public function tambah_satuan()
    {
        $data['satuan'] = $this->db->get('barang_satuan')->result_array();

        $this->form_validation->set_rules('satuan', 'barang_satuan', 'required');
        $data = [
            'satuan' => $this->input->post('satuan')
        ];
        $this->db->insert('barang_satuan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Satuan added!</div>');
        redirect('admin/barang');
    }

    public function fungsi_edit()
    {
        $id = $this->input->post('id');
        $nama_brg = $this->input->post('nama_brg');
        $ArrUpdate = array(
            'nama_brg' => $nama_brg
        );
        $this->barang_model->updateBarang($id, $ArrUpdate);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Barang Edited!</div>');
        Redirect(base_url('admin/barang'));
    }


    public function fungsi_delete($id)
    {
        $this->barang_model->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Barang Deleted!</div>');
        Redirect(Base_url('admin/barang'));
    }

    public function fungsi_delete_temp($id)
    {
        $this->barang_model->hapus_temp($id);
        Redirect(Base_url('admin/pengajuan'));
    }

    public function fungsi_delete_temp2($id)
    {
        $this->barang_model->hapus_temp($id);
        Redirect(Base_url('admin/pengajuan2'));
    }

    public function fungsi_delete_temp3($id)
    {
        $this->barang_model->hapus_temp($id);
        Redirect(Base_url('admin/pengajuan3'));
    }

    public function fungsi_delete_temp4($id)
    {
        $this->barang_model->hapus_temp($id);
        Redirect(Base_url('admin/pengajuan4'));
    }

    public function fungsi_pengajuan()
    {
        $this->pengajuan_model->add_pengajuan();
        $this->pengajuan_model->delete_pengajuan();
        Redirect(Base_url('admin/pengajuan'));
    }

    public function fungsi_pengajuan2()
    {
        $this->pengajuan_model->add_pengajuan2();
        $this->pengajuan_model->delete_pengajuan();
        Redirect(Base_url('admin/pengajuan2'));
    }
    public function fungsi_pengajuan3()
    {
        $this->pengajuan_model->add_pengajuan3();
        $this->pengajuan_model->delete_pengajuan();
        Redirect(Base_url('admin/pengajuan3'));
    }
    public function fungsi_pengajuan4()
    {
        $this->pengajuan_model->add_pengajuan4();
        $this->pengajuan_model->delete_pengajuan();
        Redirect(Base_url('admin/pengajuan4'));
    }


    public function pengajuan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Barang_model', 'barang_model');
        $data['nama_brg'] = $this->db->get('barang')->result_array();
        $this->load->model('Temp_model', 'temp_model');
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();
        $this->load->model('Barang_model', 'barang_model');
        $data['satuans'] = $this->barang_model->getSatuan();


        $data['barang'] = $this->barang_model->getBarang();
        $data['barang_temp'] = $this->temp_model->getBarangTemp1();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function pengajuan2()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Barang_model', 'barang_model');
        $data['nama_brg'] = $this->db->get('barang')->result_array();
        $this->load->model('Temp_model', 'temp_model');
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();
        $this->load->model('Barang_model', 'barang_model');
        $data['satuans'] = $this->barang_model->getSatuan();


        $data['barang'] = $this->barang_model->getBarang();
        $data['barang_temp'] = $this->temp_model->getBarangTemp2();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/pengajuan2', $data);
        $this->load->view('templates/footer');
    }

    public function pengajuan3()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Barang_model', 'barang_model');
        $data['nama_brg'] = $this->db->get('barang')->result_array();
        $this->load->model('Temp_model', 'temp_model');
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();
        $this->load->model('Barang_model', 'barang_model');
        $data['satuans'] = $this->barang_model->getSatuan();


        $data['barang'] = $this->barang_model->getBarang();
        $data['barang_temp'] = $this->temp_model->getBarangTemp3();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/pengajuan3', $data);
        $this->load->view('templates/footer');
    }

    public function pengajuan4()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Barang_model', 'barang_model');
        $data['nama_brg'] = $this->db->get('barang')->result_array();
        $this->load->model('Temp_model', 'temp_model');
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();
        $this->load->model('Barang_model', 'barang_model');
        $data['satuans'] = $this->barang_model->getSatuan();


        $data['barang'] = $this->barang_model->getBarang();
        $data['barang_temp'] = $this->temp_model->getBarangTemp4();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/pengajuan4', $data);
        $this->load->view('templates/footer');
    }

    public function barangList()
    {
        $postData = $this->input->post();

        $data = $this->barang_model->getDataBarang($postData);

        echo json_encode($data);
    }



    public function add_temp()
    {
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();
        $data = [
            'nama_brg' => $this->input->post('nama_brg'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'total' => $this->input->post('total'),
            'minggu' => $this->input->post('minggu'),
            'divisi' => $this->input->post('divisi'),
            'barang_id' => $this->input->post('barang_id'),
            'user_id' => $this->input->post('user_id')
        ];
        $this->db->insert('barang_temp', $data);


        redirect('admin/pengajuan');
    }

    public function add_temp2()
    {
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();
        $data = [
            'nama_brg' => $this->input->post('nama_brg'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'total' => $this->input->post('total'),
            'minggu' => $this->input->post('minggu'),
            'divisi' => $this->input->post('divisi'),
            'barang_id' => $this->input->post('barang_id'),
            'user_id' => $this->input->post('user_id')
        ];
        $this->db->insert('barang_temp', $data);


        redirect('admin/pengajuan2');
    }
    public function add_temp3()
    {
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();
        $data = [
            'nama_brg' => $this->input->post('nama_brg'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'total' => $this->input->post('total'),
            'minggu' => $this->input->post('minggu'),
            'divisi' => $this->input->post('divisi'),
            'barang_id' => $this->input->post('barang_id'),
            'user_id' => $this->input->post('user_id')
        ];
        $this->db->insert('barang_temp', $data);


        redirect('admin/pengajuan3');
    }
    public function add_temp4()
    {
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();
        $data = [
            'nama_brg' => $this->input->post('nama_brg'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'total' => $this->input->post('total'),
            'minggu' => $this->input->post('minggu'),
            'divisi' => $this->input->post('divisi'),
            'barang_id' => $this->input->post('barang_id'),
            'user_id' => $this->input->post('user_id')
        ];
        $this->db->insert('barang_temp', $data);


        redirect('admin/pengajuan4');
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->barang_model->search_blog($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->blog_title;
                echo json_encode($arr_result);
            }
        }
    }

    public function rekapBarang()
    {
        $this->load->model('Barang_model', 'barang_model');
        $this->load->model('User_model', 'user_model');
        $this->load->model('Pengajuan_model', 'pengajuan_model');

        $data['user'] = $this->user_model->getDataUser();
        $data['barang'] = $this->barang_model->getBarang();

        $data['pencarian_data'] = $this->pengajuan_model->getAllBarang();
        $tgla = $this->input->post('tgla');
        $tglb = $this->input->post('tglb');
        $nama_brg = $this->input->post('nama_brg');
        $divisi = $this->input->post('nama_divisi');
        $data['totalp'] = $this->pengajuan_model->getJumlahBarang($tgla, $tglb, $nama_brg, $divisi);
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/rekap_barang', $data);
        $this->load->view('templates/footer');
    }

    public function rekapBarangdet()
    {
        $tgla = $this->input->post('tgla');
        $tglb = $this->input->post('tglb');
        $nama_brg = $this->input->post('nama_brg');
        $divisi = $this->input->post('nama_divisi');
        $this->load->model('Barang_model', 'barang_model');
        $this->load->model('User_model', 'user_model');
        $this->load->model('Pengajuan_model', 'pengajuan_model');

        $data['user'] = $this->user_model->getDataUser();
        $data['barang'] = $this->barang_model->getBarang();



        $data['pencarian_data'] = $this->pengajuan_model->getDateBarang($tgla, $tglb, $nama_brg, $divisi);
        $data['totalp'] = $this->pengajuan_model->getJumlahBarang($tgla, $tglb, $nama_brg, $divisi);
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/rekap_barang', $data);
        $this->load->view('templates/footer');
    }

    public function laporan()
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $data['nama_brg'] = $this->db->get('pengajuan')->result_array();
        $this->load->model('User_model', 'user_model');

        $data['user'] = $this->user_model->getDataUser();
        // $data['dpengajuan'] = $this->dpengajuan_model->getPengajuanTemp();
        $data['pengajuandiv'] = $this->dpengajuan_model->getLaporan();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('laporan/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function laporanDetail($waktu, $divisi, $minggu)
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $this->load->model('Laporan_model', 'laporan_model');
        $data['waktu'] = $this->dpengajuan_model->getPengajuanDetail($waktu, $divisi, $minggu);
        $data['dpengajuan'] = $this->dpengajuan_model->getLaporanTemp($waktu, $divisi, $minggu);
        $data['divisi'] = $divisi;
        $data['minggu'] = $minggu;
        $data['tanggal'] = $waktu;
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('laporan/laporan_detail', $data);
        $this->load->view('templates/footer');
    }

    public function import_excel()
    {
        if (isset($_FILES["fileExcel"]["name"])) {
            $path = $_FILES["fileExcel"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 4; $row <= $highestRow; $row++) {
                    $nama_brg = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $temp_data[] = array(
                        'nama_brg'    => $nama_brg
                    );
                }
            }
            $this->load->model('Import_model');
            $insert = $this->Import_model->insert($temp_data);
            if ($insert) {
                $this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            echo "Tidak ada file yang masuk";
        }
    }

    public function validasi_pengajuan()
    {
        $this->load->model('Divpengajuan_model', 'divpengajuan_model');
        $data['nama_brg'] = $this->db->get('pengajuan')->result_array();
        $data['divpengajuan'] = $this->divpengajuan_model->getDivpengajuanTemp();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/validasi_pengajuan', $data);
        $this->load->view('templates/footer');
    }

    //ASAL BARANG
    public function asal_barang()
    {
        $this->load->model('Upbmaster_model', 'Upbmaster_model');
        $data['nama_asal_barang'] = $this->db->get('asal_barang')->result_array();


        $data['asal_barang'] = $this->Upbmaster_model->getAsalBarang();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/asal_barang', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_asal_barang()
    {
        $data['nama_asal_barang'] = $this->db->get('asal_barang')->result_array();

        $this->form_validation->set_rules('nama_asal_barang', 'Barang', 'required');
        $data = [

            'nama_asal_barang' => $this->input->post('nama_asal_barang')
        ];
        $this->db->insert('asal_barang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Asal Barang added!</div>');
        redirect('admin/asal_barang');
    }

    public function fungsi_edit_asal_barang()
    {
        $id = $this->input->post('id_asal_barang');
        $nama_asal_barang = $this->input->post('nama_asal_barang');
        $ArrUpdate = array(
            'nama_asal_barang' => $nama_asal_barang


        );
        $this->Upbmaster_model->updateAsalBarang($id, $ArrUpdate);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Asal Barang Edited!</div>');
        Redirect(base_url('admin/asal_barang'));
    }

    public function fungsi_delete_asal_barang($id)
    {
        $this->Upbmaster_model->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Asal Barang Deleted!</div>');
        Redirect(Base_url('admin/asal_barang'));
    }

    //JENIS BARANG 
    public function jenis_barang()
    {
        $this->load->model('Upbmaster_model', 'Upbmaster_model');
        $data['jenis_barang'] = $this->db->get('jenis_barang')->result_array();


        $data['jenis_barang'] = $this->Upbmaster_model->getJenisBarang();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/jenis_barang', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_jenis_barang()
    {
        $data['jenis_barang'] = $this->db->get('jenis_barang')->result_array();

        $this->form_validation->set_rules('nama_asal_barang', 'Barang', 'required');
        $data = [

            'jenis_barang' => $this->input->post('jenis_barang')
        ];
        $this->db->insert('jenis_barang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Jenis Barang added!</div>');
        redirect('admin/jenis_barang');
    }

    public function fungsi_edit_jenis_barang()
    {
        $id = $this->input->post('id_jenis_barang');
        $jenis_barang = $this->input->post('jenis_barang');
        $ArrUpdate = array(
            'jenis_barang' => $jenis_barang


        );
        $this->Upbmaster_model->updateJenisBarang($id, $ArrUpdate);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Jenis Barang Edited!</div>');
        Redirect(base_url('admin/jenis_barang'));
    }

    public function fungsi_delete_jenis_barang($id)
    {
        $this->Upbmaster_model->hapusjenisbarang($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Jenis Barang Deleted!</div>');
        Redirect(Base_url('admin/jenis_barang'));
    }

    //LANTAI
    public function lantai()
    {
        $this->load->model('Upbmaster_model', 'Upbmaster_model');
        $data['lantai'] = $this->db->get('lantai')->result_array();


        $data['lantai'] = $this->Upbmaster_model->getLantai();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/lantai', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_lantai()
    {
        $data['lantai'] = $this->db->get('lantai')->result_array();

        $this->form_validation->set_rules('lantai', 'Barang', 'required');
        $data = [

            'kode' => $this->input->post('kode'),
            'lantai' => $this->input->post('lantai')
        ];
        $this->db->insert('lantai', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Lantai added!</div>');
        redirect('admin/lantai');
    }

    public function fungsi_edit_lantai()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kode');
        $lantai = $this->input->post('lantai');
        $ArrUpdate = array(
            'kode' => $kode,
            'lantai' => $lantai


        );
        $this->Upbmaster_model->updateLantai($id, $ArrUpdate);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data Lantai Edited!</div>');
        Redirect(base_url('admin/lantai'));
    }

    public function fungsi_delete_lantai($id)
    {
        $this->Upbmaster_model->hapuslantai($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Lantai Deleted!</div>');
        Redirect(Base_url('admin/jenis_barang'));
    }

    //GOLONGAN
    public function golongan()
    {
        $this->load->model('Upbmaster_model', 'Upbmaster_model');
        $data['golongan'] = $this->db->get('golongan')->result_array();


        $data['golongan'] = $this->Upbmaster_model->getGolongan();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/golongan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_golongan()
    {
        $data['golongan'] = $this->db->get('golongan')->result_array();

        $this->form_validation->set_rules('lantai', 'Barang', 'required');
        $data = [

            'kode' => $this->input->post('kode'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->insert('golongan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Golongan added!</div>');
        redirect('admin/golongan');
    }

    public function fungsi_edit_golongan()
    {
        $id = $this->input->post('id_golongan');
        $kode = $this->input->post('kode');
        $keterangan = $this->input->post('keterangan');
        $ArrUpdate = array(
            'kode' => $kode,
            'keterangan' => $keterangan


        );
        $this->Upbmaster_model->updateGolongan($id, $ArrUpdate);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data Golongan Edited!</div>');
        Redirect(base_url('admin/golongan'));
    }

    public function fungsi_delete_golongan($id)
    {
        $this->Upbmaster_model->hapusgolongan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Golongan Deleted!</div>');
        Redirect(Base_url('admin/golongan'));
    }

    //KLASIFIKASI
    public function klasifikasi()
    {
        $this->load->model('Upbmaster_model', 'Upbmaster_model');
        $data['klasifikasi'] = $this->db->get('klasifikasi')->result_array();



        $data['golongan'] = $this->Upbmaster_model->getGolongan();


        $data['klasifikasi'] = $this->Upbmaster_model->getKlasifikasi();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/klasifikasi', $data);
        $this->load->view('templates/footer');
    }

    public function add_klasifikasi()
    {
        $data['keterangan'] = $this->db->get('klasifikasi')->result_array();
        $data = [

            'kode_klas' => $this->input->post('kode'),
            'keterangan_klas' => $this->input->post('keterangan'),
            'golongan_id' => $this->input->post('golongan_id')

        ];
        $this->db->insert('klasifikasi', $data);


        redirect('admin/klasifikasi');
    }

    public function fungsi_delete_klasifikasi($id)
    {
        $this->Upbmaster_model->hapus_klasifikasi($id);
        Redirect(Base_url('admin/klasifikasi'));
    }
}