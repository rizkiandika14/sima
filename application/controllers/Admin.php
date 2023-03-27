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
            'nama_brg' => $this->input->post('nama_brg'),
            'stok' => $this->input->post('stok')
        ];
        $this->db->insert('barang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang added!</div>');
        redirect('admin/barang');
    }

    public function fungsi_edit()
    {
        $id = $this->input->post('id');
        $nama_brg = $this->input->post('nama_brg');
        $stok = $this->input->post('stok');
        $ArrUpdate = array(
            'nama_brg' => $nama_brg,
            'stok' => $stok
        );
        $this->barang_model->updateBarang($id, $ArrUpdate);
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Barang Edited!</div>');
        Redirect(base_url('admin/barang'));
    }

    public function fungsi_edit_pengajuan()
    {
        $id = $this->input->post('id');

        $jumlah = $this->input->post('jumlah');
        $harga = $this->input->post('harga');
        $satuan = $this->input->post('satuan');
        $total = $this->input->post('total');
        $ArrUpdate = array(

            'jumlah' => $jumlah,
            'harga' => $harga,
            'satuan' => $satuan,
            'total' => $total

        );
        $this->pengajuan_model->updatePengajuan($id, $ArrUpdate);
        // Redirect('admin', 'refresh');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
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

    public function laporan()
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $data['nama_brg'] = $this->db->get('pengajuan')->result_array();
        $this->load->model('User_model', 'user_model');

        $data['user'] = $this->user_model->getDataUser();
        // $data['dpengajuan'] = $this->dpengajuan_model->getPengajuanTemp();
        $data['pengajuandiv'] = $this->dpengajuan_model->getDivisiTemp();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('laporan/laporan', $data);
        $this->load->view('templates/footer');
    }
}