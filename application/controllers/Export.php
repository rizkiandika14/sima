<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Export extends CI_Controller
{
    public function cetak_barang()
    {
        $this->load->model('Barang_model', 'barang_model');
        $data['nama_brg'] = $this->db->get('barang')->result_array();
        $data['barang'] = $this->barang_model->getBarang();

        $this->load->view('cetak/laporan_barang', $data);
    }

    public function cetak_hari($waktu, $divisi, $minggu)
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $data['waktu'] = $this->dpengajuan_model->getPengajuanDetail($waktu, $divisi, $minggu);
        $data['dpengajuan'] = $this->dpengajuan_model->getLaporanTemp($waktu, $divisi, $minggu);
        $data['divisi'] = $divisi;
        $data['minggu'] = $minggu;
        $data['tanggal'] = $waktu;

        $this->load->view('cetak/laporan_hari', $data);
    }

    public function cetak_pengajuan($waktu, $divisi, $minggu)
    {
        $this->load->model('Dpengajuan_model', 'dpengajuan_model');
        $data['waktu'] = $this->dpengajuan_model->getPengajuanDetail($waktu, $divisi, $minggu);
        $data['dpengajuan'] = $this->dpengajuan_model->getPengajuanTemp($waktu, $divisi, $minggu);
        $data['divisi'] = $divisi;
        $data['minggu'] = $minggu;
        $data['tanggal'] = $waktu;

        $this->load->view('cetak/laporan_pengajuan', $data);
    }

    public function cetak_pengajuan_upb($waktu, $divisi, $minggu)
    {
        $this->load->model('Upb_model', 'upb_model');
        $data['waktu'] = $this->upb_model->getPengajuanDetail($waktu, $divisi, $minggu);
        $data['dpengajuan'] = $this->upb_model->getPengajuanTemp($waktu, $divisi, $minggu);
        $data['divisi'] = $divisi;
        $data['minggu'] = $minggu;
        $data['tanggal'] = $waktu;

        $this->load->view('cetak/laporan_pengajuan_upb', $data);
    }

    public function cetak_purchase_requisition($waktu, $divisi, $minggu)
    {
        $this->load->model('Upb_model', 'upb_model');
        $data['waktu'] = $this->upb_model->getPengajuanDetail($waktu, $divisi, $minggu);
        $data['dpengajuanpr'] = $this->upb_model->getPengajuanTempPr($waktu, $divisi, $minggu);
        $data['divisi'] = $divisi;
        $data['minggu'] = $minggu;
        $data['tanggal'] = $waktu;

        $this->load->view('cetak/laporan_purchase_requisition', $data);
    }

    public function cetak_purchase_order($waktu, $divisi, $minggu)
    {
        $this->load->model('Upb_model', 'upb_model');
        $data['waktu'] = $this->upb_model->getPengajuanDetail($waktu, $divisi, $minggu);
        $data['dpengajuanpr'] = $this->upb_model->getPengajuanTempPo($waktu, $divisi, $minggu);
        $data['divisi'] = $divisi;
        $data['minggu'] = $minggu;
        $data['tanggal'] = $waktu;


        $this->load->view('cetak/laporan_purchase_order', $data);
    }

    // public function cetak_pengajuan_upb($waktu, $divisi, $minggu)
    // {
    //     $this->load->model('Dpengajuan_model', 'dpengajuan_model');
    //     $data['waktu'] = $this->dpengajuan_model->getPengajuanDetail($waktu, $divisi, $minggu);
    //     $data['dpengajuan'] = $this->dpengajuan_model->getPengajuanTemp($waktu, $divisi, $minggu);
    //     $data['divisi'] = $divisi;
    //     $data['minggu'] = $minggu;
    //     $data['tanggal'] = $waktu;

    //     $this->load->view('cetak/laporan_pengajuan_upb', $data);
    // }
}