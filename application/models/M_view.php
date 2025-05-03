<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_view extends CI_Model
{

    public function check_view($id_user, $photo_id)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where('id_foto', $photo_id);
        $query = $this->db->get('tbl_view');
        return $query->num_rows() > 0;
    }

    public function add_view($id_user, $photo_id)
    {
        $data = array(
            'id_user' => $id_user,
            'id_foto' => $photo_id
        );
        $this->db->insert('tbl_view', $data);
    }
    public function count_views_by_photo_id($id_foto)
    {
        $this->db->select('COUNT(id_view) as jumlah_view');
        $this->db->where('id_foto', $id_foto);
        $query = $this->db->get('tbl_view');
        return $query->row()->jumlah_view;
    }
}
