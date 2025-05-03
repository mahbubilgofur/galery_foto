<div class="cari-foto">
    <?php if (!empty($photos)) : ?>

        <?php foreach ($photos as $photo) : ?>
            <?php if (isset($photo['username'])) : ?>
                <div class="foto">
                    <div class="top-fotos">
                        <?php
                        $id_user_login = $this->session->userdata('id_user');
                        $target_url = ($id_user_login && $photo['id_user'] == $id_user_login) ? base_url('home/profil_foto/' . $photo['id_user']) : base_url('home/profil_users/' . $photo['id_user']);
                        ?>
                        <a href="<?= $target_url ?>">

                            <div class="left-profil">
                                <img src="<?= base_url('users/' . $photo['profil']); ?>" alt="Profil Image">
                            </div>
                            <div class="right-profil">
                                <p><?= $photo['username']; ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="t-t">
                        <button class="openModal" data-photo-id="<?= $photo['id_foto']; ?>">
                            <img src="<?= base_url('fotos/' . $photo['lokasi_file']); ?>" alt="">
                        </button>
                        <div class="b-b">
                            <div class="b-h2">
                                <p><?= $photo['tgl_unggah']; ?></p>
                            </div>
                            <div class="b-b-b">
                                <?php if ($role_id == 1 || $role_id == 2) : ?>
                                    <?php if ($like[$photo['id_foto']]) : ?>
                                        <a href="<?= base_url('home/remove_like2/' . $photo['id_foto']); ?>"><img src="<?= base_url('img/likesL.png') ?>" alt=""><?= $likes[$photo['id_foto']]; ?></a>
                                    <?php else : ?>
                                        <a href="<?= base_url('home/add_like2/' . $photo['id_foto']); ?>"><img src="<?= base_url('img/putihL.png') ?>" alt=""><?= $likes[$photo['id_foto']]; ?></a>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <a href="<?= base_url('login') ?>">
                                        <img src="<?= base_url('img/putihL.png') ?>" alt=""><?= $likes[$photo['id_foto']]; ?>
                                    </a>
                                <?php endif; ?>
                                <p><img src="<?= base_url('img/komen.png') ?>" alt=""><?= count($komentars[$photo['id_foto']]); ?></p>
                                <p><img src="<?= base_url('img/view.png') ?>" alt=""><?= $jumlah_view[$photo['id_foto']]; ?></p>
                            </div>
                        </div>
                        <div id="modal_<?= $photo['id_foto']; ?>" class="modals">
                            <div class="mdls">
                                <span class="close">&times;</span>
                                <div class="left-mdls">
                                    <img src="<?= base_url('fotos/' . $photo['lokasi_file']); ?>" alt="">
                                </div>
                                <div class="right-mdls">
                                    <div class="r-mdls">
                                        <div class="top-mdls">
                                            <?php
                                            $id_user_login = $this->session->userdata('id_user');
                                            $target_url = ($id_user_login && $photo['id_user'] == $id_user_login) ? base_url('home/profil_foto/' . $photo['id_user']) : base_url('home/profil_users/' . $photo['id_user']);
                                            ?>
                                            <?php if ($photo) : ?>
                                                <a href="<?= $target_url ?>">
                                                    <img src="<?= base_url('users/' . $photo['profil']); ?>" alt="Profil Image">
                                                    <p><?= $photo['username'] ?></p>
                                                <?php endif; ?>
                                                </a>
                                        </div>
                                        <div class="mid-mdls">
                                            <?php foreach ($komentars[$photo['id_foto']] as $komentar) : ?>
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
                                                                <a href="<?= base_url('home/hapus_foto_cari/' . $komentar['id_komen']) ?>"><img src="<?= base_url('img/delete.png') ?>" alt=""></a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="bottom-mdls">
                                            <div class="top-mdls-1">
                                                <div class="top-likes">
                                                    <?php if ($role_id == 1 || $role_id == 2) : ?>
                                                        <?php if ($like[$photo['id_foto']]) : ?>
                                                            <a href="<?= base_url('home/remove_like2/' . $photo['id_foto']); ?>"><img src="<?= base_url('img/likesL.png') ?>" alt=""><?= $likes[$photo['id_foto']]; ?></a>
                                                        <?php else : ?>
                                                            <a href="<?= base_url('home/add_like2/' . $photo['id_foto']); ?>"><img src="<?= base_url('img/putihL.png') ?>" alt=""><?= $likes[$photo['id_foto']]; ?></a>
                                                        <?php endif; ?>
                                                    <?php else : ?>
                                                        <a href="<?= base_url('login') ?>">
                                                            <img src="<?= base_url('img/putihL.png') ?>" alt=""><?= $likes[$photo['id_foto']]; ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="bottom-tgl">
                                                <h4><?= $photo['judul_foto'] ?></h4>
                                                <p><?= $photo['tgl_unggah'] ?></p>
                                            </div>
                                            <div class="bwh-mdls-1">
                                                <form action="<?= base_url('home/add_komentar_foto_cari') ?>" method="post">
                                                    <div class="bottom-m">
                                                        <input type="hidden" name="id_foto" value="<?= $photo['id_foto'] ?>">
                                                        <input type="text" name="isi_komentar" id="" placeholder="  Komentar.....">
                                                        <button type="submit"><img src="<?= base_url('img/kirim.png') ?>" alt=""></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function kembali() {
                        window.history.back();
                    }

                    document.addEventListener("DOMContentLoaded", function() {
                        var openModalButtons = document.querySelectorAll(".openModal");

                        openModalButtons.forEach(function(button) {
                            button.addEventListener("click", function() {
                                var photoId = this.getAttribute("data-photo-id");
                                var modalId = "modal_" + photoId;
                                var modal = document.getElementById(modalId);
                                var span = modal.querySelector(".close");

                                modal.style.display = "block";

                                span.onclick = function() {
                                    modal.style.display = "none";
                                }

                                window.onclick = function(event) {
                                    if (event.target == modal) {
                                        modal.style.display = "none";
                                    }
                                }
                            });
                        });
                    });
                </script>
            <?php else : ?>
                <p>Data pencarian tidak sesuai dengan yang diharapkan.</p>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Tidak ada hasil pencarian.</p>
    <?php endif; ?>
</div>

</body>

</html>