<?php
require '../config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Absensi</title>

    <!-- Font Awesome (ikon hamburger & menu) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: Arial;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        /* ===== HAMBURGER ===== */
        .hamburger {
            position: fixed;
            top: 15px;
            left: 15px;
            background: #343a40;
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1100;
            font-size: 18px;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background: #343a40;
            transition: 0.3s;
            z-index: 1000;
            padding-top: 60px;
        }

        .sidebar.show {
            left: 0;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            border-bottom: 1px solid #495057;
        }

        .sidebar a:hover {
            background: #495057;
        }

        /* ===== OVERLAY ===== */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            display: none;
            z-index: 900;
        }

        .overlay.show {
            display: block;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            padding: 80px 20px 20px 20px;
        }

        h2 {text-align: center;}

        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        th {
            background: #3498db;
            color: white;
        }

        a {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
        }

        .tambah {background: #2ecc71;}
        .edit {background: #f39c12;}
        .hapus {background: #e74c3c;}
    </style>
</head>
<body>

<!-- HAMBURGER BUTTON -->
<button class="hamburger" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
</button>

<!-- OVERLAY -->
<div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <a href="../index.php"><i class="fas fa-home"></i> Dashboard</a>
    <a href="../kelas/index.php"><i class="fas fa-school"></i> Manajemen Kelas</a>
    <a href="../siswa/index.php"><i class="fas fa-users"></i> Manajemen Siswa</a>
    <a href="index.php"><i class="fas fa-calendar-check"></i> Manajemen Absensi</a>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">
    <h2>Data Absensi</h2>
    <a href="tambah.php" class="tambah">+ Tambah Absensi</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $q = mysqli_query($koneksi, "
            SELECT absensi.*, siswa.nama_siswa, kelas.nama_kelas 
            FROM absensi
            JOIN siswa ON absensi.id_siswa = siswa.id_siswa
            JOIN kelas ON siswa.id_kelas = kelas.id_kelas
            ORDER BY absensi.tanggal DESC
        ");

        while ($d = mysqli_fetch_assoc($q)) {
            echo "<tr>
                <td>$no</td>
                <td>$d[nama_siswa]</td>
                <td>$d[nama_kelas]</td>
                <td>$d[tanggal]</td>
                <td>" . ucfirst($d['status']) . "</td>
                <td>
                    <a href='edit.php?id=$d[id_absensi]' class='edit'>Edit</a> 
                    <a href='hapus.php?id=$d[id_absensi]' class='hapus'
                       onclick='return confirm(\"Hapus data?\")'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</div>

<!-- JS -->
<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('show');
    document.getElementById('overlay').classList.toggle('show');
}
</script>

</body>
</html>
