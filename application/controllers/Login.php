<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('M_user');
    }

    public function index()
    {
        // Validasi form
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // Jika validasi form berhasil
        if ($this->form_validation->run() == true) {
            // Lanjutkan dengan proses login
            $this->_login();
        } else {
            // Validasi form gagal, tampilkan kembali halaman login
            $this->load->view('login');
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->M_user->get_user_by_email($email);

        if ($user) {
            if ($password === $user->password) {
                $data = [
                    'email' => $user->email,
                    'role_id' => $user->role_id,
                    'username' => $user->username,
                    'profil' => $user->profil,
                    'id_user' => $user->id_user // Tambahkan kolom 'id'
                ];
                $this->session->set_userdata($data);

                if ($user->role_id == 1) {
                    redirect(base_url('admin')); // Redirect ke /admin jika role_id adalah 1 (admin)
                } elseif ($user->role_id == 2) {
                    redirect(base_url('home')); // Redirect ke /home jika role_id adalah 2 (user)
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect(base_url('login'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar</div>');
            redirect(base_url('login'));
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password wajib minimal 3 karakter'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('register');
        } else {
            $password = htmlspecialchars($this->input->post('password', true)); // Mengambil password dari inputan form
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => $password,
                'email' =>  htmlspecialchars($this->input->post('email', true)),
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'role_id' => 2,
                'profil' => 'img/user.jpg' // Default image path
            ];

            $this->db->insert('tbl_user', $data);

            if ($this->db->affected_rows() > 0) {
                $user_id = $this->db->insert_id();
                $current_date = date('Ymd');
                $new_image_name = $user_id . '_' . $current_date . '.jpg';

                // Move the default image to the users directory with the new name
                $default_image_path = FCPATH . 'img/user.jpg';
                $user_image_path = FCPATH . 'users/' . $new_image_name;
                copy($default_image_path, $user_image_path);

                // Update the 'profil' column with the new image name
                $this->db->set('profil', $new_image_name);
                $this->db->where('id_user', $user_id);
                $this->db->update('tbl_user');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Berhasil register
                </div>');
                redirect(base_url('login'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Gagal register
                </div>');
                redirect(base_url('register'));
            }
        }
    }

    public function logout()
    {
        // Periksa role_id sebelum melakukan pengalihan
        $role_id = $this->session->userdata('role_id');

        // Hapus data sesi
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        // Set pesan sesuai dengan role_id
        if ($role_id == 1 || $role_id == 2) {
            $message = '<div class="alert alert-success" role="alert">Anda berhasil logout</div>';
            $redirect_url = base_url('login');
        } else {
            // Handle kasus lain jika diperlukan
            $message = '<div class="alert alert-success" role="alert">Anda berhasil logout</div>';
            $redirect_url = base_url('login'); // Atur pengalihan default
        }

        // Set pesan flashdata dan redirect
        $this->session->set_flashdata('message', $message);
        redirect($redirect_url);
    }
}
