<?php
$host = "localhost";
$user = "root";     // default XAMPP/Laragon
$pass = "";         // default XAMPP/Laragon
$db   = "db_karyawan";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
