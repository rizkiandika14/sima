<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/auth_header');
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
    }
    public function register()
    {
        $this->form_validation->set_rules('divisi', 'Divisi', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This Email has already registered.'
        ]);
        $this->form_validation->set_rules('contact', 'Contact', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $password = md5($this->input->post('password'));
            $data = [
                'divisi' => htmlspecialchars($this->input->post('divisi', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'contact' => htmlspecialchars($this->input->post('contact', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => $password,
                'role' => 2
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation your account has been created. Please Login</div>');
            redirect('auth');
        }
    }


    public function proses_login()
    {

        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username Wajib Diisi!']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password Wajib Diisi!']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);

            $cek = $this->login_model->cek_login($user, $pass);

            if ($cek->num_rows() > 0) {

                foreach ($cek->result() as $ck) {
                    $sess_data['username'] = $ck->username;
                    $sess_data['email'] = $ck->email;
                    $sess_data['role'] = $ck->role;
                    $sess_data['id'] = $ck->id;

                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['role'] == '1') {

                    redirect('admin');
                } elseif ($sess_data['role'] == '2') {

                    redirect('divisi');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="swal-log" data-swal-log="<?= session()->get("pesan");?>
</div>');


redirect('auth');
}
} else {
$this->session->set_flashdata('pesan', '<div class="swal-log" data-swal-log="<?= session()->get("pesan");?></div>');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}