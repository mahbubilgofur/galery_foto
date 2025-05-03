<div class="content">
    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Page Content -->
            <h1>Add User</h1>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- Menampilkan pesan kesalahan dari flashdata jika ada -->
            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <!-- Menampilkan pesan sukses dari flashdata jika ada -->
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <hr>

            <div class="row">
                <div class="col-md-6">
                    <!-- Form Start -->
                    <!-- Form Start -->
                    <?php echo form_open_multipart('user/add_user', 'class="user-form"'); ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
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
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .content-wrapper {
            margin: 20px;
        }

        .breadcrumb {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .user-form {
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