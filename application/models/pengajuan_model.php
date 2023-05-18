<?php
class Pengajuan_model extends CI_Model
{
    public function add_pengajuan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user_id = $this->session->userdata('id');
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d');



        $query = "INSERT INTO pengajuan (barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, waktu_pengajuan, deskripsi) select barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi,  '$now',deskripsi
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



        $query = "INSERT INTO pengajuan (barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, waktu_pengajuan, deskripsi) select barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, '$now', deskripsi
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



        $query = "INSERT INTO pengajuan (barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, waktu_pengajuan, deskripsi) select barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, '$now',deskripsi 
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



        $query = "INSERT INTO pengajuan (barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, waktu_pengajuan, deskripsi) select barang_id, user_id, jumlah, satuan, harga, total, minggu, divisi, '$now',deskripsi 
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

    public function getAll()
    {
        $query = "SELECT barang.nama_brg, pengajuan.waktu_pengajuan, pengajuan.id, pengajuan.realisasi , pengajuan.jumlah, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.validasi, pengajuan.user_id
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where status != 'proses'
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getDate($tgla, $tglb, $status)
    {
        $query = "SELECT barang.nama_brg, pengajuan.waktu_pengajuan, pengajuan.id, pengajuan.realisasi , pengajuan.jumlah, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.validasi, pengajuan.user_id
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where waktu_pengajuan BETWEEN '$tgla' AND '$tglb' AND status = '$status'
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getAllBarang()
    {
        $query = "SELECT barang.nama_brg, pengajuan.divisi, pengajuan.waktu_pengajuan, pengajuan.id, pengajuan.realisasi , pengajuan.jumlah, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.validasi, pengajuan.user_id
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where status = 'disetujui'
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getDateBarang($tgla, $tglb, $nama_brg, $divisi)
    {
        $query = "SELECT barang.nama_brg, pengajuan.divisi, pengajuan.waktu_pengajuan, pengajuan.id, pengajuan.realisasi , pengajuan.jumlah, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.validasi, pengajuan.user_id
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where waktu_pengajuan BETWEEN '$tgla' AND '$tglb' AND nama_brg = '$nama_brg' AND divisi = '$divisi'
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getjumlahBarang($tgla, $tglb, $nama_brg, $divisi)
    {
        $query = "SELECT sum(pengajuan.jumlah) as totalp, barang.nama_brg, pengajuan.divisi, pengajuan.waktu_pengajuan, pengajuan.id, pengajuan.realisasi , pengajuan.jumlah, pengajuan.satuan, pengajuan.harga, pengajuan.total, pengajuan.status, pengajuan.waktu_validasi, pengajuan.validasi, pengajuan.user_id
        FROM pengajuan
        INNER JOIN barang ON pengajuan.barang_id=barang.id
        where waktu_pengajuan BETWEEN '$tgla' AND '$tglb' AND nama_brg = '$nama_brg' AND divisi = '$divisi'
                    ";
        return $this->db->query($query)->result_array();
    }
}