<div class="content">
    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Page Content -->
            <h1>Add Like</h1>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <!-- Form Start -->
                    <?php echo form_open('like/add_like', 'class="like-form"'); ?>
                    <div class="form-group">
                        <label for="id_foto">ID Foto</label>
                        <select class="form-control" id="id_foto" name="id_foto" required>
                            <?php foreach ($fotos as $foto) : ?>
                                <option value="<?php echo $foto['id_foto']; ?>"><?php echo $foto['judul_foto']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_user">ID User</label>
                        <select class="form-control" id="id_user" name="id_user" required>
                            <?php foreach ($users as $user) : ?>
                                <option value="<?php echo $user['id_user']; ?>"><?php echo $user['username']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Like</button>
                    <?php echo form_close(); ?>
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

        .like-form {
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

        input {
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