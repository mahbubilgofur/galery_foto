<div class="mid-profil">
    <a href="<?= base_url('home/profil_foto') ?>">Foto</a>
    <a href="<?= base_url('home/profil_like') ?>" class="likeee">Like</a>
</div>
<div class="bottom-profil">
    <?php foreach ($liked_photos as $liked_photo) : ?>
        <a href="<?= base_url() ?>home/detail_foto/<?php echo $liked_photo->id_foto; ?>">
            <div class="foto-profil-p">
                <img src="<?= base_url() ?>fotos/<?php echo $liked_photo->lokasi_file; ?>" alt="">
            </div>
        </a>
    <?php endforeach; ?>
</div>
</body>

</html>