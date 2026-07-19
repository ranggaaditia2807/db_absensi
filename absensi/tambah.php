<?php
require '../config/koneksi.php';

if (isset($_POST['simpan'])) {
    $id_siswa = $_POST['id_siswa'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];
    mysqli_query($koneksi, "INSERT INTO absensi (id_siswa, tanggal, status) VALUES ('$id_siswa', '$tanggal', '$status')");
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Absensi</title>
    <style>
        body {font-family: Arial; padding: 20px;}
        form {max-width: 300px; margin: auto;}
        select, input, button {width: 100%; padding: 10px; margin: 5px 0;}
        button {background: #2ecc71; border: none; color: white;}
    </style>
</head>
<body>
<h2>Tambah Absensi</h2>
<form method="post">
    <select name="id_siswa" required>
        <option value="">-- Pilih Siswa --</option>
        <?php
        $siswa = mysqli_query($koneksi, "
            SELECT siswa.id_siswa, siswa.nama_siswa, kelas.nama_kelas 
            FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas
        ");
        while ($s = mysqli_fetch_assoc($siswa)) {
            echo "<option value='$s[id_siswa]'>$s[nama_siswa] - $s[nama_kelas]</option>";
        }
        ?>
    </select>
    <input type="date" name="tanggal" required>
    <select name="status" required>
        <option value="">-- Status --</option>
        <option value="hadir">Hadir</option>
        <option value="izin">Izin</option>
        <option value="sakit">Sakit</option>
        <option value="alpha">Alpha</option>
    </select>
    <button type="submit" name="simpan">Simpan</button>
</form>
</body>
</html>
