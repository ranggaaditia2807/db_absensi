<?php
require '../config/koneksi.php';

// Cegah error undefined id
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

// Ambil data siswa
$query = mysqli_query($koneksi, "
    SELECT siswa.*, kelas.nama_kelas
    FROM siswa
    JOIN kelas ON siswa.id_kelas = kelas.id_kelas
    WHERE id_siswa='$id'
");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan";
    exit;
}

// Ambil data kelas untuk dropdown
$query_kelas = mysqli_query($koneksi, "SELECT * FROM kelas");

// Proses update
if (isset($_POST['update'])) {
    $nama_siswa = isset($_POST['nama_siswa']) ? $_POST['nama_siswa'] : '';
    $nama_kelas = isset($_POST['nama_kelas']) ? $_POST['nama_kelas'] : '';

    // Ambil id_kelas berdasarkan nama_kelas
    $query_kelas = mysqli_query($koneksi, "SELECT id_kelas FROM kelas WHERE nama_kelas='$nama_kelas'");
    $kelas_data = mysqli_fetch_assoc($query_kelas);
    $id_kelas = $kelas_data ? $kelas_data['id_kelas'] : '';

    mysqli_query(
        $koneksi,
        "UPDATE siswa
         SET nama_siswa='$nama_siswa', id_kelas='$id_kelas'
         WHERE id_siswa='$id'"
    );

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
    <style>
        body {font-family: Arial; padding: 20px;}
        form {max-width: 300px; margin: auto;}
        input, select, button {width: 100%; padding: 10px; margin: 5px 0;}
        button {background: #f39c12; border: none; color: white;}
    </style>
</head>
<body>

<h2>Edit Siswa</h2>

<form method="post">
    <input type="text" name="nama_siswa"
        value="<?php echo htmlspecialchars($data['nama_siswa']); ?>" required="required">

    <select name="nama_kelas" required="required">
        <option value="">Pilih Kelas</option>
        <?php while ($kelas = mysqli_fetch_assoc($query_kelas)) { ?>
            <option value="<?php echo htmlspecialchars($kelas['nama_kelas']); ?>"
                <?php if ($kelas['nama_kelas'] == $data['nama_kelas']) echo 'selected'; ?>>
                <?php echo htmlspecialchars($kelas['nama_kelas']); ?>
            </option>
        <?php } ?>
    </select>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>
