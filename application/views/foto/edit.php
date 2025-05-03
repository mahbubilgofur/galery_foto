<div class="content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <h1>Edit Foto</h1>
            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-dismissible fade show <?php echo $this->session->flashdata('message_type'); ?>" role="alert">
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
            <?php endif; ?>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <?php echo form_open_multipart('foto/update/' . $foto->id_foto, 'class="foto-form"'); ?>
                    <div class="form-group">
                        <label for="judul_foto">Judul Foto</label>
                        <input type="text" class="form-control" id="judul_foto" name="judul_foto" value="<?php echo $foto->judul_foto; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_foto">Deskripsi Foto</label>
                        <textarea class="form-control" id="deskripsi_foto" name="deskripsi_foto"><?php echo $foto->deskripsi_foto; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="id_album">ID Album</label>
                        <select class="form-control" id="id_album" name="id_album" required>
                            <?php foreach ($albums as $album) : ?>
                                <option value="<?php echo $album['id_album']; ?>" <?php echo ($album['id_album'] == $foto->id_album) ? 'selected' : ''; ?>><?php echo $album['nama_album']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_user">ID User</label>
                        <select class="form-control" id="id_user" name="id_user" required>
                            <?php foreach ($users as $user) : ?>
                                <option value="<?php echo $user['id_user']; ?>" <?php echo ($user['id_user'] == $foto->id_user) ? 'selected' : ''; ?>><?php echo $user['username']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lokasi_file">Ganti Gambar</label>
                        <input type="file" class="form-control" id="lokasi_file" name="lokasi_file">
                        <small>Gambar saat ini: <img src="<?= base_url('fotos/' . $foto->lokasi_file); ?>" alt="Preview" width="100"></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .content-wrapper {
        margin: 20px;
    }

    .breadcrumb {
        background-color: #fff;
    }

    .foto-form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input,
    textarea,
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    button {
        cursor: pointer;
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
    }

    button:hover {
        background-color: #0056b3;
    }

    small {
        display: block;
        margin-top: 10px;
    }

    img {
        margin-top: 5px;
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
</style>

</body>

</html>