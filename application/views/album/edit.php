<div class="content">
    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Page Content -->
            <h1>Edit Album</h1>
            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-dismissible fade show <?php echo $this->session->flashdata('message_type'); ?>" role="alert">
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
            <?php endif; ?>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <!-- Form Start -->
                    <!-- Form Start -->
                    <?php echo form_open_multipart('album/update/' . $album->id_album, 'class="album-form"'); ?>
                    <div class="form-group">
                        <label for="nama_album">Nama Album</label>
                        <input type="text" class="form-control" id="nama_album" name="nama_album" value="<?php echo $album->nama_album; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi"><?php echo $album->deskripsi; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="cover">Cover</label>
                        <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <?php echo form_close(); ?>
                    <!-- Form End -->

                    <!-- Form End -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->

    <style>
        .content-wrapper {
            margin: 20px;
        }

        .breadcrumb {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .album-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        button {
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>


</div>
</body>

</html>