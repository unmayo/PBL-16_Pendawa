<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "pendawa_pbl16";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>