<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUser()
    {
        $this->session->userdata('username');
        $query = "SELECT id, divisi
                    FROM user
                    WHERE username= 'username'
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getDataUser()
    {
        $query = "SELECT *
                    FROM user
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getUserDetail($id)
    {

        $query = "SELECT *
                    FROM user
                    WHERE id= '$id'
                    ";
        return $this->db->query($query)->result_array();
    }

    function updateUser($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function getJabatan()
    {
        $query = "SELECT *
                    FROM jabatan
                    ";
        return $this->db->query($query)->result_array();
    }
}