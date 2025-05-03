<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Like extends CI_Controller
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
        // Load model 'M_like' untuk mengakses database
        $this->load->model('M_like');
    }

    public function index()
    {
        // Ambil data like dari database
        $data['likes'] = $this->M_like->getLikes();

        // Load view
        $this->load->view('admin/sidebar');
        $this->load->view('like/content', $data);
    }

    public function add()
    {
        $data['fotos'] = $this->M_like->get_all_fotos();
        $data['users'] = $this->M_like->get_all_users();
        // Load view untuk menambahkan like
        $this->load->view('admin/sidebar');
        $this->load->view('like/add');
        $this->load->view('admin/footer');
    }

    public function add_like()
    {
        // Form submission logic for creating like
        if ($this->input->post()) {
            $data = array(
                'id_foto' => $this->input->post('id_foto'),
                'id_user' => $this->input->post('id_user'),
                'tgl_like' => date('Y-m-d H:i:s'), // Tanggal like diisi dengan waktu sekarang
            );

            $this->M_like->insertLike($data);

            // Redirect or show success message
            redirect('like');
        } else {
            // Load view jika form tidak disubmit
            $this->load->view('admin/sidebar');
            $this->load->view('like/add');
            $this->load->view('admin/footer');
        }
    }

    public function edit($id)
    {
        $data['fotos'] = $this->M_like->get_all_fotos();
        $data['users'] = $this->M_like->get_all_users();
        $data['like'] = $this->M_like->getLikeById($id);
        $this->load->view('admin/sidebar');
        $this->load->view('like/edit', $data);
        $this->load->view('admin/footer');
    }

    public function update($id)
    {
        // Form submission logic for updating like
        if ($this->input->post()) {
            $data = array(
                'id_foto' => $this->input->post('id_foto'),
                'id_user' => $this->input->post('id_user'),
                'tgl_like' => date('Y-m-d H:i:s'), // Tanggal like diisi dengan waktu sekarang
            );

            $this->M_like->updateLike($id, $data);

            // Redirect or show success message
            redirect('like');
        } else {
            // Load the edit view if no form submission
            $data['like'] = $this->M_like->getLikeById($id);

            if (!$data['like']) {
                // Handle if like is not found
                show_404();
            }

            $this->load->view('admin/sidebar');
            $this->load->view('like/edit', $data);
            $this->load->view('admin/footer');
        }
    }

    public function delete($id)
    {
        // Logic for deleting like
        $this->M_like->deleteLike($id);

        // Redirect or show success message
        redirect('like');
    }
}
