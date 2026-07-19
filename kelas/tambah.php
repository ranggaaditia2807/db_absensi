<?php
require '../config/koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_kelas = $_POST['nama_kelas'];
    mysqli_query($koneksi, "INSERT INTO kelas (nama_kelas) VALUES ('$nama_kelas')");
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kelas</title>
    <style>
        body {font-family: Arial; padding: 20px;}
        form {max-width: 300px; margin: auto;}
        input, button {width: 100%; padding: 10px; margin: 5px 0;}
        button {background: #2ecc71; border: none; color: white;}
    </style>
</head>
<body>
<h2>Tambah Kelas</h2>
<form method="post">
    <input type="text" name="nama_kelas" placeholder="Nama Kelas" required>
    <button type="submit" name="simpan">Simpan</button>
</form>
</body>
</html>
