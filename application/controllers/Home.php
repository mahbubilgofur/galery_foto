<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // // Memeriksa apakah pengguna telah login
        // if (!$this->session->userdata('email')) {
        //     redirect('login');
        // }

        // // Mendapatkan role_id dari sesi
        // $role_id = $this->session->userdata('role_id');

        // if ($role_id == 2) {
        //     // Jika role_id adalah 2, arahkan ke halaman tertentu atau berikan pesan kesalahan
        //     redirect('home');
        // }
        // Jika role_id adalah 1 atau jenis lain yang diizinkan, biarkan pengguna melanjutkan

        $this->load->model('M_user');
        $this->load->model('M_album');
        $this->load->model('M_foto');
        $this->load->model('M_like');
        $this->load->model('M_view');
        $this->load->model('M_komentar');
        $this->load->library('user_agent');
        $this->load->helper('url');
    }
    public function index()
    {
        $DATA['photoss'] = $this->M_foto->get_popular_photos();
        $DATA['fotos'] = $this->M_foto->get_foto_id_user();
        $DATA['data_user'] = $this->M_user->getuser();
        $DATA['albums'] = $this->M_album->getAlbums();
        $this->load->view('home/header', $DATA);
        $this->load->view('home/content', $DATA);
    }
    public function kembali()
    {
        redirect($this->agent->referrer());
    }
    public function komentar_masuk()
    {
        $this->load->view('home/header');
        $this->load->view('home/komentar_masuk');
    }

    public function profil_users($id_user)
    {
        if (!$this->session->userdata('role_id')) {
            // Redirect to the login page or handle the case if the user is not logged in
            redirect('login');
        }
        // Load model yang diperlukan
        $this->load->model('M_user');
        $this->load->model('M_foto');

        // Ambil data pengguna berdasarkan id_user
        $user_data = $this->M_user->get_user_data($id_user);

        // Ambil data foto berdasarkan id_user
        $foto_data = $this->M_foto->get_foto_data($id_user);

        // Pastikan data pengguna ditemukan
        if ($user_data) {
            // Lakukan apa yang perlu dilakukan untuk menampilkan profil pengguna
            $data['user'] = $user_data;
            $data['foto'] = $foto_data; // Jika ingin menampilkan foto pengguna juga
            $this->load->view('home/header');
            $this->load->view('home/profil_users', $data);
        } else {
            // Jika data pengguna tidak ditemukan, redirect ke halaman lain atau tampilkan pesan kesalahan
            redirect('halaman_error');
        }
    }


    public function tentang()
    {
        $this->load->view('home/header');
        $this->load->view('home/tentang');
    }
    public function foto($id_album)
    {
        $id_user = $this->session->userdata('id_user');

        // Mendapatkan role ID user dari session (jika ada)
        $role_id = $this->session->userdata('role_id');

        // Cek apakah pengguna sudah login dan memiliki role yang sesuai
        if ($id_user && ($role_id == 1 || $role_id == 2)) {
            // Cek apakah user sudah melihat foto ini sebelumnya
            $photos = $this->M_foto->getFoto_id_album($id_album);
            foreach ($photos as $photo) {
                $viewed = $this->M_view->check_view($id_user, $photo['id_foto']);

                // Jika belum melihat, tambahkan data view
                if (!$viewed) {
                    $this->M_view->add_view($id_user, $photo['id_foto']);
                }
            }
        }
        $DATA['data_user'] = $this->M_user->getuser();
        $DATA['photos'] = $this->M_foto->getFoto_id_album($id_album);
        $DATA['likes'] = array();
        $DATA['jumlah_view'] = array();
        $DATA['is_liked1'] = array();
        $DATA['role_id'] = $this->session->userdata('role_id');
        $DATA['fotos'] = array();
        $DATA['profils'] = array();
        $DATA['komentars'] = array();
        foreach ($DATA['photos'] as $photo) {
            $jumlah_like = $this->M_like->hitungjumlahlike($photo['id_foto']);
            $DATA['likes'][$photo['id_foto']] = $jumlah_like;

            $jumlah_komentar = $this->M_komentar->hitungJumlahKomentarByIdFoto($photo['id_foto']);
            $DATA['komentars'][$photo['id_foto']] = $jumlah_komentar;

            // Mendapatkan jumlah komentar untuk setiap foto
            $jumlah_view = $this->M_view->count_views_by_photo_id($photo['id_foto']);
            $DATA['jumlah_view'][$photo['id_foto']] = $jumlah_view;

            $fotos = $this->M_like->getFotoById($photo['id_foto']);
            $DATA['fotos'][$photo['id_foto']] = $fotos;

            $like = $this->is_liked1($photo['id_foto']);
            $DATA['like'][$photo['id_foto']] = $like;

            $profils = $this->M_foto->getUser_andid_foto($photo['id_foto']);
            $DATA['profils'][$photo['id_foto']] = $profils;

            $komentars = $this->M_komentar->getCommentsByFotoId($photo['id_foto']);
            $DATA['komentars'][$photo['id_foto']] = $komentars;
        }
        $this->load->view('home/header', $DATA);
        $this->load->view('home/foto', $DATA);
    }

    public function add_like1($id_foto)
    {
        // Lakukan verifikasi role_id atau kondisi lain yang diperlukan
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 1 && $role_id != 2) {
            // Tambahkan logika atau tindakan lain jika role_id tidak memenuhi syarat
            redirect('login'); // Ganti dengan URL yang sesuai
            return;
        }

        // Lakukan penambahan like
        $id_user = $this->session->userdata('id_user'); // Sesuaikan dengan cara Anda mengelola sesi login
        $this->M_like->add_like($id_foto, $id_user);

        // Redirect kembali ke halaman foto dengan id_album yang sesuai
        $id_album = $this->M_foto->getAlbumIdByPhotoId($id_foto); // Mendapatkan id_album dari id_foto
        redirect('home/foto/' . $id_album);
    }

    public function remove_like1($id_foto)
    {
        // Lakukan verifikasi role_id atau kondisi lain yang diperlukan
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 1 && $role_id != 2) {
            // Tambahkan logika atau tindakan lain jika role_id tidak memenuhi syarat
            redirect('login'); // Ganti dengan URL yang sesuai
            return;
        }

        // Lakukan penghapusan like
        $id_user = $this->session->userdata('id_user'); // Sesuaikan dengan cara Anda mengelola sesi login
        $this->M_like->remove_like($id_foto, $id_user);

        // Redirect kembali ke halaman foto dengan id_album yang sesuai
        $id_album = $this->M_foto->getAlbumIdByPhotoId($id_foto); // Mendapatkan id_album dari id_foto
        redirect('home/foto/' . $id_album);
    }

    private function is_liked1($id_foto)
    {
        $id_user = $this->session->userdata('id_user'); // Sesuaikan dengan cara Anda mengelola sesi login
        return $this->M_like->isLiked($id_foto, $id_user);
    }


    public function detail_foto($id_foto)
    {

        // Mendapatkan ID user dari session (jika ada)
        $id_user = $this->session->userdata('id_user');

        // Mendapatkan role ID user dari session (jika ada)
        $role_id = $this->session->userdata('role_id');

        // Cek apakah pengguna sudah login dan memiliki role yang sesuai
        if ($id_user && ($role_id == 1 || $role_id == 2)) {
            // Cek apakah user sudah melihat foto ini sebelumnya
            $viewed = $this->M_view->check_view($id_user, $id_foto);

            // Jika belum melihat, tambahkan data view
            if (!$viewed) {
                $this->M_view->add_view($id_user, $id_foto);
            }
        }

        $DATA['foto'] = $this->M_foto->getIdFoto($id_foto);
        $DATA['profils'] = $this->M_foto->getUser_andid_foto($id_foto);
        $DATA['fotos'] = $this->M_like->getFotoById($id_foto);
        $DATA['data_user'] = $this->M_user->getuser();
        $DATA['role_id'] = $this->session->userdata('role_id');
        $DATA['is_liked'] = $this->is_liked($id_foto);
        $DATA['komentars'] = $this->M_komentar->getCommentsByFotoId($id_foto);
        $this->load->view('home/header', $DATA);
        $this->load->view('home/detail_foto', $DATA);
    }

    public function add_komentar_foto()
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 1 && $role_id != 2) {
            // Tambahkan logika atau tindakan lain jika role_id tidak memenuhi syarat
            redirect('login'); // Ganti dengan URL yang sesuai
            return;
        }

        $id_user = $this->session->userdata('id_user');
        $isi_komentar = $this->input->post('isi_komentar');
        $tgl_komentar = date('Y-m-d H:i:s');
        $id_foto = $this->input->post('id_foto'); // Ambil id_foto dari formulir
        $id_album = $this->M_foto->getAlbumIdByPhotoId($id_foto);

        // Memastikan isi_komentar tidak kosong
        if (empty($isi_komentar)) {
            redirect('home/foto/' . $id_album);
        }

        $data = array(
            'id_foto' => $id_foto,
            'id_user' => $id_user,
            'isi_komentar' => $isi_komentar,
            'tgl_komentar' => $tgl_komentar
        );

        $this->M_komentar->add_komentar($data);


        redirect('home/foto/' . $id_album);
    }
    public function add_komentar()
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 1 && $role_id != 2) {
            // Tambahkan logika atau tindakan lain jika role_id tidak memenuhi syarat
            redirect('login'); // Ganti dengan URL yang sesuai
            return;
        }

        $id_user = $this->session->userdata('id_user');
        $isi_komentar = $this->input->post('isi_komentar');
        $tgl_komentar = date('Y-m-d H:i:s');
        $id_foto = $this->input->post('id_foto'); // Ambil id_foto dari formulir

        // Memastikan isi_komentar tidak kosong
        if (empty($isi_komentar)) {
            // Handle error, bisa menampilkan pesan kesalahan atau melakukan tindakan lain
            redirect(base_url('home/detail_foto/' . $id_foto)); // Ganti dengan redirect atau tindakan lain yang sesuai
        }

        $data = array(
            'id_foto' => $id_foto,
            'id_user' => $id_user,
            'isi_komentar' => $isi_komentar,
            'tgl_komentar' => $tgl_komentar
        );

        $this->M_komentar->add_komentar($data);

        // Redirect atau lakukan hal lain sesuai kebutuhan
        redirect(base_url('home/detail_foto/' . $id_foto));
    }
    public function hapus($id_komen)
    {

        // Dapatkan id_foto sebelum menghapus komentar
        $id_foto = $this->M_komentar->hapus_komen_id_foto($id_komen);

        // Hapus komentar
        $this->M_komentar->hapus_komen($id_komen);

        // Redirect to the appropriate photo detail page if id_foto is available
        if ($id_foto) {
            redirect('home/detail_foto/' . $id_foto);
        } else {
            // Redirect to a default page or show an error message
            redirect('home'); // Ganti dengan URL atau tindakan yang sesuai
        }
    }
    public function hapus_foto($id_komen)
    {
        // Dapatkan id_foto sebelum menghapus komentar
        $id_foto = $this->M_komentar->get_id_foto($id_komen);

        // Ambil id_album dari tabel tbl_foto
        $id_album = $this->M_foto->get_id_album_by_id_foto($id_foto);

        // Hapus komentar
        $this->M_komentar->hapus_komen($id_komen);

        // Redirect to the appropriate photo detail page if id_album is available
        if ($id_album) {
            redirect('home/foto/' . $id_album);
        } else {
            // Redirect to a default page or show an error message
            redirect('home'); // Ganti dengan URL atau tindakan yang sesuai
        }
    }



    public function add_like($id_foto)
    {
        // Lakukan verifikasi role_id atau kondisi lain yang diperlukan
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 1 && $role_id != 2) {
            // Tambahkan logika atau tindakan lain jika role_id tidak memenuhi syarat
            redirect('login'); // Ganti dengan URL yang sesuai
            return;
        }

        // Lakukan penambahan like
        $id_user = $this->session->userdata('id_user'); // Sesuaikan dengan cara Anda mengelola sesi login
        $this->M_like->add_like($id_foto, $id_user);

        // Redirect kembali ke halaman foto atau halaman lain    yang sesuai
        redirect('home/detail_foto/' . $id_foto);
    }

    // Fungsi untuk memeriksa apakah foto sudah dilike oleh pengguna
    private function is_liked($id_foto)
    {
        $id_user = $this->session->userdata('id_user'); // Sesuaikan dengan cara Anda mengelola sesi login
        return $this->M_like->isLiked($id_foto, $id_user);
    }
    public function remove_like($id_foto)
    {
        // Lakukan verifikasi role_id atau kondisi lain yang diperlukan
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 1 && $role_id != 2) {
            // Tambahkan logika atau tindakan lain jika role_id tidak memenuhi syarat
            redirect('login'); // Ganti dengan URL yang sesuai
            return;
        }

        // Lakukan penghapusan like
        $id_user = $this->session->userdata('id_user'); // Sesuaikan dengan cara Anda mengelola sesi login
        $this->M_like->remove_like($id_foto, $id_user);

        // Redirect kembali ke halaman foto atau halaman lain yang sesuai
        redirect('home/detail_foto/' . $id_foto); // Ganti dengan URL yang sesuai
    }

    public function upload_foto()
    {
        if (!$this->session->userdata('role_id')) {
            redirect('login');
        }

        $id_user = $this->session->userdata('id_user');

        $data['data_album'] = $this->M_foto->getAlbumsdanId_user();

        $this->load->view('home/header');
        $this->load->view('home/upload_foto', $data);
    }

    public function add_foto()
    {
        if ($this->input->post()) {
            if (!$this->session->userdata('role_id')) {
                redirect('login');
            }

            $config['upload_path'] = './fotos/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 1024;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('lokasi_file')) {
                $upload_data = $this->upload->data();

                // Get id_user from session
                $id_user = $this->session->userdata('id_user');

                $data = array(
                    'judul_foto' => $this->input->post('judul_foto'),
                    'deskripsi_foto' => $this->input->post('deskripsi_foto'),
                    'tgl_unggah' => date('Y-m-d H:i:s'),
                    'lokasi_file' => $upload_data['file_name'],
                    'id_album' => $this->input->post('id_album'),
                    'id_user' => $id_user, // Set id_user from session
                );
                $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
                $this->M_foto->insertFoto($data);

                redirect('home/upload_foto');
            } else {
                // $error = array('error' => $this->upload->display_errors());
                // $data['albums'] = $this->M_album->getAlbums();
                // $this->load->view('home/header');
                // $this->load->view('home/upload_album', $error);
                $this->session->set_flashdata('error', 'Gagal mengunggah gambar: ' . $this->upload->display_errors());
                redirect('home/upload_foto');
            }
        } else {
            $data['albums'] = $this->M_album->getAlbums(); // Fetch albums for the view
            $this->load->view('home/header');
            $this->load->view('home/upload_foto', $data);
        }
    }



    public function add_album()
    {
        // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('role_id')) {
            // Redirect ke halaman login atau tangani kasus jika pengguna belum login
            redirect('login');
        }

        // Dapatkan ID pengguna yang sedang login
        $id_user = $this->session->userdata('id_user');

        // Set rules for form validation
        $this->form_validation->set_rules('nama_album', 'Nama Album', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        // Logika pengiriman formulir untuk membuat album
        if ($this->form_validation->run() == TRUE) {
            // Form validation successful

            // Konfigurasi upload gambar
            $config['upload_path'] = './albums/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size'] = 1024;  // Maksimal 1 MB

            // Load library upload
            $this->load->library('upload', $config);

            // Lakukan upload gambar jika ada
            if ($this->upload->do_upload('cover')) {
                // Upload berhasil
                $upload_data = $this->upload->data();
                $cover_path = $upload_data['file_name'];

                // Data album
                $data = array(
                    'nama_album' => $this->input->post('nama_album'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'tgl_buat' => date('Y-m-d H:i:s'), // Tanggal dibuat diisi dengan waktu sekarang
                    'id_user' => $id_user, // Gunakan ID pengguna yang sedang login
                    'cover' => $cover_path // Menyimpan nama file gambar ke dalam kolom cover
                );

                $this->M_album->insertAlbum($data);

                // Redirect atau tampilkan pesan keberhasilan
                redirect('home');
            } else {
                // Upload gagal, tampilkan pesan error
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                return;
            }
        } else {
            // Form validation failed or form not submitted

            // Load views
            $this->load->view('home/header');
            $this->load->view('home/upload_album');
        }
    }



    public function profil_foto()
    {
        // Pastikan user sudah login dengan role_id tertentu
        if (!$this->session->userdata('role_id')) {
            // Redirect to the login page or handle the case if the user is not logged in
            redirect('login');
        }

        // Dapatkan id_user dari session
        $id_user = $this->session->userdata('id_user');

        // Load model M_album dan M_foto
        $this->load->model('M_foto');


        // Panggil fungsi getFotoByIdUser dari model M_foto
        $DATA['fotos'] = $this->M_foto->getFotoByIdUser($id_user);

        // Load view dengan data yang telah diambil
        $this->load->view('home/header');
        $this->load->view('home/profil', $DATA);
        $this->load->view('home/content-foto', $DATA);
    }
    public function profil_like()
    {
        // Pastikan user sudah login dengan role_id tertentu
        if (!$this->session->userdata('role_id')) {
            // Redirect to the login page or handle the case if the user is not logged in
            redirect('login');
        }

        // Dapatkan id_user dari session
        $id_user = $this->session->userdata('id_user');

        // Load model M_like
        $this->load->model('M_like');

        // Panggil fungsi getLikedPhotosByIdUser dari model M_like
        $liked_photos = $this->M_like->getLikedPhotosByIdUser($id_user);

        // Kirim data foto yang sudah di-like ke view
        $data['liked_photos'] = $liked_photos;

        // Load view dengan data yang telah diambil
        $this->load->view('home/header');
        $this->load->view('home/profil', $data);
        $this->load->view('home/content-like', $data);
    }




    public function editprofil($id_user)
    {
        // Periksa apakah id_user valid atau sesuai dengan pengguna yang sedang login
        if (!$id_user || $id_user != $this->session->userdata('id_user')) {
            // Redirect atau tampilkan pesan error jika id_user tidak valid
            redirect('home'); // Ganti dengan URL yang sesuai
        }
        // Load model
        $this->load->model('M_user');

        $data['user'] = $this->M_user->getUserById($id_user);
        $this->load->view('home/header');
        $this->load->view('home/content-edit-profil', $data);
    }


    public function update($id)
    {
        // Set aturan validasi untuk formulir
        $this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password wajib minimal 3 karakter'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        // Jalankan validasi formulir
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, muat kembali halaman edit profil dengan pesan kesalahan
            $data['user'] = $this->M_user->getUserById($id);

            if (!$data['user']) {
                // Tangani jika pengguna tidak ditemukan
                show_404();
            }

            $this->load->view('home/header');
            $this->load->view('home/content-edit-profil', $data);
        } else {
            // Konfigurasi untuk unggah gambar
            $config['upload_path'] = './users/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 1024;

            $this->load->library('upload', $config);

            // Periksa apakah file profil_image telah dikirim
            if (!empty($_FILES['profil_image']['name'])) {
                if ($this->upload->do_upload('profil_image')) {
                    $upload_data = $this->upload->data();

                    // Hapus gambar lama jika ada
                    $old_image_path = FCPATH . 'users/' . $this->input->post('old_profil_image');
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }

                    // Pindahkan gambar yang diunggah ke direktori profil pengguna dengan nama asli
                    $profil_image = $upload_data['file_name'];
                    rename($upload_data['full_path'], FCPATH . 'users/' . $profil_image);

                    // Set pesan keberhasilan setelah pembaruan data pengguna berhasil
                    $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
                } else {
                    // Jika pengunggahan gambar gagal, set pesan kesalahan dan redirect ke halaman edit profil
                    $this->session->set_flashdata('error', 'Gagal mengunggah gambar: ' . $this->upload->display_errors());
                    redirect('home/editprofil/' . $id);
                }
            }

            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );

            // Perbarui data pengguna termasuk profil_image baru jika dikirim
            $data['profil'] = isset($profil_image) ? $profil_image : $this->input->post('old_profil_image');
            $this->M_user->updateUser($id, $data);

            // Set pesan keberhasilan
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');

            // Redirect ke halaman edit profil
            redirect('home/editprofil/' . $id);
        }
    }






    public function edit_foto()
    {
        if (!$this->session->userdata('role_id')) {
            // Redirect to the login page or handle the case if the user is not logged in
            redirect('login');
        }

        // Dapatkan id_user dari session
        $id_user = $this->session->userdata('id_user');

        // Load model M_album dan M_foto
        $this->load->model('M_foto');


        // Panggil fungsi getFotoByIdUser dari model M_foto
        $DATA['fotos'] = $this->M_foto->getFotoByIdUser($id_user);
        $this->load->view('home/header');
        $this->load->view('home/content-edit-profil_foto', $DATA);
    }
    public function edit_fotos($id)
    {
        $data['foto'] = $this->M_foto->getFotoById($id);
        $this->load->view('home/header');
        $this->load->view('home/content-edit-foto-profil', $data);
    }

    public function delete_foto($id)
    {
        $this->M_foto->deleteFoto($id);

        redirect('home/edit_foto/' . $id);
    }
    public function update_fotos($id)
    {
        if ($this->input->post()) {
            if (!empty($_FILES['lokasi_file']['name'])) {
                $config['upload_path'] = './fotos/'; // Sesuaikan dengan folder tempat menyimpan gambar
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 1024;  // Maksimal 1 MB

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('lokasi_file')) {
                    $upload_data = $this->upload->data();
                    $data = array(
                        'judul_foto' => $this->input->post('judul_foto'),
                        'deskripsi_foto' => $this->input->post('deskripsi_foto'),
                        'tgl_unggah' => date('Y-m-d H:i:s'),
                        'lokasi_file' => $upload_data['file_name'],
                    );

                    $this->M_foto->updateFoto($id, $data);

                    $data['foto'] = $this->M_foto->getFotoById($id);
                    $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
                    redirect('home/edit_fotos/' . $id);
                } else {
                    // Jika upload gagal, tampilkan pesan error
                    $data['foto'] = $this->M_foto->getFotoById($id);
                    $this->session->set_flashdata('error', 'Gagal mengunggah gambar: ' . $this->upload->display_errors());
                    redirect('home/edit_fotos/' . $id);
                }
            } else {
                $data = array(
                    'judul_foto' => $this->input->post('judul_foto'),
                    'deskripsi_foto' => $this->input->post('deskripsi_foto'),
                    'tgl_unggah' => date('Y-m-d H:i:s'),
                );

                $this->M_foto->updateFoto($id, $data);

                $data['foto'] = $this->M_foto->getFotoById($id);
                $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
                redirect('home/edit_fotos/' . $id);
            }
        } else {
            $data['foto'] = $this->M_foto->getFotoById($id);

            if (!$data['foto']) {
                show_404();
            }

            $this->load->view('home/header');
            $this->load->view('home/content-edit-profil_foto', $data);
        }
    }
    // halamancari
    public function fitur_cari()
    {

        $DATA['data_user'] = $this->M_user->getuser();
        $DATA['likes'] = array();
        $DATA['jumlah_view'] = array();
        $DATA['is_liked2'] = array();
        $DATA['role_id'] = $this->session->userdata('role_id');
        $DATA['fotos'] = array();
        $DATA['profils'] = array();
        $DATA['komentars'] = array();
        $search_term = $this->input->get('search');
        $this->session->set_userdata('search_term', $search_term); // Menyimpan data pencarian ke dalam sesi
        $keywords = explode(' ', $search_term);
        $DATA['photos'] = $this->M_foto->searchFoto($keywords);


        foreach ($DATA['photos'] as $photo) {
            $jumlah_like = $this->M_like->hitungjumlahlike($photo['id_foto']);
            $DATA['likes'][$photo['id_foto']] = $jumlah_like;

            $jumlah_komentar = $this->M_komentar->hitungJumlahKomentarByIdFoto($photo['id_foto']);
            $DATA['komentars'][$photo['id_foto']] = $jumlah_komentar;

            // Mendapatkan jumlah komentar untuk setiap foto
            $jumlah_view = $this->M_view->count_views_by_photo_id($photo['id_foto']);
            $DATA['jumlah_view'][$photo['id_foto']] = $jumlah_view;

            $fotos = $this->M_like->getFotoById($photo['id_foto']);
            $DATA['fotos'][$photo['id_foto']] = $fotos;

            $like = $this->is_liked2($photo['id_foto']);
            $DATA['photos'] = $this->M_foto->searchFoto($keywords);
            $DATA['like'][$photo['id_foto']] = $like;

            $profils = $this->M_foto->getUser_andid_foto($photo['id_foto']);
            $DATA['profils'][$photo['id_foto']] = $profils;

            $komentars = $this->M_komentar->getCommentsByFotoId($photo['id_foto']);
            $DATA['komentars'][$photo['id_foto']] = $komentars;
        }

        $this->load->view('home/header', $DATA);
        $this->load->view('home/fitur-cari', $DATA);
    }
    public function add_like2($id_foto)
    {
        // Lakukan verifikasi role_id atau kondisi lain yang diperlukan
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 1 && $role_id != 2) {
            // Tambahkan logika atau tindakan lain jika role_id tidak memenuhi syarat
            redirect('login'); // Ganti dengan URL yang sesuai
            return;
        }

        // Lakukan penambahan like
        $id_user = $this->session->userdata('id_user'); // Sesuaikan dengan cara Anda mengelola sesi login
        $this->M_like->add_like($id_foto, $id_user);

        // Mendapatkan data pencarian sebelumnya dari session
        $search_term = $this->session->userdata('search_term');

        // Jika tidak ada data pencarian sebelumnya, kosongkan saja
        if (!$search_term) {
            $search_term = '';
        }

        $keywords = explode(' ', $search_term);
        $DATA['photos'] = $this->M_foto->searchFoto($keywords);

        // Redirect ke halaman pencarian dengan kata kunci yang sesuai
        redirect('home/fitur_cari?search=' . urlencode($search_term));
    }

    public function remove_like2($id_foto)
    {
        // Lakukan verifikasi role_id atau kondisi lain yang diperlukan
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 1 && $role_id != 2) {
            // Tambahkan logika atau tindakan lain jika role_id tidak memenuhi syarat
            redirect('login'); // Ganti dengan URL yang sesuai
            return;
        }

        // Lakukan penghapusan like
        $id_user = $this->session->userdata('id_user'); // Sesuaikan dengan cara Anda mengelola sesi login
        $this->M_like->remove_like($id_foto, $id_user);

        // Redirect kembali ke halaman foto dengan id_album yang sesuai
        $id_album = $this->M_foto->getAlbumIdByPhotoId($id_foto); // Mendapatkan id_album dari id_foto
        $search_term = $this->session->userdata('search_term'); // Mengambil data pencarian sebelumnya dari session
        $keywords = explode(' ', $search_term);
        $DATA['photos'] = $this->M_foto->searchFoto($keywords);

        // Redirect ke halaman pencarian dengan kata kunci yang sesuai
        redirect('home/fitur_cari?search=' . urlencode($search_term));
    }

    public function hapus_foto_cari($id_komen)
    {
        // Dapatkan id_foto sebelum menghapus komentar
        $id_foto = $this->M_komentar->get_id_foto($id_komen);

        // Hapus komentar
        $this->M_komentar->hapus_komen($id_komen);
        // Redirect kembali ke halaman foto dengan id_album yang sesuai
        $id_album = $this->M_foto->getAlbumIdByPhotoId($id_foto); // Mendapatkan id_album dari id_foto
        $search_term = $this->session->userdata('search_term'); // Mengambil data pencarian sebelumnya dari session
        $keywords = explode(' ', $search_term);
        $DATA['photos'] = $this->M_foto->searchFoto($keywords);


        if ($id_album) {
            redirect('home/fitur_cari?search=' . urlencode($search_term));
        } else {
            redirect('home/fitur_cari?search=' . urlencode($search_term));
        }
    }
    public function add_komentar_foto_cari()
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 1 && $role_id != 2) {
            // Tambahkan logika atau tindakan lain jika role_id tidak memenuhi syarat
            redirect('login'); // Ganti dengan URL yang sesuai
            return;
        }

        $id_user = $this->session->userdata('id_user');
        $isi_komentar = $this->input->post('isi_komentar');
        $tgl_komentar = date('Y-m-d H:i:s');
        $id_foto = $this->input->post('id_foto'); // Ambil id_foto dari formulir
        $id_album = $this->M_foto->getAlbumIdByPhotoId($id_foto);

        // Memastikan isi_komentar tidak kosong
        if (empty($isi_komentar)) {
            $id_album = $this->M_foto->getAlbumIdByPhotoId($id_foto); // Mendapatkan id_album dari id_foto
            $search_term = $this->session->userdata('search_term'); // Mengambil data pencarian sebelumnya dari session
            $keywords = explode(' ', $search_term);
            $DATA['photos'] = $this->M_foto->searchFoto($keywords);

            // Redirect ke halaman pencarian dengan kata kunci yang sesuai
            redirect('home/fitur_cari?search=' . urlencode($search_term));
        }

        $data = array(
            'id_foto' => $id_foto,
            'id_user' => $id_user,
            'isi_komentar' => $isi_komentar,
            'tgl_komentar' => $tgl_komentar
        );

        $this->M_komentar->add_komentar($data);


        $id_album = $this->M_foto->getAlbumIdByPhotoId($id_foto); // Mendapatkan id_album dari id_foto
        $search_term = $this->session->userdata('search_term'); // Mengambil data pencarian sebelumnya dari session
        $keywords = explode(' ', $search_term);
        $DATA['photos'] = $this->M_foto->searchFoto($keywords);

        // Redirect ke halaman pencarian dengan kata kunci yang sesuai
        redirect('home/fitur_cari?search=' . urlencode($search_term));
    }

    private function is_liked2($id_foto)
    {
        $id_user = $this->session->userdata('id_user'); // Sesuaikan dengan cara Anda mengelola sesi login
        return $this->M_like->isLiked($id_foto, $id_user);
    }
}
