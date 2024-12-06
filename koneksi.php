<?php
$kalkoKoneksi = mysqli_connect("localhost", "root", "", "kalko_db");

// Periksa koneksi
if (!$kalkoKoneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil.";
}
?>
