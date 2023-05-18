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
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            //jika ada gambar
            $photo = $_FILES['foto_ttd']['name'];

            if ($photo) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/ttd/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_ttd')) {

                    $photo = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">' . $this->upload->display_errors() . '</div>');
                    $referred_from = $this->session->userdata('referred_from');
                    redirect($referred_from, 'refresh');
                }
            }
            $password = md5($this->input->post('password'));
            $data = [
                'divisi' => htmlspecialchars($this->input->post('divisi', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'contact' => htmlspecialchars($this->input->post('contact', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'password' => $password,
                'foto_ttd' => $photo,
                'role' => 2
            ];


            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation your account has been created. Please Wait for Activation</div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'nvtzusy@gmail.com',
            'smtp_pass' => 'iqzenaqorysemzvf',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' =>  "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('nvtzusy@gmail.com', 'BAK Amikom Purwokerto');
        $this->email->to($this->input->post('email'));
        if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a
        href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
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
                    $sess_data['active'] = $ck->active;

                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['active'] == 'Y') {
                    if ($sess_data['role'] == '1') {

                        redirect('admin');
                    } elseif ($sess_data['role'] == '2') {

                        redirect('divisi');
                    } elseif ($sess_data['role'] == '3') {

                        redirect('upb');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="swal-log" data-swal-log="<?= session()->get("pesan");"></div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="swal-log" data-swal-log="<?= session()->get("pesan");"></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class=" swal-log" data-swal-log="<?= session()->get("pesan");"></div>');
                redirect('auth');
            }
        }
    }




    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/forgot_password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'active' => 'Y'])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('pesan', '<div class=" swal-log" data-swal-log="<?= session()->get("pesan");"></div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('pesan', '<div class=" swal-log" data-swal-log="<?= session()->get("pesan");"></div>');
                redirect('auth/forgot_password');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();


        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('pesan', '<div class=" swal-log" data-swal-log="<?= session()->get("pesan");"></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class=" swal-log" data-swal-log="<?= session()->get("pesan");"></div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'New Password Wajib Diisi!']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/change_password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = $this->input->post('password');
            $email = $this->session->userdata('reset_email');

            $pass = MD5($password);

            $this->db->set('password', $pass);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('pesan', '<div class=" swal-log" data-swal-log="<?= session()->get("pesan");"></div>');
            redirect('auth');
        }
    }
}