<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
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

        // Load model 'M_komentar' untuk mengakses database
        $this->load->model('M_komentar');
    }

    public function index()
    {
        // Ambil data komentar dari database
        $data['komentars'] = $this->M_komentar->getKomentars();

        // Load view
        $this->load->view('admin/sidebar');
        $this->load->view('komentar/content', $data);
    }

    public function add()
    {
        $data['fotos'] = $this->M_komentar->get_all_fotos();
        $data['users'] = $this->M_komentar->get_all_users();
        // Load view untuk menambahkan komentar
        $this->load->view('admin/sidebar');
        $this->load->view('komentar/add');
        $this->load->view('admin/footer');
    }

    public function add_komentar()
    {
        // Form submission logic for creating komentar
        if ($this->input->post()) {
            $data = array(
                'id_foto' => $this->input->post('id_foto'),
                'id_user' => $this->input->post('id_user'),
                'isi_komentar' => $this->input->post('isi_komentar'),
                'tgl_komentar' => date('Y-m-d H:i:s'), // Tanggal komentar diisi dengan waktu sekarang
            );

            $this->M_komentar->insertKomentar($data);

            // Redirect or show success message
            redirect('komentar');
        } else {
            // Load view jika form tidak disubmit
            $this->load->view('admin/sidebar');
            $this->load->view('komentar/add');
            $this->load->view('admin/footer');
        }
    }

    public function edit($id)
    {
        $data['fotos'] = $this->M_komentar->get_all_fotos();
        $data['users'] = $this->M_komentar->get_all_users();
        $data['komentar'] = $this->M_komentar->getKomentarById($id);
        $this->load->view('admin/sidebar');
        $this->load->view('komentar/edit', $data);
        $this->load->view('admin/footer');
    }

    public function update($id)
    {
        // Form submission logic for updating komentar
        if ($this->input->post()) {
            $data = array(
                'id_foto' => $this->input->post('id_foto'),
                'id_user' => $this->input->post('id_user'),
                'isi_komentar' => $this->input->post('isi_komentar'),
                'tgl_komentar' => date('Y-m-d H:i:s'), // Tanggal komentar diisi dengan waktu sekarang
            );

            $this->M_komentar->updateKomentar($id, $data);

            // Redirect or show success message
            redirect('komentar');
        } else {
            // Load the edit view if no form submission
            $data['komentar'] = $this->M_komentar->getKomentarById($id);

            if (!$data['komentar']) {
                // Handle if komentar is not found
                show_404();
            }

            $this->load->view('admin/sidebar');
            $this->load->view('komentar/edit', $data);
            $this->load->view('admin/footer');
        }
    }

    public function delete($id)
    {
        // Logic for deleting komentar
        $this->M_komentar->deleteKomentar($id);

        // Redirect or show success message
        redirect('komentar');
    }
}
