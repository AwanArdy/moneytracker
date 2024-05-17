<?php
$servername = "localhost";
$username = "awan";
$password = "ayaogawa";
$database = "moneytracker";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    echo "Koneksi berhasil!";
}
?>