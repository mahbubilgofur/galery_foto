<div class="edit-profil-cnt">
    <div class="sidbar-profil">
        <?php
        // Ambil data pengguna dari sesi
        $user_id = $this->session->userdata('id_user');
        $user_data = $this->db->get_where('tbl_user', ['id_user' => $user_id])->row_array();

        // Tampilkan kolom profil sesuai dengan nama file gambar
        $profil_image = base_url('users/' . $user_data['profil']);
        ?>
        <!-- Isi sidebar di sini -->
        <a href="<?= base_url('home/editprofil/' . $user_data['id_user']) ?>">Edit Profil</a>
        <a href="<?= base_url('home/edit_foto') ?>">Edit Foto</a>
        <button class="tblsid" onclick="tombolsidbar()">+</button>
    </div>
    <div class="content-profil-cnt">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger">
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>

        <!-- Menampilkan pesan kesalahan dari flashdata jika ada -->
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- Menampilkan pesan sukses dari flashdata jika ada -->
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        <div class="cnt-profil-kanan">
            <div class="top-profil-cnt">
                <p>Edit Profil</p>
            </div>
            <?php echo form_open_multipart('home/update/' . $user->id_user, 'class="user-form"'); ?>
            <div class="mid-profil-cnt">
                <input type="file" class="form-control" id="profil_image" name="profil_image" accept="image/*">
                <?php if (!empty($user->profil)) : ?>
                    <div class="mt-2">
                        <img src="<?php echo base_url('users/' . $user->profil); ?>" alt="Profil Image" class="img-thumbnail" style="max-width: 200px;">
                    </div>
                <?php endif; ?>
                <input type="hidden" name="old_profil_image" value="<?php echo $user->profil; ?>">
            </div>
            <div class="bottom-profil-cnt">
                <div class="input-form-cnt">
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $user->username; ?>" required>
                </div>
                <div class="input-form-cnp">
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $user->password; ?>" required>
                    <a type="button" id="togglePassword">
                        <img id="eyeIcon" src="<?= base_url('') ?>img/a3.png" alt="Show Password" style="width: 20px;">
                    </a>
                </div>

                <div class="input-form-cnt">
                    <input type="email" name="email" placeholder="email" value="<?= set_value('email', $user->email); ?>" required>
                </div>

                <div class="simpan-profil">
                    <button type="submit" name="simpan_profil">Update</button>
                </div>
            </div>
            <style>
                input[type="submit"] {
                    cursor: pointer;
                    border-radius: 20px;
                    width: 100%;
                    height: 100%;
                    border: 1px solid #0000001b;
                }

                input[type="submit"] {
                    background-color: #0000001b;
                    border-radius: 20px;
                    width: 100%;
                    height: 100%;
                    border: 1px solid #0000001b;
                }

                .alert {
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    width: 200px;
                    height: 60px;
                    border-radius: 10px;
                    z-index: 9999;
                    font-size: 15px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    display: none;
                }

                .alert-danger {
                    padding: 10px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    background-color: red;
                    color: white;
                }

                .alert-success {
                    padding: 10px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background-color: green;
                    color: white;
                }
            </style>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var flashMessages = document.querySelectorAll('.alert');

                    flashMessages.forEach(function(message) {
                        message.style.display = 'flex';

                        setTimeout(function() {
                            message.style.display = 'none';
                        }, 2000);

                        var closeButton = message.querySelector('.close');
                        if (closeButton) {
                            closeButton.addEventListener('click', function() {
                                message.style.display = 'none';
                            });
                        }
                    });
                });

                const togglePassword = document.getElementById('togglePassword');
                const passwordField = document.getElementById('password');
                const eyeIcon = document.getElementById('eyeIcon');

                togglePassword.addEventListener('click', function() {
                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordField.setAttribute('type', type);
                    eyeIcon.src = type === 'password' ? '<?= base_url('') ?>img/a3.png' : '<?= base_url('') ?>img/a1.png';
                });

                document.addEventListener("DOMContentLoaded", function() {
                    // Memantau perubahan pada input username
                    var usernameInput = document.getElementById("username");
                    var usernameDisplay = document.getElementById("usernameDisplay");

                    usernameInput.addEventListener("input", function() {
                        var newUsername = usernameInput.value;
                        usernameDisplay.textContent = "Username Display: " + newUsername;
                    });

                    // Memantau perubahan pada input email
                    var emailInput = document.querySelector('input[name="email"]');
                    var emailDisplay = document.getElementById("emailDisplay");

                    emailInput.addEventListener("input", function() {
                        var newEmail = emailInput.value;
                        emailDisplay.textContent = "Email Display: " + newEmail;
                    });
                });

                function tombolsidbar() {
                    var sidbarprofil = document.querySelector('.sidbar-profil');
                    var content_p = document.querySelector('.content-profil-cnt');

                    if (sidbarprofil.style.width === '150px') {
                        sidbarprofil.style.width = '0';
                        sidbarprofil.style.marginLeft = '-150px';
                        content_p.style.marginLeft = '0';
                    } else {
                        sidbarprofil.style.width = '150px';
                        sidbarprofil.style.marginLeft = '0';
                        content_p.style.marginLeft = '150px'; // Adjusted margin to match sidebar width
                    }
                }


                //modal
            </script>

            <?php echo form_close(); ?>


        </div>
    </div>
</div>
</body>

</html>