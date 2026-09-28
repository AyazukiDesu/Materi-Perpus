<!DOCTYPE html> <!-- tanda bahwa ini dokumen HTML5 -->
<html>
<head>
    <meta charset="UTF-8"> <!-- agar huruf Indonesia tampil benar -->
    <title>Perpustakaan</title> <!-- judul tab browser -->
    <link rel="stylesheet" href="<?= BASE ?>assets/style.css"> <!-- pasang file CSS -->
</head>
<body>
<?php if (isset($_SESSION['user'])): // tampilkan menu hanya jika sudah login ?>
<nav>
    <span class="logo">Perpustakaan</span> <!-- nama aplikasi -->
    <a href="<?= BASE ?>buku/index.php">Buku</a> <!-- menu buku untuk semua role -->
    <?php if ($_SESSION['user']['role'] == 'operator'): // menu Pengguna hanya untuk operator ?>
        <a href="<?= BASE ?>users/index.php">Pengguna</a>
    <?php endif; ?>
    <span class="kanan"> <!-- bagian kanan menu -->
        <?= $_SESSION['user']['nama'] ?> <!-- nama yang sedang login -->
        <span class="badge <?= $_SESSION['user']['role'] ?>"><?= $_SESSION['user']['role'] ?></span> <!-- lencana role, warnanya mengikuti nama role -->
        <a href="<?= BASE ?>auth/logout.php">Keluar</a> <!-- tautan logout -->
    </span>
</nav>
<?php endif; ?>
<div class="isi"> <!-- awal kotak isi halaman -->
