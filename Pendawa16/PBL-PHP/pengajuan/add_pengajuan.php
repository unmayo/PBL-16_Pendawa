<?php
// Include database connection file
include "../conect.php";

function generateUniqueCode($database) {
    while (true) {
        // Generate a random code
        $code = strtoupper(substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789', 8)), 0, 8));

        // Check if the code already exists in the database
        if (!in_array($code, $database)) {
            return $code;
        }
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $no_rt = $_POST['no_rt'];
    $jenis_surat = $_POST['jenis_surat'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_handphone = $_POST['no_handphone'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $nama_ibu_kandung = $_POST['nama_ibu_kandung'];
    $nama_ayah_kandung = $_POST['nama_ayah_kandung'];
    $alamat_sekarang = $_POST['alamat_sekarang'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $agama = $_POST['agama'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $pekerjaan = $_POST['pekerjaan'];
    $status_perkawinan = $_POST['status_perkawinan'];
    $no_ktp = $_POST['no_ktp'];
    $no_kartu_keluarga = $_POST['no_kartu_keluarga'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_upload = $_POST['tgl_upload'];
    $nik_pengaju = $_POST['nik_pengaju'];
    $foto_ktp = $_POST['foto_ktp'];
    $foto_kartu_keluarga = $_POST['foto_kartu_keluarga'];
    $foto_pendukung_lain = $_POST['foto_pendukung_lain'];

    // Generate a unique code for no_unik
    $existingCodes = array_column($koneksi->query("SELECT no_unik FROM ajuan")->fetch_all(MYSQLI_ASSOC), 'no_unik');
    $no_unik = generateUniqueCode($existingCodes);

    // SQL query to insert data into the biodata table
    $sql = "INSERT INTO ajuan (
        jenis_surat, nama_lengkap, jenis_kelamin, no_handphone, tanggal_lahir, 
        nama_ibu_kandung, nama_ayah_kandung, alamat_sekarang, kewarganegaraan, 
        agama, pendidikan_terakhir, pekerjaan, status_perkawinan, 
        no_ktp, no_kartu_keluarga, deskripsi, tgl_upload, nik_pengaju, no_unik,
        foto_ktp, foto_kartu_keluarga, foto_pendukung_lain, no_rt
    ) VALUES (
        '$jenis_surat','$nama_lengkap', '$jenis_kelamin', '$no_handphone', '$tanggal_lahir', 
        '$nama_ibu_kandung', '$nama_ayah_kandung', '$alamat_sekarang', '$kewarganegaraan', 
        '$agama', '$pendidikan_terakhir', '$pekerjaan', '$status_perkawinan', 
        '$no_ktp', '$no_kartu_keluarga', '$deskripsi', '$tgl_upload','$nik_pengaju', '$no_unik',
        '$foto_ktp', '$foto_kartu_keluarga', '$foto_pendukung_lain', $no_rt
    )";

    // Perform the query
    if (mysqli_query($koneksi, $sql)) {
        // If the query is successful, send a success response
        echo "Data inserted successfully!";
    } else {
        // If there is an error in the query, send an error response
        echo "Error: " . mysqli_error($koneksi);
    }

    // Close the database connection
    mysqli_close($koneksi);
} else {
    // If the request is not a POST request, send an error response
    echo "Error: Invalid request!";
}
?>


