<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="<?= base_url() ?>css/admin.css">

</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h1>Admin</h1>
            <a href="<?= base_url('admin') ?>" class="<?= ($this->uri->segment(1) == 'admin') ? 'active' : '' ?>">Dashboard</a>
            <a href="<?= base_url('album') ?>" class="<?= ($this->uri->segment(1) == 'album') ? 'active' : '' ?>">Album</a>
            <a href="<?= base_url('foto') ?>" class="<?= ($this->uri->segment(1) == 'foto') ? 'active' : '' ?>">Foto</a>
            <a href="<?= base_url('user') ?>" class="<?= ($this->uri->segment(1) == 'user') ? 'active' : '' ?>">User</a>
            <a href="<?= base_url('komentar') ?>" class="<?= ($this->uri->segment(1) == 'komentar') ? 'active' : '' ?>">Komentar</a>
            <a href="<?= base_url('like') ?>" class="<?= ($this->uri->segment(1) == 'like') ? 'active' : '' ?>">Like</a>
            <a href="<?= base_url('login/logout') ?>" style="color: red;">Logout</a>
        </div>

        <!-- Toggle Button -->
        <button class="sidebar-toggle" onclick="toggleSidebar()">+</button>