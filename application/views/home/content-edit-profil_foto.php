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
    <div class="content-foto-cnt">
        <?php foreach ($fotos as $foto) : ?>
            <div class="foto-edit-profil">
                <div class="foto-edit">
                    <img src="<?= base_url() ?>fotos/<?php echo $foto->lokasi_file; ?>" alt="">
                </div>
                <div class="bottom-edit-foto">
                    <a href="<?php echo base_url('home/delete_foto/' . $foto->id_foto); ?>" class="hapus-fotos" onclick="return confirm('Yakin mau hapus?')"><img src="<?= base_url('img/delete.png') ?>" alt=""></a>
                    <a href="<?php echo base_url('home/edit_fotos/' . $foto->id_foto); ?>" class="edit-fotos"><img src="<?= base_url('img/edit.png') ?>" alt=""></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>

</html>