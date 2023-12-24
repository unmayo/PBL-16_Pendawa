<?php

// Include your database connection file
include('../conect.php'); // Replace with the actual filename

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get the no_unik value from the HTTP POST request
    $noUnik = $_POST['no_unik'];

    // SQL to update the status to 'di tolak' for the record with the specified no_unik
    $sql = "UPDATE ajuan SET konfirmasi_rt = 'yes' WHERE no_unik = '$noUnik'";

    if ($koneksi->query($sql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $koneksi->error;
    }

// Close the database connection
$koneksi->close();
} else {
    // Return an error response if the request method is not POST
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Invalid request method']);
}

?>


