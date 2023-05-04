<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upbmaster_model extends CI_Model
{
    //ASAL BARANG
    public function getAsalBarang()
    {
        $query = "SELECT *
                    FROM asal_barang  ORDER BY nama_asal_barang ASC
                    ";
        return $this->db->query($query)->result_array();
    }

    function updateAsalBarang($id, $data)
    {
        $this->db->where('id_asal_barang', $id);
        $this->db->update('asal_barang', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id_asal_barang', $id);
        $this->db->delete('asal_barang');
    }

    //JENIS BARANG
    public function getJenisBarang()
    {
        $query = "SELECT *
                    FROM jenis_barang
                    ";
        return $this->db->query($query)->result_array();
    }

    function updateJenisBarang($id, $data)
    {
        $this->db->where('id_jenis_barang', $id);
        $this->db->update('jenis_barang', $data);
    }

    public function hapusjenisbarang($id)
    {
        $this->db->where('id_jenis_barang', $id);
        $this->db->delete('jenis_barang');
    }

    //LANTAI
    public function getLantai()
    {
        $query = "SELECT *
                    FROM lantai
                    ";
        return $this->db->query($query)->result_array();
    }

    function updateLantai($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('lantai', $data);
    }

    public function hapuslantai($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('lantai');
    }

    //GOLONGAN
    public function getGolongan()
    {
        $query = "SELECT *
                    FROM golongan ORDER BY keterangan ASC
                    ";
        return $this->db->query($query)->result_array();
    }

    function updateGolongan($id, $data)
    {
        $this->db->where('id_golongan', $id);
        $this->db->update('golongan', $data);
    }

    public function hapusgolongan($id)
    {
        $this->db->where('id_golongan', $id);
        $this->db->delete('golongan');
    }

    //KLASIFIKASI
    public function getKlasifikasi()
    {
        $query =  "SELECT golongan.keterangan, klasifikasi.golongan_id, klasifikasi.id, klasifikasi.kode_klas, klasifikasi.keterangan_klas
        FROM klasifikasi 
        INNER JOIN golongan ON klasifikasi.golongan_id=golongan.id_golongan
       
                    ";
        return $this->db->query($query)->result_array();
    }

    function updateKlasifikasi($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('klasifikasi', $data);
    }

    public function hapus_klasifikasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('klasifikasi');
    }

    //SUBKLASIFIKASI
    public function getSubKlasifikasi()
    {
        $query =  "SELECT klasifikasi.keterangan_klas, klasifikasi.kode_klas, klasifikasi.golongan_id, subklasifikasi.id_klasifikasi, subklasifikasi.id, subklasifikasi.kode_subklasifikasi, subklasifikasi.keterangan
         FROM subklasifikasi 
         INNER JOIN klasifikasi ON subklasifikasi.id_klasifikasi=klasifikasi.id
        
                     ";
        return $this->db->query($query)->result_array();
    }

    function updateSubKlasifikasi($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('subklasifikasi', $data);
    }

    public function hapus_Subklasifikasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('subklasifikasi');
    }

    //lahan
    public function ambil_id_lahan($id_lahan)
    {
        $query = "SELECT tbl_lahan.*, asal_barang.nama_asal_barang
        FROM tbl_lahan 
        left join asal_barang ON tbl_lahan.id_asal_barang = asal_barang.id_asal_barang where
        tbl_lahan.id_lahan = $id_lahan
        ";
        return $this->db->query($query)->result_array();

        // $hasil = $this->db->where('id_lahan', $id_lahan)->get('tbl_lahan');

        // if ($hasil->num_rows() > 0) {

        //     return $hasil->result();
        // } else {
        //     return false;
        // }
    }

    function updateLahan($id_lahan, $data)
    {
        $this->db->where('id_lahan', $id_lahan);
        $this->db->update('tbl_lahan', $data);
    }

    public function hapuslahan($id_lahan)
    {
        $this->db->where('id_lahan', $id_lahan);
        $this->db->delete('tbl_lahan');
    }

    public function update_data($where, $data, $table)
    {

        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function tampil_data($table)
    {

        return $this->db->get($table);
    }

    //BANGUNAN
    public function getBangunan()
    {
        $query =  "SELECT tbl_lahan.id_lahan, tbl_lahan.kode_lahan, tbl_bangunan.id_bangunan, tbl_bangunan.kode_bangunan, tbl_bangunan.nama_bangunan
         FROM tbl_bangunan
         INNER JOIN tbl_lahan ON tbl_lahan.id_lahan=tbl_bangunan.id_lahan
        
                     ";
        return $this->db->query($query)->result_array();
    }

    public function hapusbangunan($id_bangunan)
    {
        $this->db->where('id_bangunan', $id_bangunan);
        $this->db->delete('tbl_bangunan');
    }

    public function ambil_id_bangunan($id_bangunan)
    {
        $query = "SELECT tbl_bangunan.*, tbl_lahan.nama_lahan,  asal_barang.nama_asal_barang
        FROM tbl_bangunan 
        join tbl_lahan ON tbl_bangunan.id_lahan = tbl_lahan.id_lahan 
        join asal_barang ON tbl_bangunan.id_asal_barang = asal_barang.id_asal_barang where
        tbl_bangunan.id_bangunan = $id_bangunan
        ";
        return $this->db->query($query)->result_array();

        // $hasil = $this->db->where('id_lahan', $id_lahan)->get('tbl_lahan');

        // if ($hasil->num_rows() > 0) {

        //     return $hasil->result();
        // } else {
        //     return false;
        // }
    }

    function updateBangunan($id_bangunan, $data)
    {
        $this->db->where('id_bangunan', $id_bangunan);
        $this->db->update('tbl_bangunan', $data);
    }
}