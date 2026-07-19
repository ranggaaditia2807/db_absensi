<?php
require '../config/koneksi.php';
$id = $_GET['id'];

// Hapus data absensi terkait terlebih dahulu
mysqli_query($koneksi, "DELETE FROM absensi WHERE id_siswa='$id'");

// Kemudian hapus data siswa
mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa='$id'");
header('Location: index.php');
