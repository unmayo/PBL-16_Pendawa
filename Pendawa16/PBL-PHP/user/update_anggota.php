<?php
// Include database connection file
include "../conect.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Validate and sanitize form data
    $nama_lengkap = isset($_POST['nama_lengkap']) ? htmlspecialchars($_POST['nama_lengkap']) : null;
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : null;
    $no_handphone = isset($_POST['no_handphone']) ? htmlspecialchars($_POST['no_handphone']) : null;
    $tanggal_lahir = isset($_POST['tanggal_lahir']) ? htmlspecialchars($_POST['tanggal_lahir']) : null;
    $nama_ibu_kandung = isset($_POST['nama_ibu_kandung']) ? htmlspecialchars($_POST['nama_ibu_kandung']) : null;
    $nama_ayah_kandung = isset($_POST['nama_ayah_kandung']) ? htmlspecialchars($_POST['nama_ayah_kandung']) : null;
    $alamat_sekarang = isset($_POST['alamat_sekarang']) ? htmlspecialchars($_POST['alamat_sekarang']) : null;
    $kewarganegaraan = isset($_POST['kewarganegaraan']) ? htmlspecialchars($_POST['kewarganegaraan']) : null;
    $agama = isset($_POST['agama']) ? htmlspecialchars($_POST['agama']) : null;
    $pendidikan_terakhir = isset($_POST['pendidikan_terakhir']) ? htmlspecialchars($_POST['pendidikan_terakhir']) : null;
    $pekerjaan = isset($_POST['pekerjaan']) ? htmlspecialchars($_POST['pekerjaan']) : null;
    $status_perkawinan = isset($_POST['status_perkawinan']) ? htmlspecialchars($_POST['status_perkawinan']) : null;
    $no_ktp = isset($_POST['no_ktp']) ? htmlspecialchars($_POST['no_ktp']) : null;
    $no_kartu_keluarga = isset($_POST['no_kartu_keluarga']) ? htmlspecialchars($_POST['no_kartu_keluarga']) : null;
    $deskripsi = isset($_POST['deskripsi']) ? htmlspecialchars($_POST['deskripsi']) : null;

    // SQL query to update data in the biodata table
    $sql = "UPDATE biodata SET 
                nama_lengkap = COALESCE(?, nama_lengkap),
                jenis_kelamin = COALESCE(?, jenis_kelamin),
                no_handphone = COALESCE(?, no_handphone),
                tanggal_lahir = COALESCE(?, tanggal_lahir),
                nama_ibu_kandung = COALESCE(?, nama_ibu_kandung),
                nama_ayah_kandung = COALESCE(?, nama_ayah_kandung),
                alamat_sekarang = COALESCE(?, alamat_sekarang),
                kewarganegaraan = COALESCE(?, kewarganegaraan),
                agama = COALESCE(?, agama),
                pendidikan_terakhir = COALESCE(?, pendidikan_terakhir),
                pekerjaan = COALESCE(?, pekerjaan),
                status_perkawinan = COALESCE(?, status_perkawinan),
                no_kartu_keluarga = COALESCE(?, no_kartu_keluarga),
                deskripsi = COALESCE(?, deskripsi)
            WHERE no_ktp = ?";

    // Create a prepared statement
    $stmt = mysqli_prepare($koneksi, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssssssssssssss", $nama_lengkap, $jenis_kelamin, $no_handphone, $tanggal_lahir,
    $nama_ibu_kandung, $nama_ayah_kandung, $alamat_sekarang, $kewarganegaraan,
    $agama, $pendidikan_terakhir, $pekerjaan, $status_perkawinan,
    $no_kartu_keluarga, $deskripsi, $no_ktp);


    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // If the query is successful, send a success response
        echo "Data updated successfully!";
    } else {
        // If there is an error in the query, send an error response
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($koneksi);
} else {
    // If the request is not a POST request, send an error response
    echo "Error: Invalid request!";
}
?>

