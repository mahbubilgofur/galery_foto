<div class="profil-cnt">
    <div class="top-profil">
        <?php
        // Ambil data pengguna dari sesi
        $user_id = $this->session->userdata('id_user');
        $user_data = $this->db->get_where('tbl_user', ['id_user' => $user_id])->row_array();

        // Tampilkan kolom profil sesuai dengan nama file gambar
        $profil_image = base_url('users/' . $user_data['profil']);
        ?>
        <div class="top1">
            <img src="<?= $profil_image ?>" alt="Profile Image">
        </div>
        <!-- // -->
        <div class="top2">
            <h1><?php echo $this->session->userdata('username'); ?></h1>
        </div>
        <div class="top3">
            <h5><?php echo $this->session->userdata('email'); ?></h5>
        </div>

        <?php
        // Jika Anda telah melakukan perubahan pada username atau email
        if ($user_data['username'] != $this->session->userdata('username') || $user_data['email'] != $this->session->userdata('email')) {
            // Update data session
            $new_session_data = array(
                'id_user' => $user_data['id_user'],
                'username' => $user_data['username'],
                'email' => $user_data['email'],
                // tambahkan data sesi lainnya jika ada
            );
            $this->session->set_userdata($new_session_data);
        }
        ?>

        <script>
            var hasProfileChanged = <?php echo json_encode($user_data['username'] != $this->session->userdata('username') || $user_data['email'] != $this->session->userdata('email')); ?>;

            // Jika ada perubahan, refresh halaman setelah 2 detik
            if (hasProfileChanged) {
                setTimeout(function() {
                    location.reload();
                }, 2000);
            }
        </script>
        <div class="top4">
            <a href="<?= base_url('home/editprofil/' . $user_data['id_user']) ?>">Edit Profil</a>
            <a href="<?= base_url('home/edit_foto') ?>">Edit Foto</a>
        </div>


    </div>