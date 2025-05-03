<style>
    .bg {
        background-color: #0000002a;
        width: 100%;
        height: 100vh;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .upload_alb {
        z-index: 1;
        width: 100%;
        height: 100vh;
        background-color: #00fbff;
        background-image: linear-gradient(90deg, #00fbff 0%, #fc00ff 100%);
        animation: animasi-homes 5s infinite alternate;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .opti {
        background-color: #00fbff;
        color: black;
    }

    @keyframes animasi-homes {
        0% {
            background-position: left;
        }

        100% {
            background-position: right;
        }
    }

    .upload_alb-b {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #000000a2;
        flex-direction: column;
        width: 300px;
        height: 400px;
        padding: 20px;
        border-radius: 30px;
        box-shadow: 0 0 10px rgb(0, 0, 0);
    }

    .upload_albb {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 100%;
        height: 100%;
    }

    .type {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        color: white;
    }

    p {
        margin-bottom: 10px;
        font-size: 13px;
        color: #00fbff;
    }

    .atr {
        display: flex;
        width: 100%;
        justify-content: space-between;
    }

    .kml-alb {
        background-color: #ffffff65;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        font-size: 16px;
    }

    .kml-alb:hover {
        background-color: rgb(0, 155, 155);
        transition: all 0.9s;
        color: black;
    }

    h2 {
        color: #333;
    }

    label {
        color: #00fbff;
        margin-bottom: 5px;
        align-self: flex-start;
    }

    .form-input {
        width: 100%;
        height: 40px;
        margin-bottom: 15px;
        border-radius: 20px;
        border: 1px black;

    }

    .form-inputfile {
        width: 100%;
        height: 40px;
        margin-bottom: 15px;
        border: 1px black;
    }

    .textar {
        border: 1px solid white;
        width: 100%;
        height: 80px;
        margin-bottom: 15px;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
    }

    .textar textarea {
        border: none;
        outline: none;
        border: 1px solid white;
        width: 90%;
        height: 90%;
        border-radius: 10px;
    }



    .submit-btn {
        background-color: #ffffff65;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        font-size: 16px;
    }

    .submit-btn:hover {
        background-color: rgb(0, 155, 155);
        transition: all 0.9s;
        color: black;
    }

    .alertt {
        position: fixed;
        top: 20px;
        right: 20px;
        width: 200px;
        height: 60px;
        border-radius: 10px;
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        display: none;
    }

    .alert-danger {
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: red;
        font-size: 15px;
        color: white;
    }

    .alert-success {
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: green;
        color: white;
    }
</style>
<div class="upload_alb">
    <div class="bg">
        <?php if (validation_errors()) : ?>
            <div class="alertt alert-danger">
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>

        <!-- Menampilkan pesan kesalahan dari flashdata jika ada -->
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alertt alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- Menampilkan pesan sukses dari flashdata jika ada -->
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alertt alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        <div class="upload_alb-b">
            <?php echo form_open_multipart('home/add_foto'); ?>
            <div class="upload_albb">
                <label for="judul_foto">Nama Foto:</label>
                <input type="text" name="judul_foto" class="form-input" placeholder=" Isi Nama Foto" required>
                <label for="id_labum">Pilih Nama Foto :</label>
                <select name="id_album" class="form-input" required>
                    <?php foreach ($data_album as $album) : ?>
                        <option class="opti" value="<?php echo $album->id_album; ?>"><?php echo $album->nama_album; ?></option>
                    <?php endforeach; ?>
                </select>

                <label for="deskripsi_foto">Deskripsi:</label>
                <div class="textar">
                    <textarea name="deskripsi_foto" class="textarea-input" required><?php echo set_value('deskripsi_foto'); ?></textarea>
                </div>
                <label for="lokasi_file">Upload Foto:</label>
                <div class="type">
                    <input type="file" name="lokasi_file" class="form-inputfile" required />
                    <p>Format harus jpg|jpeg|png,Maksimal Ukuran 1 MB</p>
                </div>
                <div class="atr">
                    <a href="javascript:void(0);" onclick="kembali();">
                        <div class="kml-alb">Kembali</div>
                    </a>
                    <script>
                        function kembali() {
                            window.history.back();
                        }
                    </script>
                    <input type="submit" value="Simpan" class="submit-btn" />
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var flashMessages = document.querySelectorAll('.alertt');

        flashMessages.forEach(function(message) {
            message.style.display = 'flex';

            setTimeout(function() {
                message.style.display = 'none';
            }, 5000);

            var closeButton = message.querySelector('.close');
            if (closeButton) {
                closeButton.addEventListener('click', function() {
                    message.style.display = 'none';
                });
            }
        });
    });
</script>
</body>

</html>