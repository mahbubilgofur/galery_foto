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
        <div class="cnt-profil-kanann">
            <div class="top-profil-cnt">
                <p>Edit Foto</p>
            </div>
            <?php if ($foto) : ?>
                <?php echo form_open_multipart('home/update_fotos/' . $foto->id_foto, 'class="foto-form"'); ?>

                <div class="bottom-profil-cnt">
                    <div class="input-form-cnt">
                        <input type="text" class="form-control" id="judul_foto" name="judul_foto" value="<?php echo $foto->judul_foto; ?>" required>
                    </div>
                    <div class="input-form-cntt">
                        <textarea class="form-controll" id="deskripsi_foto" name="deskripsi_foto"><?php echo $foto->deskripsi_foto; ?></textarea>
                    </div>
                    <div class="input-form-cnttt">
                        <input type="file" class="form-control" id="lokasi_file" name="lokasi_file">
                        <small><img src="<?= base_url('fotos/' . $foto->lokasi_file); ?>" alt="Preview" width="50px" height="50px"></small>
                    </div>
                    <div class="simpan-profil">
                        <button type="submit" name="simpan_profil">Update</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            <?php else : ?>
                <p>Data foto tidak ditemukan.</p>
            <?php endif; ?>

        </div>
    </div>
</div>
<style>
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
</script>
</body>

</html>