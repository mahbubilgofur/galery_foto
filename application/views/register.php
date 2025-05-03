<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #6f84f1;
            background-image: linear-gradient(90deg, #6f84f1 0%, #00fdd0 100%);
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .alert {
            color: black;
        }

        .register-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            width: 250px;
            max-width: 400px;
            text-align: left;
            margin: auto;
        }

        .register-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-groupp {
            display: flex;
            justify-content: center;
            align-items: center;
            justify-content: space-evenly;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .register-button {
            background-color: black;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .register-buttonn {
            background-color: black;
            color: #fff;
            padding: 11px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        a .register-buttonn {
            text-decoration: none;
        }

        .register-button:hover {
            background-color: #218838;
        }

        .register-buttonn:hover {
            background-color: #218838;
        }

        .login-text {
            margin-top: 10px;
            text-align: center;
            color: #333;
        }

        .login-text a {
            color: #007bff;
            text-decoration: none;
        }

        .login-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="alert">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?php echo $this->session->flashdata('message'); ?>
        </div>
        <h2>Register</h2>
        <?php echo form_open('login/register'); ?>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" required>
        </div>
        <div class="form-groupp">
            <a href="<?= base_url('login') ?>">
                <div class="register-buttonn">Kembali</div>
            </a>
            <button type="submit" class="register-button">Register</button>
            <?php echo form_close(); ?>
        </div>
    </div>
</body>

</html>