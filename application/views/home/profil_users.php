<div class="profil_users">
    <a href="javascript:void(0);" class="kembali-detail" onclick="kembali();">
        < </a>
            <script>
                function kembali() {
                    window.history.back();
                }
            </script>
            <div class="top-profils">
                <div class="top1p">
                    <!-- Tampilkan gambar profil dari tbl_user -->
                    <img src="<?= base_url('users/' . $user['profil']); ?>" alt="Profil Image">
                </div>
                <div class="top2p">
                    <!-- Tampilkan username dari tbl_user -->
                    <h1><?= $user['username']; ?></h1>
                </div>
                <div class="top3p">
                    <!-- Tampilkan username dari tbl_user -->
                    <h3><?= $user['nama_lengkap']; ?></h3>
                </div>
            </div>
            <div class="bottom-profils">
                <div class="bottom-profils-1">
                    <?php if ($foto) : ?>
                        <!-- Tampilkan foto-foto dari tbl_foto sesuai id_user -->
                        <?php foreach ($foto as $item) : ?>
                            <div class="bottom-p">
                                <img src="<?= base_url('fotos/' . $item['lokasi_file']); ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Tidak ada foto yang ditemukan.</p>
                    <?php endif; ?>
                </div>
            </div>
</div>


</body>

</html>