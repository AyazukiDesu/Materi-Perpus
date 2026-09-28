<?php
require '../includes/init.php'; // muat session dan koneksi database
cek_role('operator'); // hanya operator yang boleh
$id = $_GET['id']; // ambil id dari URL (?id=5)
$error = ""; // tempat pesan error
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // jika form dikirim
    $username = $_POST['username']; // ambil username dari form
    $nama = $_POST['nama_lengkap']; // ambil nama dari form
    $password = $_POST['password']; // ambil password dari form
    $role = $_POST['role']; // ambil role dari form
    $cek = mysqli_query($koneksi, "SELECT id FROM users WHERE username='$username' AND id != $id"); // cari apakah username dipakai orang lain
    if (mysqli_num_rows($cek) > 0) { // jika ada baris hasil, berarti dipakai orang lain
        $error = "Username sudah dipakai."; // isi pesan error
    } else { // jika aman
        mysqli_query($koneksi, "UPDATE users SET username='$username', nama_lengkap='$nama', role='$role' WHERE id=$id"); // UPDATE: ubah data pengguna
        if ($password != "") { // jika password baru diisi
            mysqli_query($koneksi, "UPDATE users SET password='$password' WHERE id=$id"); // ganti password
        }
        header("Location: index.php"); // kembali ke daftar pengguna
        exit; // hentikan program
    }
}
$hasil = mysqli_query($koneksi, "SELECT * FROM users WHERE id=$id"); // ambil data pengguna lama
$u = mysqli_fetch_assoc($hasil); // ubah hasil menjadi array
include '../includes/header.php'; // tampilkan bagian atas halaman
?>
<h1>Edit Pengguna</h1> <!-- judul halaman -->
<?php if ($error): // tampilkan error hanya jika ada ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>
<form method="post"> <!-- form dikirim dengan metode POST -->
    <input name="username" value="<?= $u['username'] ?>" required><br> <!-- kolom username terisi data lama -->
    <input name="nama_lengkap" value="<?= $u['nama_lengkap'] ?>" required><br> <!-- kolom nama terisi data lama -->
    <input name="password" placeholder="Password baru (kosongkan jika tidak diganti)"><br> <!-- kolom password, boleh kosong -->
    <select name="role"> <!-- pilihan role -->
        <?php foreach (['user', 'staf', 'operator'] as $r): // buat satu pilihan untuk tiap role ?>
            <option <?= $u['role'] == $r ? 'selected' : '' ?>><?= $r ?></option> <!-- role saat ini dipilih otomatis -->
        <?php endforeach; ?>
    </select><br>
    <button>Simpan</button> <a href="index.php">Batal</a> <!-- tombol simpan dan tautan batal -->
</form>
<?php include '../includes/footer.php'; ?>
