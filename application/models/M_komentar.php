<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_komentar extends CI_Model
{
    public function get_id_foto($id_komen)
    {
        // Query untuk mengambil id_foto berdasarkan $id_komen dari tabel komentar
        $this->db->select('id_foto');
        $this->db->where('id_komen', $id_komen);
        $query = $this->db->get('tbl_komentar');

        // Jika query mengembalikan hasil
        if ($query->num_rows() > 0) {
            // Ambil id_foto dari hasil query
            $result = $query->row();
            return $result->id_foto;
        } else {
            // Jika tidak ada hasil, kembalikan false
            return false;
        }
    }
    public function getKomentars()
    {
        // Ambil semua data dari tabel tbl_komentar
        return $this->db->get('tbl_komentar')->result();
    }

    public function insertKomentar($data)
    {
        // Masukkan data ke dalam tabel tbl_komentar
        return $this->db->insert('tbl_komentar', $data);
    }

    public function getKomentarById($id)
    {
        // Ambil data komentar berdasarkan ID
        return $this->db->get_where('tbl_komentar', array('id_komen' => $id))->row();
    }

    public function updateKomentar($id, $data)
    {
        // Update data komentar berdasarkan ID
        $this->db->where('id_komen', $id);
        return $this->db->update('tbl_komentar', $data);
    }

    public function deleteKomentar($id)
    {
        // Hapus data komentar berdasarkan ID
        return $this->db->delete('tbl_komentar', array('id_komen' => $id));
    }

    public function hapus_komen_id_foto($id_komen)
    {
        $result = $this->db->select('id_foto')->get_where('tbl_komentar', array('id_komen' => $id_komen))->row();
        return $result ? $result->id_foto : null;
    }
    public function hapus_komen($id_komen)
    {
        $this->db->where('id_komen', $id_komen);
        return $this->db->delete('tbl_komentar');
    }

    public function add_komentar($data)
    {
        $this->db->insert('tbl_komentar', $data);
    }

    public function getCommentsByFotoId($id_foto)
    {
        $this->db->select('tbl_komentar.*, tbl_user.username, tbl_user.profil');
        $this->db->from('tbl_komentar');
        $this->db->join('tbl_user', 'tbl_komentar.id_user = tbl_user.id_user');
        $this->db->where('tbl_komentar.id_foto', $id_foto);
        // $this->db->order_by('tbl_komentar.tgl_komentar', 'asc');
        $this->db->order_by('tbl_komentar.tgl_komentar', 'desc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function add_komentars($id_foto, $id_user)
    {
        $data = array(
            'id_foto' => $id_foto,
            'id_user' => $id_user,
            'tgl_komentar' => date('Y-m-d H:i:s')
        );

        $this->db->insert('tbl_like', $data);
        return $this->db->insert_id();
    }
    public function hitungJumlahKomentarByIdFoto($id_foto)
    {
        $this->db->select('COUNT(id_komen) as jumlah_komentar');
        $this->db->from('tbl_komentar');
        $this->db->where('id_foto', $id_foto);
        $query = $this->db->get();
        return $query->row()->jumlah_komentar;
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
