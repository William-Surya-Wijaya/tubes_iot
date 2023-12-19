<?php
$host = "williamsuryawijaya.my.id";
$username = "williams_iot";
$password = "betulkae";
$database = "williams_iot";

$koneksi = mysqli_connect($host,$username,$password,$database);
if(mysqli_connect_errno()){
    echo "Koneksi database gagal : ". mysqli_connect_errno();
    die;
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}