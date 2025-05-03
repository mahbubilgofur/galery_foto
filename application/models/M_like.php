<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_like extends CI_Model
{
    public function getLikes()
    {
        // Ambil data like dari tabel 'tbl_like'
        $query = $this->db->get('tbl_like');
        return $query->result();
    }

    public function getLikeById($id)
    {
        // Ambil data like berdasarkan ID dari tabel 'tbl_like'
        $query = $this->db->get_where('tbl_like', array('id_like' => $id));
        return $query->row();
    }

    public function insertLike($data)
    {
        // Insert data like ke dalam tabel 'tbl_like'
        $this->db->insert('tbl_like', $data);
    }

    public function updateLike($id, $data)
    {
        // Update data like berdasarkan ID di dalam tabel 'tbl_like'
        $this->db->where('id_like', $id);
        $this->db->update('tbl_like', $data);
    }

    public function deleteLike($id)
    {
        // Hapus data like berdasarkan ID dari tabel 'tbl_like'
        $this->db->delete('tbl_like', array('id_like' => $id));
    }

    public function hitungjumlahlike($id_foto)
    {
        $this->db->select('COUNT(id_like) as jumlah_like');
        $this->db->from('tbl_like');
        $this->db->where('id_foto', $id_foto);
        $query = $this->db->get();
        return $query->row()->jumlah_like;
    }

    public function add_like($id_foto, $id_user)
    {
        $data = array(
            'id_foto' => $id_foto,
            'id_user' => $id_user,
            'tgl_like' => date('Y-m-d H:i:s')
        );

        $this->db->insert('tbl_like', $data);
        return $this->db->insert_id();
    }

    public function remove_like($id_foto, $id_user)
    {
        $this->db->where('id_foto', $id_foto);
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_like');
    }
    public function isLiked($id_foto, $id_user)
    {
        $this->db->where('id_foto', $id_foto);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('tbl_like');

        return $query->num_rows() > 0;
    }
    public function getFotoById($id_foto)
    {
        // Gantilah ini dengan logika atau panggilan ke basis data sesuai kebutuhan Anda
        $query = $this->db->get_where('tbl_foto', array('id_foto' => $id_foto));
        return $query->row_array();
    }
    public function getLikedPhotosByIdUser($id_user)
    {
        $this->db->select('tbl_foto.*');
        $this->db->from('tbl_foto');
        $this->db->join('tbl_like', 'tbl_foto.id_foto = tbl_like.id_foto');
        $this->db->where('tbl_like.id_user', $id_user);
        return $this->db->get()->result();
    }
    public function get_all_fotos()
    {
        $query = $this->db->get('tbl_foto');
        return $query->result_array();
    }
    public function get_all_users()
    {
        $query = $this->db->get('tbl_user');
        return $query->result_array();
    }
}
