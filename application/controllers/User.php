<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $this->load->model('User_model', 'user_model');
        // $data['username'] = $this->db->get('user')->result_array();


        // $data['user'] = $this->user_model->getUser();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
    }

    public function getUser()
    {
        $this->load->model('User_model', 'user_model');
        $data['nama_brg'] = $this->db->get('pengajuan')->result_array();

        $data['user'] = $this->user_model->getDataUser();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('', $data);
        $this->load->view('templates/footer');
    }
}