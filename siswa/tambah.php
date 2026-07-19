<?php
require '../config/koneksi.php';

if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $id_kelas = $_POST['id_kelas'];
    mysqli_query($koneksi, "INSERT INTO siswa (nis, nama_siswa, id_kelas) VALUES ('$nis', '$nama_siswa', '$id_kelas')");
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0; padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 40px 60px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h2 {
            margin-bottom: 30px;
            color: #3498db;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background: #2ecc71;
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        button:hover {
            background: #27ae60;
        }
    </style>
</head>
<body>
<div class="container">
<h2>Tambah Siswa</h2>
<form method="post">
    <input type="text" name="nis" placeholder="NIS" required>
    <input type="text" name="nama_siswa" placeholder="Nama Siswa" required>
    <select name="id_kelas" required>
        <option value="">-- Pilih Kelas --</option>
        <?php
        $kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
        while ($k = mysqli_fetch_assoc($kelas)) {
            echo "<option value='$k[id_kelas]'>$k[nama_kelas]</option>";
        }
        ?>
    </select>
    <button type="submit" name="simpan">Simpan</button>
</form>
</body>
</html>
