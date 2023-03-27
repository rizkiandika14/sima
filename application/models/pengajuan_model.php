<?php
class Pengajuan_model extends CI_Model
{
    public function add_pengajuan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d');



        $query = "INSERT INTO pengajuan (barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, waktu_pengajuan) select barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, '$now' 
                    from barang_temp 
                    where user_id = $user_id AND minggu = 1
                    ";
        // $query2 = "DELETE FROM barang_temp where user_id = $user_id";

        $this->db->query($query);


        // $this->db->delete($query2);
    }

    public function delete_pengajuan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');

        $query = "DELETE FROM barang_temp where user_id = $user_id
                    ";
        // $query2 = "DELETE FROM barang_temp where user_id = $user_id";

        $this->db->query($query);
    }

    public function set_pengajuan()
    {
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d');

        $data = [
            'waktu_pengajuan' => $this->input->post($now),
            'status' => $this->input->post('proses')
        ];

        $this->db->insert($data);
    }

    public function add_pengajuan2()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d');



        $query = "INSERT INTO pengajuan (barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, waktu_pengajuan) select barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, '$now' 
                    from barang_temp 
                    where user_id = $user_id AND minggu = 2
                    ";
        // $query2 = "DELETE FROM barang_temp where user_id = $user_id";

        $this->db->query($query);

        // $this->db->delete($query2);
    }
    public function add_pengajuan3()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d');



        $query = "INSERT INTO pengajuan (barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, waktu_pengajuan) select barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, '$now' 
                    from barang_temp 
                    where user_id = $user_id AND minggu = 3
                    ";
        // $query2 = "DELETE FROM barang_temp where user_id = $user_id";

        $this->db->query($query);

        // $this->db->delete($query2);
    }
    public function add_pengajuan4()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d');



        $query = "INSERT INTO pengajuan (barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, waktu_pengajuan) select barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, '$now' 
                    from barang_temp 
                    where user_id = $user_id AND minggu = 4
                    ";
        // $query2 = "DELETE FROM barang_temp where user_id = $user_id";

        $this->db->query($query);

        // $this->db->delete($query2);
    }

    function updatePengajuan($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pengajuan', $data);
    }
}