<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_riwayat extends CI_Model
{
    public function get_riwayat()
    {
        // Ambil data like dari tabel 'tbl_riwayat_aktivitas'
        $query = $this->db->get('tbl_riwayat_aktivitas');
        return $query->result();
    }

    public function insertR($data)
    {
        // Insert data like ke dalam tabel 'tbl_riwayat_aktivitas'
        $this->db->insert('tbl_riwayat_aktivitas', $data);
    }
    public function getRiwayatById($id)
    {
        // Ambil data like berdasarkan ID dari tabel 'tbl_like'
        $query = $this->db->get_where('tbl_riwayat_aktivitas', array('id_aksi' => $id));
        return $query->row();
    }

    public function updateR($id, $data)
    {
        // Update data like berdasarkan ID di dalam tabel 'tbl_riwayat_aktivitas'
        $this->db->where('id_aksi', $id);
        $this->db->update('tbl_riwayat_aktivitas', $data);
    }

    public function deleteR($id)
    {
        // Hapus data like berdasarkan ID dari tabel 'tbl_riwayat_aktivitas'
        $this->db->delete('tbl_riwayat_aktivitas', array('id_aksi' => $id));
    }

    public function get_all_R()
    {
        $query = $this->db->get('tbl_foto');
        return $query->result_array();
    }
    public function get_all_RR()
    {
        $query = $this->db->get('tbl_like');
        return $query->result_array();
    }
    public function get_all_RRR()
    {
        $query = $this->db->get('tbl_komentar');
        return $query->result_array();
    }
    public function get_all_RRRR()
    {
        $query = $this->db->get('tbl_user');
        return $query->result_array();
    }
}
