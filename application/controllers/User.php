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

    public function profile($id)
    {
        $this->load->model('User_model', 'user_model');
        $data['user'] = $this->user_model->getUserDetail($id);

        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
    }

    public function profile2($id)
    {
        $this->load->model('User_model', 'user_model');
        $data['user'] = $this->user_model->getUserDetail($id);

        $this->load->view('templates/header');
        $this->load->view('templates/divisi_sidebar');
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
    }

    public function profile3($id)
    {
        $this->load->model('User_model', 'user_model');
        $data['user'] = $this->user_model->getUserDetail($id);

        $this->load->view('templates/header');
        $this->load->view('templates/upb_sidebar');
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

    public function getDataUser()
    {
        $this->load->model('User_model', 'user_model');

        $data['user'] = $this->user_model->getDataUser();
        $this->load->view('templates/header');
        $this->load->view('templates/admin_sidebar');
        $this->load->view('admin/user', $data);
        $this->load->view('templates/footer');
    }

    public function active($id)
    {
        $sql = "UPDATE user SET active='Y' WHERE id=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Activated<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    public function inactive($id)
    {
        $sql = "UPDATE user SET active='N' WHERE id=$id";
        $this->db->query($sql);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User Deactivated<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    public function fungsi_edit($id)
    {
        $this->load->model('User_model', 'user_model');
        $data['user'] = $this->user_model->getUserDetail($id);
        $email = $this->input->post('email');
        $contact = $this->input->post('contact');
        $nama = $this->input->post('nama');
        $photo = $_FILES['foto_ttd']['name'];

        if ($photo) {
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/ttd/';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto_ttd')) {
                $old_image = $data['user']['foto_ttd'];
                if ($old_image != '') {
                    unlink(FCPATH . 'assets/img/ttd/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_ttd', $new_image);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">' . $this->upload->display_errors() . '</div>');
                $referred_from = $this->session->userdata('referred_from');
                redirect($referred_from, 'refresh');
            }
        }

        $this->db->set('nama', $nama);
        $this->db->set('email', $email);
        $this->db->set('contact', $contact);
        $this->db->where('id', $id);
        $this->db->update('user');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Data User Edited!</div>');
        $referred_from = $this->session->userdata('referred_from');
        redirect($referred_from, 'refresh');
    }

    public function changepassword()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/admin_sidebar');
            $this->load->view('profile/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_passwordmd5 = $this->input->post('current_password');
            $new_passwordmd5 = $this->input->post('new_password1');
            $current_password = MD5($current_passwordmd5);
            $new_password = MD5($new_passwordmd5);
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New password cannot be the same as current password!</div>');
                redirect('user/changepassword');
            } else {
                $this->db->set('password', $new_password);
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('user');


                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!</div>');
                redirect('user/changepassword');
            }
        }
    }

    public function changepassword2()
    {
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/divisi_sidebar');
            $this->load->view('profile/changepassword2', $data);
            $this->load->view('templates/footer');
        } else {
            $current_passwordmd5 = $this->input->post('current_password');
            $new_passwordmd5 = $this->input->post('new_password1');
            $current_password = MD5($current_passwordmd5);
            $new_password = MD5($new_passwordmd5);
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Wrong current password!</div>');
                redirect('user/changepassword2');
            } else if ($current_password == $new_password) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New password cannot be the same as current password!</div>');
                redirect('user/changepassword2');
            } else {
                $this->db->set('password', $new_password);
                $this->db->where('id', $this->session->userdata('id'));
                $this->db->update('user');


                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!</div>');
                redirect('user/changepassword2');
            }
        }
    }
}