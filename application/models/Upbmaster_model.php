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
        $query =  "SELECT golongan.keterangan, golongan.kode_gol, klasifikasi.golongan_id, klasifikasi.id, klasifikasi.kode_klas, klasifikasi.keterangan_klas
        FROM klasifikasi 
        LEFT JOIN golongan ON klasifikasi.golongan_id=golongan.id_golongan
       
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
        $query =  "SELECT golongan.keterangan, golongan.kode_gol, klasifikasi.keterangan_klas, klasifikasi.kode_klas, klasifikasi.golongan_id, subklasifikasi.id_klasifikasi, subklasifikasi.id, subklasifikasi.kode_subklasifikasi, subklasifikasi.keterangan_subklas
         FROM subklasifikasi 
         LEFT JOIN klasifikasi ON subklasifikasi.id_klasifikasi=klasifikasi.id
         LEFT JOIN golongan ON klasifikasi.golongan_id=golongan.id_golongan
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
        $query =  "SELECT tbl_lahan.id_lahan, tbl_lahan.kode_lahan, tbl_lahan.nama_lahan, tbl_bangunan.id_bangunan, tbl_bangunan.kode_barang, tbl_bangunan.kode_bangunan, tbl_bangunan.nama_bangunan
         FROM tbl_bangunan
         LEFT JOIN tbl_lahan ON tbl_lahan.id_lahan=tbl_bangunan.id_lahan
        
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
        LEFT JOIN tbl_lahan ON tbl_bangunan.id_lahan = tbl_lahan.id_lahan 
        LEFT JOIN asal_barang ON tbl_bangunan.id_asal_barang = asal_barang.id_asal_barang where
        tbl_bangunan.id_bangunan = $id_bangunan
        ";
        return $this->db->query($query)->result_array();
    }

    function updateBangunan($id_bangunan, $data)
    {
        $this->db->where('id_bangunan', $id_bangunan);
        $this->db->update('tbl_bangunan', $data);
    }

    //RUANGAN
    public function getRuangan()
    {
        $query =  "SELECT tbl_bangunan.id_bangunan, tbl_bangunan.kode_bangunan, tbl_ruangan.id_ruangan, tbl_ruangan.kode_ruangan, tbl_ruangan.nama_ruangan, tbl_bangunan.nama_bangunan
         FROM tbl_ruangan
         left join tbl_bangunan ON tbl_bangunan.id_bangunan=tbl_ruangan.id_bangunan
        
                     ";
        return $this->db->query($query)->result_array();
    }

    public function hapusruangan($id_ruangan)
    {
        $this->db->where('id_ruangan', $id_ruangan);
        $this->db->delete('tbl_ruangan');
    }

    public function ambil_id_ruangan($id_ruangan)
    {
        $query = "SELECT tbl_ruangan.*, tbl_bangunan.nama_bangunan,  asal_barang.nama_asal_barang
        FROM tbl_ruangan 
        left join tbl_bangunan ON tbl_ruangan.id_bangunan = tbl_bangunan.id_bangunan 
        left join asal_barang ON tbl_ruangan.id_asal_barang = asal_barang.id_asal_barang where
        tbl_ruangan.id_ruangan = $id_ruangan
        ";
        return $this->db->query($query)->result_array();
    }

    public function ambil_kode_ruangan()
    {
        $query = "SELECT kode_ruangan FROM tbl_ruangan ";
        return $this->db->query($query)->result_array();
    }

    public function kode_bangunan()
    {
        $query = "SELECT tbl_ruangan.*, tbl_bangunan.kode_bangunan
        FROM tbl_ruangan 
        left join tbl_bangunan ON tbl_ruangan.id_bangunan = tbl_bangunan.id_bangunan 
        ";
        return $this->db->query($query)->result_array();
    }

    public function kode_barang()
    {
        $query = "SELECT subklasifikasi.*, klasifikasi.id AS id_klas, klasifikasi.golongan_id, klasifikasi.kode_klas, klasifikasi.keterangan_klas, golongan.id_golongan, golongan.kode_gol, golongan.keterangan
        FROM subklasifikasi
        left join klasifikasi ON klasifikasi.id = subklasifikasi.id_klasifikasi
        left join golongan ON golongan.id_golongan = klasifikasi.golongan_id
        ";
        return $this->db->query($query)->result_array();
    }

    //ASET
    public function getAset()
    {
        $query =  "SELECT *
            FROM tbl_barang
        
            ";
        return $this->db->query($query)->result_array();
    }

    public function hapusbarang($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('tbl_barang');
    }

    public function ambil_id_barang($id_barang)
    {
        $query = "SELECT tbl_barang.*, tbl_ruangan.nama_ruangan, jenis_barang.jenis_barang, asal_barang.nama_asal_barang, subklasifikasi.keterangan_subklas
        FROM tbl_barang
        left join tbl_ruangan ON tbl_ruangan.id_ruangan = tbl_barang.id_ruangan
        left join subklasifikasi ON subklasifikasi.id = tbl_barang.id_subklasifikasi
        left join jenis_barang ON tbl_barang.id_jenis_barang = jenis_barang.id_jenis_barang
        left join asal_barang ON tbl_barang.id_asal_barang = asal_barang.id_asal_barang where
        tbl_barang.id_barang = $id_barang
        ";
        return $this->db->query($query)->result_array();
    }

    public function ambil_all_barang()
    {
        $query = "SELECT tbl_barang.*, tbl_ruangan.nama_ruangan, jenis_barang.jenis_barang, asal_barang.nama_asal_barang, subklasifikasi.keterangan_subklas
        FROM tbl_barang
        left join tbl_ruangan ON tbl_ruangan.id_ruangan = tbl_barang.id_ruangan
        left join subklasifikasi ON subklasifikasi.id = tbl_barang.id_subklasifikasi
        left join jenis_barang ON tbl_barang.id_jenis_barang = jenis_barang.id_jenis_barang
        left join asal_barang ON tbl_barang.id_asal_barang = asal_barang.id_asal_barang
        ";
        return $this->db->query($query)->result_array();
    }

    public function ambil_tahun_barang($thn)
    {
        $query = "SELECT tbl_barang.*, tbl_ruangan.nama_ruangan, jenis_barang.jenis_barang, asal_barang.nama_asal_barang, subklasifikasi.keterangan_subklas
        FROM tbl_barang
        left join tbl_ruangan ON tbl_ruangan.id_ruangan = tbl_barang.id_ruangan
        left join subklasifikasi ON subklasifikasi.id = tbl_barang.id_subklasifikasi
        left join jenis_barang ON tbl_barang.id_jenis_barang = jenis_barang.id_jenis_barang
        left join asal_barang ON tbl_barang.id_asal_barang = asal_barang.id_asal_barang
        where tbl_barang.tahun_perolehan = $thn
        ";
        return $this->db->query($query)->result_array();
    }

    public function ambil_kode_bangunan($kode_bangunan)
    {
        $query = "SELECT tbl_ruangan.*, tbl_bangunan.kode_bangunan
        FROM tbl_ruangan
        left join tbl_bangunan ON tbl_ruangan.id_bangunan = tbl_bangunan.id_bangunan where
        tbl_bangunan.kode_bangunan = $kode_bangunan
        ";
        return $this->db->query($query)->result_array();
    }

    public function ambil_kode_ruangan_isi($kode_ruangan)
    {
        $query = "SELECT tbl_barang.*, tbl_ruangan.kode_ruangan, tbl_ruangan.nama_ruangan
        FROM tbl_barang
        left join tbl_ruangan ON tbl_barang.id_ruangan = tbl_ruangan.id_ruangan where
        tbl_ruangan.kode_ruangan = $kode_ruangan
        ";
        return $this->db->query($query)->result_array();
    }

    public function ambil_kode_barang($id_barang)
    {
        $query = "SELECT tbl_barang.*
        FROM tbl_barang where
        id_barang= $id_barang
        ";
        return $this->db->query($query)->result_array();
    }
}