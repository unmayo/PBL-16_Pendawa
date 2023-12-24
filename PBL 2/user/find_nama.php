<?php
include "../conect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];

    $sql = "SELECT nama_lengkap, profile_image, no_rt FROM biodata WHERE no_ktp = '$nik'";
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "No user found"]);
    }

    $koneksi->close();
}
?>
