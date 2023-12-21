<?php
    // Include database connection file
    include "../conect.php";

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $surat_path = $_POST['profile_image'];
        $no_unik = $_POST['no_unik'];

        // Check if profile_image for the given no_ktp already exists
        $checkQuery = "SELECT * FROM ajuan WHERE no_unik = '$no_unik'";
        $checkResult = mysqli_query($koneksi, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // If a record with the given no_ktp exists, perform an UPDATE query
            $updateQuery = "UPDATE ajuan SET surat_path = '$surat_path' WHERE no_unik = '$no_unik'";
            if (mysqli_query($koneksi, $updateQuery)) {
                echo "Data updated successfully!";
            } else {
                echo "Error updating data: " . mysqli_error($koneksi);
            }
        } else {
            // If no record with the given no_ktp exists, perform an INSERT query
            $insertQuery = "INSERT INTO ajuan (no_unik, surat_path) VALUES ('$no_unik', '$surat_path')";
            if (mysqli_query($koneksi, $insertQuery)) {
                echo "Data inserted successfully!";
            } else {
                echo "Error inserting data: " . mysqli_error($koneksi);
            }
        }

        // Close the database connection
        mysqli_close($koneksi);
    } else {
        // If the request is not a POST request, send an error response
        echo "Error: Invalid request!";
    }
?>


