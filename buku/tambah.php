<?php
require '../includes/init.php'; // muat session dan koneksi database
cek_role('staf', 'operator'); // hanya staf dan operator yang boleh
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // jika form dikirim
    $judul = $_POST['judul']; // ambil judul dari form
    $penulis = $_POST['penulis']; // ambil penulis dari form
    $tahun = $_POST['tahun_terbit']; // ambil tahun dari form
    $stok = $_POST['stok']; // ambil stok dari form
    mysqli_query($koneksi, "INSERT INTO buku (judul, penulis, tahun_terbit, stok) VALUES ('$judul', '$penulis', $tahun, $stok)"); // CREATE: simpan buku baru
    header("Location: index.php"); // kembali ke daftar buku
    exit; // hentikan program
}
include '../includes/header.php'; // tampilkan bagian atas halaman
?>
<h1>Tambah Buku</h1> <!-- judul halaman -->
<form method="post"> <!-- form dikirim dengan metode POST -->
    <input name="judul" placeholder="Judul" required><br> <!-- kolom judul -->
    <input name="penulis" placeholder="Penulis" required><br> <!-- kolom penulis -->
    <input name="tahun_terbit" type="number" placeholder="Tahun terbit" required><br> <!-- kolom tahun (hanya angka) -->
    <input name="stok" type="number" min="0" placeholder="Stok" required><br> <!-- kolom stok (minimal 0) -->
    <button>Simpan</button> <a href="index.php">Batal</a> <!-- tombol simpan dan tautan batal -->
</form>
<?php include '../includes/footer.php'; ?>
