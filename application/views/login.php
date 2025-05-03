<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #6f84f1;
            background-image: linear-gradient(90deg, #6f84f1 0%, #00fdd0 100%);
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            width: 250px;
            max-width: 400px;
            text-align: left;
            /* Align the text to the left */
            margin: auto;

            /* Center the container */
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            position: relative;
            margin-bottom: 15px;
        }

        .password-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .password-container a {
            right: 5px;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6px;
            background-color: white;
            border-radius: 0px 4px 4px 0px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-groupp input {
            display: flex;
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .login-button {
            margin-left: 90px;
            background-color: #007bff;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-button:hover {
            background-color: #0056b3;
        }

        .register-text {
            margin-top: 10px;
            text-align: center;
            color: #333;
        }

        .register-text a {
            color: #007bff;
            text-decoration: none;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        .kembali-L {
            background-color: #007bff;
            color: #fff;
            padding: 7px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?php echo $this->session->flashdata('message'); ?>
        <h2>Login</h2>
        <?php echo form_open('login'); ?>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="password-container">
                <input type="password" id="password" name="password" required>
                <a type="button" id="togglePassword">
                    <img id="eyeIcon" src="<?= base_url('') ?>img/a3.png" alt="Show Password" style="width: 20px;">
                </a>
            </div>
        </div>

        <script>
            const togglePassword = document.getElementById('togglePassword');
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            togglePassword.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                eyeIcon.src = type === 'password' ? 'img/a3.png' : 'img/a1.png';
            });
        </script>

        <a href="<?= base_url('/') ?>" class="kembali-L">Kembali</a>
        <button type="submit" class="login-button">Login</button>

        <?php echo form_close(); ?>
        <p class="register-text">Belum punya akun? <a href="<?= base_url() ?>login/register">Daftar di sini</a></p>
    </div>
</body>

</html>