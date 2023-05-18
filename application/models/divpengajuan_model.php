<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divpengajuan_model extends CI_Model
{
    public function getDivpengajuanTemp()
    {

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang.nama_brg, pengajuan.waktu_pengajuan, pengajuan.id, pengajuan.realisasi , pengajuan.jumlah, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.validasi,  pengajuan.keterangan, pengajuan.user_id
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where user_id = $user_id AND validasi = 'belum diterima'
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getDivpengajuan()
    {

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang.nama_brg, pengajuan.id, pengajuan.waktu_pengajuan, pengajuan.realisasi , pengajuan.jumlah, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.validasi,  pengajuan.user_id
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where user_id = $user_id AND validasi != 'belum diterima' 
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getRekap()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT distinct(waktu_pengajuan), minggu FROM pengajuan WHERE status!='proses'
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getRekapDetail($waktu, $minggu)
    {

        $query = "SELECT barang.nama_brg, pengajuan.minggu, pengajuan.id, pengajuan.waktu_pengajuan, pengajuan.realisasi , pengajuan.jumlah, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.validasi, pengajuan.user_id
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where status !='proses' AND waktu_pengajuan = '$waktu' AND minggu = '$minggu'
                    ";
        return $this->db->query($query)->result_array();
    }

    function getDetail($waktu, $minggu)
    {
        $this->db->where('waktu_pengajuan', $waktu);
        $this->db->where('minggu', $minggu);

        $query = $this->db->get('pengajuan');
        return $query->row();
    }
}