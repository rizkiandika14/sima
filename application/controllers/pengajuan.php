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

    public function dtpengajuan()
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

    public function disetujui($id)
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d');

        $sql = "UPDATE pengajuan SET status='disetujui', waktu_validasi ='$now' WHERE id=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Telah Disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    public function ditolak($id)
    {
        $sql = "UPDATE pengajuan SET status='ditolak' WHERE id=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Telah Disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        Redirect(base_url('Pengajuan/dpengajuan'));
    }

    public function diusulkan($id)
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone


        $sql = "UPDATE pengajuan SET status='diusulkan' WHERE id=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Telah Disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        Redirect(base_url('Upb/pengajuan'));
    }

    public function diterima($id)
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone


        $sql = "UPDATE pengajuan SET validasi='diterima' WHERE id=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">  Data Telah Disetujui<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        Redirect(base_url('pengajuan/divpengajuan'));
    }
}