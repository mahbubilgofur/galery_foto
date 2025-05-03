<section class="content-homes">
   
    <div class="homes">
        <div class="home-content">
            <div class="bts-homes">
                <div class="l-homes">
                    <!-- <div class="segitiga"></div> -->
                    <!-- <div class="bts-l-homes">
                        <div class="top-r">
                            <h4>Selamat Datang di BOBBYPixel!</h4>
                        </div>
                        <div class="bttom-r">
                            <h1>Jelajahi dan Temukan Keindahan dalam Setiap Pixel di BOBBYPixel!</h1>
                        </div>
                    </div> -->
                    <div class="cnt-awl">
                        <div class="animasii">
                            <?php foreach ($albums as $album) : ?>
                                <a href="<?= base_url('home/foto/' . $album->id_album) ?>">
                                    <div class="album">
                                        <div class="t">
                                            <img src="<?= base_url() ?>albums/<?php echo $album->cover; ?>" alt="">
                                        </div>
                                        <div class="b">
                                            <h1><?php echo $album->nama_album; ?></h1>
                                            <!-- <p><?php echo $album->deskripsi; ?></p> -->
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="control prev">&lt;</div>
                    <div class="control next">&gt;</div>
                </div>

                <div class="r-homes">
                    <div class="r-homes-bts">
                        <div class="content-r-homes">
                            <img src="<?= base_url('img/content.png') ?>" alt="">
                        </div>
                        <div class="lc-homes">
                            <div class="l-upt">
                                <img src="<?= base_url('img/uplod.png') ?>" alt="">
                            </div>
                            <div class="r-upt">
                                <h3>UPLOAD</h3>
                                <h5>Foto Anda</h5>
                            </div>
                        </div>
                        <div class="mid-homes"><img src="<?= base_url('img/likesL.png') ?>" alt=""></div>
                        <div class="rc-homes">
                            <div class="t-kmn">
                                <img src="<?= base_url('img/komen.png') ?>" alt="">
                            </div>
                            <div class="b-kmn">
                                <h4>KOMENTAR</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
    <div class="content-album-fotos">
        <?php
        // Fungsi untuk membandingkan jumlah like antara dua foto
        function compareLike($a, $b)
        {
            if ($a->jumlah_like == $b->jumlah_like) {
                return 0;
            }
            return ($a->jumlah_like > $b->jumlah_like) ? -1 : 1;
        }

        // Urutkan array $fotos berdasarkan jumlah like
        usort($fotos, 'compareLike');

        // Tampilkan foto-foto yang sudah diurutkan
        foreach ($fotos as $foto) :
            if ($foto->jumlah_like > 0) :
        ?>
                <div class="foto-cont">
                    <div class="top-cont">
                        <?php
                        $id_user_login = $this->session->userdata('id_user');
                        $target_url = ($id_user_login && $foto->id_user == $id_user_login) ? base_url('home/profil_foto/' . $foto->id_user) : base_url('home/profil_users/' . $foto->id_user);
                        ?>
                        <a href="<?= $target_url ?>">
                            <img src="<?php echo base_url('users/' . $foto->profil); ?>" alt="">
                            <p><?php echo $foto->username ?></p>
                        </a>
                    </div>
                    <div class="mid-cont">
                        <a href="<?php echo base_url('home/detail_foto/' . $foto->id_foto); ?>">
                            <img src="<?php echo base_url('fotos/' . $foto->lokasi_file); ?>" alt="">
                            <div class="hover-cont">🤍<?php echo $foto->jumlah_like ?> </div>
                        </a>
                    </div>
                    <div class="bottom-cont"></div>
                </div>
        <?php
            endif;
        endforeach;
        ?>


    </div>
    <a href="<?= base_url('home/tentang') ?>">
        <div class="tentang-pixel">
            <p>❔</p>
        </div>
    </a>
</section>
<script src="<?= base_url('js/index.js') ?>"></script>

</body>

</html>

</body>

</html>