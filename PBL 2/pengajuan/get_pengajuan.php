<?php

// Include your database connection file
include('../conect.php'); // Replace with the actual filename

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $no_nik = $_POST['no_nik']; // Assuming you are using POST method to send no_ktp from Flutter

    $sql = "SELECT * FROM ajuan WHERE nik_pengaju = '$no_nik'";
    $result = $koneksi->query($sql);
    
    if ($result->num_rows > 0) {
        // Output data as JSON
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    } else {
        echo json_encode(array('error' => 'Profile not found'));
    }
    
    $koneksi->close();
}
?>


