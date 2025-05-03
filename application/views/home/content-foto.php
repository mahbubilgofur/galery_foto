<div class="mid-profil">
    <a href="<?= base_url('home/profil_foto') ?>" class="fotooo">Foto</a>
    <a href="<?= base_url('home/profil_like') ?>">Like</a>
</div>
<div class="bottom-profil">
    <?php foreach ($fotos as $foto) : ?>
        <div class="foto-profil-p">
            <img src="<?= base_url() ?>fotos/<?php echo $foto->lokasi_file; ?>" alt="">
            <!-- <p><?php echo $foto->lokasi_file; ?></p> -->
        </div>
    <?php endforeach; ?>
</div>
</div>
</body>

</html>

</body>

</html>