<?php
require '../config/koneksi.php';
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM absensi WHERE id_absensi='$id'");
header('
