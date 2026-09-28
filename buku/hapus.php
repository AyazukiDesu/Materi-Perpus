<?php
require '../includes/init.php'; // muat session dan koneksi database
cek_role('staf', 'operator'); // hanya staf dan operator yang boleh
$id = $_GET['id']; // ambil id dari URL (?id=5)
mysqli_query($koneksi, "DELETE FROM buku WHERE id=$id"); // DELETE: hapus buku dengan id tersebut
header("Location: index.php"); // kembali ke daftar buku
exit; // hentikan program
