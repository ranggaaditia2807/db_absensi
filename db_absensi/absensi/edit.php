<?php
require '../config/koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM absensi WHERE id_absensi='$id'"));

if (isset($_POST['update'])) {
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];
    mysqli_query($koneksi, "UPDATE absensi SET tanggal='$tanggal', status='$status' WHERE id_absensi='$id'");
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Absensi</title>
    <style>
        body {font-family: Arial; padding: 20px;}
        form {max-width: 300px; margin: auto;}
        input, select, button {width: 100%; padding: 10px; margin: 5px 0;}
        button {background: #f39c12; border: none; color: white;}
    </style>
</head>
<body>
<h2>Edit Absensi</h2>
<form method="post">
    <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required>
    <select name="status" required>
        <option value="hadir" <?= $data['status']=='hadir'?'selected':'' ?>>Hadir</option>
        <option value="izin" <?= $data['status']=='izin'?'selected':'' ?>>Izin</option>
        <option value="sakit" <?= $data['status']=='sakit'?'selected':'' ?>>Sakit</option>
        <option value="alpha" <?= $data['status']=='alpha'?'selected':'' ?>>Alpha</option>
    </select>
    <button type="submit" name="update">Update</button>
</form>
</body>
</html>
