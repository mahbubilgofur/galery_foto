<!-- Content -->
<div class="content">
    <div class="top-a">
        <h1>DASHBOARD</h1>
    </div>
    <div class="bwh-a">
        <div class="jml-album">
            <div class="top-a1">
                <h3>Total Tbl_Album</h3>
            </div>
            <div class="mid-a2">
                <h1 class="total">
                    <?php
                    // Lakukan query untuk menghitung total album
                    $total_album = $this->db->count_all('tbl_album');
                    // Tampilkan total album
                    echo $total_album;
                    ?>
                </h1>
            </div>
            <div class="bwh-a3">
                <a href="<?= base_url('album') ?>">
                    Lihat detail ->
                </a>
            </div>
        </div>
        <div class="jml-album">
            <div class="top-a1">
                <h3>Total Tbl_Foto</h3>
            </div>
            <div class="mid-a2">
                <h1 class="total">
                    <?php
                    // Lakukan query untuk menghitung total album
                    $total_foto = $this->db->count_all('tbl_foto');
                    // Tampilkan total album
                    echo $total_foto;
                    ?>
                </h1>
            </div>
            <div class="bwh-a3">
                <a href="<?= base_url('foto') ?>">
                    Lihat detail ->
                </a>
            </div>
        </div>
        <div class="jml-album">
            <div class="top-a1">
                <h3>Total Tbl_User</h3>
            </div>
            <div class="mid-a2">
                <h1 class="total">
                    <?php
                    // Lakukan query untuk menghitung total album
                    $total_user = $this->db->count_all('tbl_user');
                    // Tampilkan total album
                    echo $total_user;
                    ?>
                </h1>
            </div>
            <div class="bwh-a3">
                <a href="<?= base_url('user') ?>">
                    Lihat detail ->
                </a>
            </div>
        </div>
    </div>

</div>