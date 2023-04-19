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
        $query =  "SELECT golongan.keterangan, klasifikasi.golongan_id, klasifikasi.kode_klas, klasifikasi.keterangan_klas
        FROM klasifikasi 
        INNER JOIN golongan ON klasifikasi.golongan_id=golongan.id_golongan
       
                    ";
        return $this->db->query($query)->result_array();
    }

    public function hapus_klasifikasi($id_klas)
    {
        $this->db->where('id', $id_klas);
        $this->db->delete('klasifikasi');
    }
}