<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_album extends CI_Model
{
    public function getAlbums()
    {
        // Ambil data album dari tabel, sesuaikan dengan struktur tabel di database Anda
        $this->db->order_by('tgl_buat', 'desc');
        $query = $this->db->get('tbl_album');
        return $query->result();
    }

    public function insertAlbum($data)
    {
        // Masukkan data album ke dalam tabel, sesuaikan dengan struktur tabel di database Anda
        $this->db->insert('tbl_album', $data);
    }

    public function getAlbumById($id)
    {
        // Ambil data album berdasarkan ID, sesuaikan dengan struktur tabel di database Anda
        $query = $this->db->get_where('tbl_album', array('id_album' => $id));
        return $query->row();
    }

    public function updateAlbum($id, $data)
    {
        // Perbarui data album berdasarkan ID, sesuaikan dengan struktur tabel di database Anda
        $this->db->where('id_album', $id);
        $this->db->update('tbl_album', $data);
    }

    public function deleteAlbum($id)
    {
        // Hapus data album berdasarkan ID, sesuaikan dengan struktur tabel di database Anda
        $this->db->where('id_album', $id);
        $this->db->delete('tbl_album');
    }
    public function getIdalbumadnduser()
    {
        $query = $this->db->get('tbl_album');
        return $query->result();
    }
}
