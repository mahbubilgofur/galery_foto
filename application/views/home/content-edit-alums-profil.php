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
        <div class="form-edit-albums">
            <?php if ($album) : ?>
                <?php echo form_open_multipart('home/update_albums/' . $album->id_album); ?>
                <div class="form-albums">
                    <label for="nama_album">Nama Album</label>
                    <input type="text" class="form-input" id="nama_album" name="nama_album" value="<?php echo $album->nama_album; ?>" required>
                </div>
                <div class="form-albums">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-inputan" id="deskripsi" name="deskripsi"><?php echo $album->deskripsi; ?></textarea>
                </div>
                <div class="form-albums">
                    <label for="cover">Cover</label>
                    <input type="file" class="form-input" id="cover" name="cover" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <?php echo form_close(); ?>
            <?php else : ?>
                <p>Data album tidak ditemukan.</p>
            <?php endif; ?>

        </div>
    </div>
</div>
</body>

</html>