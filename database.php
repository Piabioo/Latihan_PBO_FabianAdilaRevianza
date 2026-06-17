<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "db_latihan_pbo_fabianadilarevianza";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
