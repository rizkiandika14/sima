<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divpengajuan_model extends CI_Model
{
    public function getDivpengajuanTemp()
    {

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang.nama_brg, pengajuan.id, pengajuan.jumlah, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.validasi, pengajuan.user_id
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where user_id = $user_id
                    ";
        return $this->db->query($query)->result_array();
    }
}