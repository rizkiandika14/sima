<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dpengajuan_model extends CI_Model
{
    public function getPengajuanTemp($waktu, $divisi, $minggu)
    {


        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang.nama_brg, pengajuan.jumlah, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.user_id, pengajuan.divisi, pengajuan.id, pengajuan.waktu_pengajuan
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where status='proses' AND waktu_pengajuan = '$waktu' AND divisi = '$divisi' AND minggu = '$minggu'
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getDivisiTemp()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT distinct(divisi), minggu, waktu_pengajuan FROM pengajuan WHERE status='proses'
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getLaporan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT distinct(divisi), minggu, waktu_pengajuan FROM pengajuan WHERE status='disetujui'
                    ";
        return $this->db->query($query)->result_array();
    }



    function getPengajuanDetail($waktu, $divisi)
    {
        $this->db->where('waktu_pengajuan', $waktu);
        $this->db->where('divisi', $divisi);

        $query = $this->db->get('pengajuan');
        return $query->row();
    }

    public function getLaporanTemp($waktu, $divisi, $minggu)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang.nama_brg, pengajuan.validasi, pengajuan.realisasi, pengajuan.jumlah, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.user_id, pengajuan.divisi, pengajuan.id, pengajuan.waktu_pengajuan
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where status!='proses' AND waktu_pengajuan = '$waktu' AND divisi = '$divisi' AND minggu = '$minggu'
                    ";
        return $this->db->query($query)->result_array();
    }
}