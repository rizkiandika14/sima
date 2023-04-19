<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function dpengajuan()
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $data['nama_brg'] = $this->db->get('pengajuan')->result_array();
        $this->load->model('User_model', 'user_model');

        $data['user'] = $this->user_model->getDataUser();
        // $data['dpengajuan'] = $this->dpengajuan_model->getPengajuanTemp();
        $data['pengajuandiv'] = $this->dpengajuan_model->getDivisiTemp();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/data_pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function detpengajuan()
    {
        $this->load->model('Pengajuan_model', 'pengajuan_model');
        $data['pencarian_data'] = $this->pengajuan_model->getAll();

        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/detail_pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function datepengajuan()
    {
        $tgla = $this->input->post('tgla');
        $tglb = $this->input->post('tglb');
        $status = $this->input->post('status');
        $this->load->model('Pengajuan_model', 'pengajuan_model');
        $data['pencarian_data'] = $this->pengajuan_model->getDate($tgla, $tglb, $status);


        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/detail_pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function dtffpengajuan()
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $data['nama_brg'] = $this->db->get('pengajuan')->result_array();
        $this->load->model('User_model', 'user_model');

        $data['user'] = $this->user_model->getDataUser();
        $data['dpengajuan'] = $this->dpengajuan_model->getPengajuanTemp();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/div_pengajuan', $data);
        $this->load->view('templates/footer');
    }


    public function pengajuanDetail($waktu, $divisi, $minggu)
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $data['waktu'] = $this->dpengajuan_model->getPengajuanDetail($waktu, $divisi, $minggu);
        $data['dpengajuan'] = $this->dpengajuan_model->getPengajuanTemp($waktu, $divisi, $minggu);
        $data['divisi'] = $divisi;
        $data['minggu'] = $minggu;
        $data['tanggal'] = $waktu;

        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/div_pengajuan', $data);
        $this->load->view('templates/footer');
    }



    public function divpengajuan()
    {
        $this->load->model('Divpengajuan_model', 'divpengajuan_model');
        $data['nama_brg'] = $this->db->get('pengajuan')->result_array();
        $data['divpengajuan'] = $this->divpengajuan_model->getDivpengajuanTemp();
        $this->load->view('templates/header');
        $this->load->view('templates/divisi_sidebar');
        $this->load->view('divisi/data_pengajuan', $data);
        $this->load->view('templates/footer');
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
        $status = 'disetujui';
        $ArrUpdate = array(

            'jumlah' => $jumlah,
            'harga' => $harga,
            'satuan' => $satuan,
            'total' => $total,
            'waktu_validasi' => $waktu,
            'status' => $status,
            'realisasi' => $realisasi

        );
        $this->pengajuan_model->updatePengajuan($id, $ArrUpdate);
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

    public function diusulkan($id)
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone


        $sql = "UPDATE pengajuan SET status='diusulkan' WHERE id=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Telah Disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    public function diterima($id)
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone


        $sql = "UPDATE pengajuan SET validasi='diterima' WHERE id=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Telah Disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }
}