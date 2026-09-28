<?php
require '../includes/init.php'; // muat session dan koneksi database
cek_role('operator'); // hanya operator yang boleh
$error = ""; // tempat pesan error
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // jika form dikirim
    $username = $_POST['username']; // ambil username dari form
    $nama = $_POST['nama_lengkap']; // ambil nama dari form
    $password = $_POST['password']; // ambil password dari form
    $role = $_POST['role']; // ambil role dari form
    $cek = mysqli_query($koneksi, "SELECT id FROM users WHERE username='$username'"); // cari apakah username sudah dipakai
    if (mysqli_num_rows($cek) > 0) { // jika ada baris hasil, berarti sudah dipakai
        $error = "Username sudah dipakai."; // isi pesan error
    } else { // jika belum dipakai
        mysqli_query($koneksi, "INSERT INTO users (username, password, nama_lengkap, role) VALUES ('$username', '$password', '$nama', '$role')"); // CREATE: simpan pengguna baru
        header("Location: index.php"); // kembali ke daftar pengguna
        exit; // hentikan program
    }
}
include '../includes/header.php'; // tampilkan bagian atas halaman
?>
<h1>Tambah Pengguna</h1> <!-- judul halaman -->
<?php if ($error): // tampilkan error hanya jika ada ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>
<form method="post"> <!-- form dikirim dengan metode POST -->
    <input name="username" placeholder="Username" required><br> <!-- kolom username -->
    <input name="nama_lengkap" placeholder="Nama lengkap" required><br> <!-- kolom nama -->
    <input name="password" placeholder="Password" required><br> <!-- kolom password -->
    <select name="role"> <!-- pilihan role -->
        <option>user</option><option>staf</option><option>operator</option>
    </select><br>
    <button>Simpan</button> <a href="index.php">Batal</a> <!-- tombol simpan dan tautan batal -->
</form>
<?php include '../includes/footer.php'; ?>
