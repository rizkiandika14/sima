<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upb_model extends CI_Model
{
    public function getPengajuanTemp($waktu, $divisi, $minggu)
    {


        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang.nama_brg, pengajuan.jumlah, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.user_id, pengajuan.divisi, pengajuan.id, pengajuan.waktu_pengajuan
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where status='diusulkan' AND waktu_pengajuan = '$waktu' AND divisi = '$divisi' AND minggu = '$minggu'
                    ";
        return $this->db->query($query)->result_array();
    }
    public function getDivisiTemp()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT distinct(divisi), minggu, waktu_pengajuan FROM pengajuan WHERE status='diusulkan'
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

    //PURCHASE REQUISITION
    public function getPengajuanTempPr($waktu, $divisi, $minggu)
    {


        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang.nama_brg, pengajuan.jumlah, pengajuan.realisasi, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.user_id, pengajuan.divisi, pengajuan.id, pengajuan.waktu_pengajuan
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where status='waiting approvel' AND waktu_pengajuan = '$waktu' AND divisi = '$divisi' AND minggu = '$minggu'
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getPengajuanPr($waktu, $divisi, $minggu)
    {


        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang.nama_brg, pengajuan.jumlah, pengajuan.realisasi, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.user_id, pengajuan.divisi, pengajuan.id, pengajuan.waktu_pengajuan
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where status='waiting approvel' AND waktu_pengajuan = '$waktu' AND divisi = '$divisi' AND minggu = '$minggu'
                    ";
        return $this->db->query($query)->result_array();
    }



    public function getDivisiTempPr()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT distinct(divisi), minggu, waktu_pengajuan FROM pengajuan WHERE status='waiting approvel'
                    ";
        return $this->db->query($query)->result_array();
    }


    function getPengajuanPrDetail($waktu, $divisi)
    {
        $this->db->where('waktu_pengajuan', $waktu);
        $this->db->where('divisi', $divisi);


        $query = $this->db->get('pengajuan');
        return $query->row();
    }

    //PURCHASE ORDER
    public function getPengajuanPo($waktu, $divisi, $minggu)
    {


        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang.nama_brg, pengajuan.jumlah, pengajuan.realisasi, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.user_id, pengajuan.divisi, pengajuan.id, pengajuan.waktu_pengajuan
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where status='disetujui upb' AND waktu_pengajuan = '$waktu' AND divisi = '$divisi' AND minggu = '$minggu'
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getPengajuanTempPo($waktu, $divisi, $minggu)
    {


        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT barang.nama_brg, pengajuan.jumlah, pengajuan.realisasi, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.user_id, pengajuan.divisi, pengajuan.id, pengajuan.waktu_pengajuan
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where status='disetujui upb' AND waktu_pengajuan = '$waktu' AND divisi = '$divisi' AND minggu = '$minggu'
                    ";
        return $this->db->query($query)->result_array();
    }

    function getPengajuanPoDetail($waktu, $divisi)
    {
        $this->db->where('waktu_pengajuan', $waktu);
        $this->db->where('divisi', $divisi);


        $query = $this->db->get('pengajuan');
        return $query->row();
    }

    public function getDivisiTempPo()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        $query = "SELECT distinct(divisi), minggu, waktu_pengajuan FROM pengajuan WHERE status='disetujui upb'
                    ";
        return $this->db->query($query)->result_array();
    }




    function updatePengajuan($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pengajuan', $data);
    }

    public function getAllSuratMasuk()
    {
        $query = "SELECT *
                    FROM suratmasuk
                    ";
        return $this->db->query($query)->result_array();
    }
}