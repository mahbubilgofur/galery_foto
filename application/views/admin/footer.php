<div class="footer">

</div>
</div>
<style>
    /* CSS untuk tombol */

    .btn {
        display: inline-block;
        width: 50px;
        /* Lebar tombol */
        height: 30px;
        /* Tinggi tombol */
        font-size: 14px;
        /* Mengurangi ukuran font agar sesuai dengan ukuran tombol */
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: non5;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    /* Warna latar belakang dan teks tombol */
    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-warning:hover {
        background-color: #d39e00;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    /* Jarak antar tombol */
    .btn+.btn {
        margin-left: 10px;
    }
</style>
<script>
    function toggleSidebar() {
        var sidebar = document.querySelector('.sidebar');
        var content = document.querySelector('.content');

        if (sidebar.style.width === '150px') {
            sidebar.style.width = '0';
            sidebar.style.marginLeft = '-150px';
            content.style.marginLeft = '0';
        } else {
            sidebar.style.width = '150px';
            sidebar.style.marginLeft = '0';
            content.style.marginLeft = '150px'; // Adjusted margin to match sidebar width
        }
    }
</script>
</body>

</html>