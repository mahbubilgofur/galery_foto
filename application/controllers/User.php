<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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

        $this->load->model('M_user');
    }
    public function index()
    {
        $user = $this->M_user->getuser();
        $DATA = array('data_user' => $user);

        $this->load->view('admin/sidebar');
        $this->load->view('user/content', $DATA);
    }

    public function add()
    {
        $this->load->view('admin/sidebar');
        $this->load->view('user/add');
        $this->load->view('admin/footer');
    }

    public function add_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password wajib minimal 3 karakter'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
            'is_unique' => 'Email sudah digunakan'
        ]);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        // Form validation
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, load view with validation errors
            $this->load->view('admin/sidebar');
            $this->load->view('user/add');
            $this->load->view('admin/footer');
        } else {
            // Form submission logic for creating user
            $config['upload_path'] = './users/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 1024;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('profil_image')) {
                $upload_data = $this->upload->data();
                $profil_image = $upload_data['file_name'];
            } else {
                $profil_image = 'default.jpg'; // Nama default jika upload gagal
            }

            $data = array(
                'username' => $this->input->post('username'),
                'password' =>  $this->input->post('password'),
                'email' => $this->input->post('email'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'alamat' => $this->input->post('alamat'),
                'role_id' => 2,
                'profil' => $profil_image, // Nama file gambar profil
            );

            // Insert user data
            $this->M_user->insert_user($data);

            // Get the inserted user's ID
            $user_id = $this->db->insert_id();

            // Copy default image to user's profile directory
            $default_image_path = FCPATH . 'img/user.jpg';
            $user_image_path = FCPATH . 'users/' . $user_id . '_' . date('Ymd') . '.jpg';
            copy($default_image_path, $user_image_path);

            // Update the 'profil' column with the new image name
            $this->db->set('profil', $user_id . '_' . date('Ymd') . '.jpg');
            $this->db->where('id_user', $user_id);
            $this->db->update('tbl_user');

            // Redirect or show success message
            redirect('user');
        }
    }




    public function edit($id)
    {
        $data['user'] = $this->M_user->getUserById($id);
        $this->load->view('admin/sidebar');
        $this->load->view('user/edit', $data);
        $this->load->view('admin/footer');
    }
    public function update($id)
    {
        // Set rules and custom error messages
        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password wajib minimal 3 karakter'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'is_unique' => 'Email sudah digunakan'
        ]);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        // Form validation
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, load view with validation errors
            $data['user'] = $this->M_user->getUserById($id);
            $this->load->view('admin/sidebar');
            $this->load->view('user/edit', $data);
            $this->load->view('admin/footer');
        } else {
            // Form submission logic for updating user
            $config['upload_path'] = './users/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 1024;

            $this->load->library('upload', $config);

            // Check if the profil_image file is submitted
            if (!empty($_FILES['profil_image']['name'])) {
                if ($this->upload->do_upload('profil_image')) {
                    $upload_data = $this->upload->data();

                    // Delete the old image if it exists
                    $old_image_path = FCPATH . 'users/' . $this->input->post('old_profil_image');
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }

                    // Move the uploaded image to the user's profile directory with the original name
                    $profil_image = $upload_data['file_name'];
                    rename($upload_data['full_path'], FCPATH . 'users/' . $profil_image);
                } else {
                    // Jika upload gambar gagal, set pesan error dan kembali ke halaman edit profil
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('user/edit/' . $id);
                }
            }

            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'alamat' => $this->input->post('alamat'),
                'role_id' => $this->input->post('role_id'),
            );

            // Update user data including the new profil_image if submitted
            $data['profil'] = isset($profil_image) ? $profil_image : $this->input->post('old_profil_image');
            $this->M_user->updateUser($id, $data);

            // Redirect or show success message
            redirect('user');
        }
    }



    public function delete($id)
    {
        // Logic for deleting user
        $this->M_user->deleteUser($id);

        // Redirect or show success message
        redirect('user');
    }
}
