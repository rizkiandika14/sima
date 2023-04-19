<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    public function getBarang()
    {
        $query = "SELECT *
                    FROM barang
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getSatuan()
    {
        $query = "SELECT *
                    FROM barang_satuan ORDER BY satuan ASC
                    ";
        return $this->db->query($query)->result_array();
    }


    function getBarangDetail($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('barang');
        return $query->row();
    }
    function updateBarang($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('barang', $data);
    }

    function deleteBarang($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('barang');
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('barang');
    }

    public function hapus_temp($id)
    {
        $this->db->where('id_tmp', $id);
        $this->db->delete('barang_temp');
    }

    public function getDataBarang($postData)
    {
        $response = array();

        if (isset($postData['search'])) {
            // Select record
            $this->db->select('*');
            $this->db->where("nama_brg like '%" . $postData['search'] . "%' ");

            $records = $this->db->get('barang')->result();

            foreach ($records as $row) {
                $response[] = array("value" => $row->id, "label" => $row->namna_brg);
            }
        }

        return $response;
    }

    function search_blog($title)
    {
        $this->db->like('barang', $title, 'both');
        $this->db->order_by('barang', 'ASC');
        $this->db->limit(10);
        return $this->db->get('sima')->result();
    }
}