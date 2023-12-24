<?php
    // Include database connection file
    include "../conect.php";

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $profile_image = $_POST['profile_image'];
        $nik = $_POST['nik'];

        // Check if profile_image for the given no_ktp already exists
        $checkQuery = "SELECT * FROM biodata WHERE no_ktp = '$nik'";
        $checkResult = mysqli_query($koneksi, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // If a record with the given no_ktp exists, perform an UPDATE query
            $updateQuery = "UPDATE biodata SET profile_image = '$profile_image' WHERE no_ktp = '$nik'";
            if (mysqli_query($koneksi, $updateQuery)) {
                echo "Data updated successfully!";
            } else {
                echo "Error updating data: " . mysqli_error($koneksi);
            }
        } else {
            // If no record with the given no_ktp exists, perform an INSERT query
            $insertQuery = "INSERT INTO biodata (no_ktp, profile_image) VALUES ('$nik', '$profile_image')";
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


