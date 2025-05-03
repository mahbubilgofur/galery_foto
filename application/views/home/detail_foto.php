<div class="c-content">
    <a href="javascript:void(0);" class="kembali-detail" onclick="kembali();">
        < </a>
            <script>
                function kembali() {
                    window.history.back();
                }
            </script>
            <div class="isi_cnt">
                <div class="left-content">
                    <img src="<?= base_url() ?>fotos/<?php echo $foto->lokasi_file; ?>" alt="">
                </div>
                <div class="bottom-content">
                    <div class="top-c">
                        <div class="top-cc">
                            <?php
                            $id_user_login = $this->session->userdata('id_user');
                            $target_url = ($id_user_login && $foto->id_user == $id_user_login) ? base_url('home/profil_foto/' . $foto->id_user) : base_url('home/profil_users/' . $foto->id_user);
                            ?>
                            <a href="<?= $target_url ?>">
                                <img src="<?php echo base_url('users/' . $profils['profil']); ?>" alt="Profil Image">
                                <p><?= $profils['username'] ?></p>
                            </a>
                        </div>
                        <div class="top-ccc">
                            <p><?php echo $foto->deskripsi_foto; ?></p>
                        </div>
                    </div>
                    <div class="bottom-c">
                        <?php foreach ($komentars as $komentar) : ?>
                            <div class="komen-user">
                                <div class="komen-user1">
                                    <img src="<?php echo base_url('users/' . $komentar['profil']); ?>" alt="Profil Image">
                                    <h4><?= $komentar['username'] ?></h4>
                                </div>
                                <div class="komen-user2">
                                    <p><?= $komentar['isi_komentar'] ?></p>
                                </div>
                                <div class="tgl-komen">
                                    <p><?= $komentar['tgl_komentar'] ?></p>
                                    <?php if ($komentar['id_user'] == $this->session->userdata('id_user')) : ?>
                                        <?php if ($role_id == 1 || $role_id == 2) : ?>
                                            <a href="<?= base_url('home/hapus/' . $komentar['id_komen']) ?>"><img src="<?= base_url('img/delete.png') ?>" alt=""></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="bottom-mid">
                        <!-- Tampilan untuk Tombol Like -->
                        <?php if ($role_id == 1 || $role_id == 2) : ?>
                            <?php if ($is_liked) : ?>
                                <a href="<?= base_url('home/remove_like/' . $fotos['id_foto']); ?>"><img src="<?= base_url('img/likesL.png') ?>" alt=""></a>
                            <?php else : ?>
                                <a href="<?= base_url('home/add_like/' . $fotos['id_foto']); ?>"><img src="<?= base_url('img/putihL.png') ?>" alt=""></a>
                            <?php endif; ?>
                        <?php else : ?>
                            <a href="<?= base_url('login') ?>">
                                <p><img src="<?= base_url('img/putihL.png') ?>" alt=""></p>
                            </a>
                        <?php endif; ?>
                        <h4><?php echo $foto->judul_foto; ?></h4>
                        <p><?php echo $foto->tgl_unggah; ?></p>
                    </div>
                    <form action="<?= base_url('home/add_komentar') ?>" method="post">
                        <div class="bottom-m">
                            <input type="hidden" name="id_foto" value="<?= $fotos['id_foto'] ?>">
                            <input type="text" name="isi_komentar" id="" placeholder="  Komentar.....">
                            <button type="submit"><img src="<?= base_url('img/kirim.png') ?>" alt=""></button>
                        </div>
                    </form>
                </div>
            </div>
</div>


</body>


</html>