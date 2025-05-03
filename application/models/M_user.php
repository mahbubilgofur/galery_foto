<?php

class M_user extends CI_Model
{

    public function getuser()
    {
        // Ambil data user dari tabel, sesuaikan dengan struktur tabel di database Anda
        $query = $this->db->get('tbl_user');
        return $query->result();
    }

    public function insert_user($data)
    {
        // Masukkan data user ke dalam tabel, sesuaikan dengan struktur tabel di database Anda
        $this->db->insert('tbl_user', $data);
    }

    public function getUserById($id)
    {
        // Ambil data user berdasarkan ID, sesuaikan dengan struktur tabel di database Anda
        $query = $this->db->get_where('tbl_user', array('id_user' => $id));
        return $query->row();
    }

    public function updateUser($id, $data)
    {
        // Perbarui data user berdasarkan ID, sesuaikan dengan struktur tabel di database Anda
        $this->db->where('id_user', $id);
        $this->db->update('tbl_user', $data);
    }

    public function deleteUser($id)
    {
        // Hapus data user berdasarkan ID, sesuaikan dengan struktur tabel di database Anda
        $this->db->where('id_user', $id);
        $this->db->delete('tbl_user');
    }
    public function get_user_by_email($email)
    {
        $query = $this->db->get_where('tbl_user', array('email' => $email));
        return $query->row();
    }
    public function get_data_user($id_user)
    {
        $query = $this->db->get_where('tbl_user', array('id_user' => $id_user));
        return $query->row();
    }

    public function updateUserProfile($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('tbl_user', $data);
    }
    public function getStoredPasswordHash($user_id)
    {
        // Gantilah 'users' dengan nama tabel sesuai struktur database Anda
        $this->db->select('password');
        $this->db->where('id_user', $user_id);
        $query = $this->db->get('tbl_user');

        if ($query->num_rows() == 1) {
            $user = $query->row();
            return $user->password;
        }

        return false;
    }
    public function get_user_data($id_user)
    {
        // Query database untuk mendapatkan data pengguna berdasarkan id_user
        $query = $this->db->get_where('tbl_user', array('id_user' => $id_user));

        // Return data pengguna jika ditemukan
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return false; // Return false jika data tidak ditemukan
        }
    }
}
