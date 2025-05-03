<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Memeriksa apakah pengguna telah login
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
        // Mendapatkan role_id dari sesi
        $role_id = $this->session->userdata('role_id');

        if ($role_id == 2) {
            // Jika role_id adalah 2, arahkan ke halaman tertentu atau berikan pesan kesalahan
            redirect('home');
        }
        // Load model 'M_riwayat' untuk mengakses database
        $this->load->model('M_riwayat');
    }

    public function index()
    {
        // Ambil data like dari database
        $data['riwayat'] = $this->M_riwayat->get_riwayat();

        // Load view
        $this->load->view('admin/sidebar');
        $this->load->view('riwayat/content', $data);
    }
    public function add()
    {
        $data['foto'] = $this->M_riwayat->get_all_R();
        $data['like'] = $this->M_riwayat->get_all_RR();
        $data['komen'] = $this->M_riwayat->get_all_RRR();
        $data['users'] = $this->M_riwayat->get_all_RRRR();
        // Load view untuk menambahkan like
        $this->load->view('admin/sidebar');
        $this->load->view('riwayat/add', $data);
        $this->load->view('admin/footer');
    }
    public function add_R()
    {
        // Form submission logic for creating like
        if ($this->input->post()) {
            $data = array(
                'id_foto' => $this->input->post('id_foto'),
                'id_like' => $this->input->post('id_like'),
                'id_komen' => $this->input->post('id_komen'),
                'id_user' => $this->input->post('id_user'),
                'tgl_riwayat' => date('Y-m-d H:i:s'), // Tanggal like diisi dengan waktu sekarang
            );

            $this->M_riwayat->insertR($data);

            // Redirect or show success message
            redirect('riwayat');
        } else {
            // Load view jika form tidak disubmit
            $data['foto'] = $this->M_riwayat->get_all_R();
            $data['like'] = $this->M_riwayat->get_all_RR();
            $data['komen'] = $this->M_riwayat->get_all_RRR();
            $data['user'] = $this->M_riwayat->get_all_RRRR();
            $this->load->view('admin/sidebar');
            $this->load->view('riwayat/add', $data);
            $this->load->view('admin/footer');
        }
    }
    public function edit($id)
    {
        $data['foto'] = $this->M_riwayat->get_all_R();
        $data['like'] = $this->M_riwayat->get_all_RR();
        $data['komen'] = $this->M_riwayat->get_all_RRR();
        $data['users'] = $this->M_riwayat->get_all_RRRR();
        $data['Rwt'] = $this->M_riwayat->getRiwayatById($id);
        $this->load->view('admin/sidebar');
        $this->load->view('riwayat/edit', $data);
        $this->load->view('admin/footer');
    }

    public function update($id)
    {
        // Form submission logic for updating like
        if ($this->input->post()) {
            $data = array(
                'id_foto' => $this->input->post('id_foto'),
                'id_like' => $this->input->post('id_like'),
                'id_komen' => $this->input->post('id_komen'), 
                'id_user' => $this->input->post('id_user'),
                'tgl_riwayat' => date('Y-m-d H:i:s'), // Tanggal like diisi dengan waktu sekarang
            );

            $this->M_riwayat->updateR($id, $data);

            // Redirect or show success message
            redirect('riwayat');
        } else {
            // Load the edit view if no form submission
            $data['Rwt'] = $this->M_riwayat->getRiwayatById($id);

            if (!$data['riwayat']) {
                // Handle if like is not found
                show_404();
            }

            $this->load->view('admin/sidebar');
            $this->load->view('riwayat/edit', $data);
            $this->load->view('admin/footer');
        }
    }

    public function delete($id)
    {
        // Logic for deleting like
        $this->M_riwayat->deleteR($id);

        // Redirect or show success message
        redirect('riwayat');
    }
}
