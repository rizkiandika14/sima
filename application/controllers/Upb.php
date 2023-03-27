<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upb extends CI_Controller
{

    public function pengajuan()
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $data['nama_brg'] = $this->db->get('pengajuan')->result_array();
        $this->load->model('User_model', 'user_model');

        $data['user'] = $this->user_model->getDataUser();
        // $data['dpengajuan'] = $this->dpengajuan_model->getPengajuanTemp();
        $data['pengajuandiv'] = $this->dpengajuan_model->getDivisiTemp();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('upb/pengajuan', $data);
        $this->load->view('templates/footer');
    }
}