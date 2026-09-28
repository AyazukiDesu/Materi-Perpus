<?php
require '../includes/init.php'; // muat session dan koneksi database
cek_role('staf', 'operator'); // hanya staf dan operator yang boleh
$id = $_GET['id']; // ambil id dari URL (?id=5)
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // jika form dikirim
    $judul = $_POST['judul']; // ambil judul dari form
    $penulis = $_POST['penulis']; // ambil penulis dari form
    $tahun = $_POST['tahun_terbit']; // ambil tahun dari form
    $stok = $_POST['stok']; // ambil stok dari form
    mysqli_query($koneksi, "UPDATE buku SET judul='$judul', penulis='$penulis', tahun_terbit=$tahun, stok=$stok WHERE id=$id"); // UPDATE: ubah data buku
    header("Location: index.php"); // kembali ke daftar buku
    exit; // hentikan program
}
$hasil = mysqli_query($koneksi, "SELECT * FROM buku WHERE id=$id"); // ambil data buku lama
$buku = mysqli_fetch_assoc($hasil); // ubah hasil menjadi array
include '../includes/header.php'; // tampilkan bagian atas halaman
?>
<h1>Edit Buku</h1> <!-- judul halaman -->
<form method="post"> <!-- form dikirim dengan metode POST -->
    <input name="judul" value="<?= $buku['judul'] ?>" required><br> <!-- kolom judul terisi data lama -->
    <input name="penulis" value="<?= $buku['penulis'] ?>" required><br> <!-- kolom penulis terisi data lama -->
    <input name="tahun_terbit" type="number" value="<?= $buku['tahun_terbit'] ?>" required><br> <!-- kolom tahun terisi data lama -->
    <input name="stok" type="number" min="0" value="<?= $buku['stok'] ?>" required><br> <!-- kolom stok terisi data lama -->
    <button>Simpan</button> <a href="index.php">Batal</a> <!-- tombol simpan dan tautan batal -->
</form>
<?php include '../includes/footer.php'; ?>
