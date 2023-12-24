<?php
    // Include database connection file
    include "../conect.php";
    
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $no_rt = $_POST['no_rt'];
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
        $foto_ktp = $_POST['foto_ktp'];
        $foto_kartu_keluarga = $_POST['foto_kartu_keluarga'];
        $foto_pendukung_lain = $_POST['foto_pendukung_lain'];
        $deskripsi = $_POST['deskripsi'];


        $sql = "INSERT INTO biodata (
            nama_lengkap, jenis_kelamin, no_handphone, tanggal_lahir, 
            nama_ibu_kandung, nama_ayah_kandung, alamat_sekarang, kewarganegaraan, 
            agama, pendidikan_terakhir, pekerjaan, status_perkawinan, 
            no_ktp, no_kartu_keluarga, foto_ktp, foto_kartu_keluarga, foto_pendukung_lain, deskripsi, no_rt
        ) VALUES (
            '$nama_lengkap', '$jenis_kelamin', '$no_handphone', '$tanggal_lahir', 
            '$nama_ibu_kandung', '$nama_ayah_kandung', '$alamat_sekarang', '$kewarganegaraan', 
            '$agama', '$pendidikan_terakhir', '$pekerjaan', '$status_perkawinan', 
            '$no_ktp', '$no_kartu_keluarga', '$foto_ktp', '$foto_kartu_keluarga', '$foto_pendukung_lain','$deskripsi', $no_rt
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

