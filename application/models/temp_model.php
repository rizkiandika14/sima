<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Temp_model extends CI_Model
{
    public function getBarangTemp()
    {
        $query = "SELECT 	id_tmp, barang_id, user_id,	nama_brg,	jumlah,	satuan,	harga,	total,	minggu,	divisi, SUM(total) as subtotal

                    FROM barang_temp
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getBarangTemp1()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang_temp.id_tmp, barang_temp.nama_brg, barang_temp.jumlah, barang_temp.harga, barang_temp.satuan,
barang_temp.total, user.id
FROM barang_temp JOIN user
ON barang_temp.user_id = user.id
WHERE minggu='1' AND user_id = $user_id
";
        return $this->db->query($query)->result_array();
    }

    public function getBarangTemp2()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang_temp.id_tmp, barang_temp.nama_brg, barang_temp.jumlah, barang_temp.harga, barang_temp.satuan,
barang_temp.total, user.id
FROM barang_temp JOIN user
ON barang_temp.user_id = user.id
WHERE minggu='2' AND user_id = $user_id
";
        return $this->db->query($query)->result_array();
    }

    public function getBarangTemp3()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang_temp.id_tmp, barang_temp.nama_brg, barang_temp.jumlah, barang_temp.harga, barang_temp.satuan,
barang_temp.total, user.id
FROM barang_temp JOIN user
ON barang_temp.user_id = user.id
WHERE minggu='3' AND user_id = $user_id
";
        return $this->db->query($query)->result_array();
    }
    public function getBarangTemp4()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang_temp.id_tmp, barang_temp.nama_brg, barang_temp.jumlah, barang_temp.harga, barang_temp.satuan,
barang_temp.total, user.id
FROM barang_temp JOIN user
ON barang_temp.user_id = user.id
WHERE minggu='4' AND user_id = $user_id
";
        return $this->db->query($query)->result_array();
    }
}