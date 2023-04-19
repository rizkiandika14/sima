<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset_model extends CI_Model
{
    public function getAset()
    {
        $query = "SELECT *
                    FROM aset
                    ";
        return $this->db->query($query)->result_array();
    }

    function updateAset($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('aset', $data);
    }

    public function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('aset');
    }
}