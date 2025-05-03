<div class="content">
    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Page Content -->
            <h1>Edit Like</h1>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <!-- Form Start -->
                    <?php echo form_open('like/update/' . $like->id_like, 'class="like-form"'); ?>
                    <div class="form-group">
                        <label for="id_foto">ID Foto</label>
                        <select class="form-control" id="id_foto" name="id_foto" required>
                            <?php foreach ($fotos as $foto) : ?>
                                <option value="<?php echo $foto['id_foto']; ?>" <?php echo ($foto['id_foto'] == $like->id_foto) ? 'selected' : ''; ?>><?php echo $foto['judul_foto']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_user">ID User</label>
                        <select class="form-control" id="id_user" name="id_user" required>
                            <?php foreach ($users as $user) : ?>
                                <option value="<?php echo $user['id_user']; ?>" <?php echo ($user['id_user'] == $like->id_user) ? 'selected' : ''; ?>><?php echo $user['username']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <?php echo form_close(); ?>
                    <!-- Form End -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .content-wrapper {
            margin: 20px;
        }

        .breadcrumb {
            background-color: #fff;
        }

        .like-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        button {
            cursor: pointer;
        }
    </style>
</div>
</body>

</html>