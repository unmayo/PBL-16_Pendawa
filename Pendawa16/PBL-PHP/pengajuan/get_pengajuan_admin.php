<?php

// Include your database connection file
include('../conect.php'); // Replace with the actual filename

// Remove the check for POST method

$sql = "SELECT * FROM ajuan WHERE status <> 'di tolak' AND konfirmasi_rt = 'yes'"; // Exclude rows with status 'di tolak' and konfirmasi_rt 'no'
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    // Output data as JSON
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
} else {
    echo json_encode(array('error' => 'No data found in ajuan table'));
}

$koneksi->close();
?>





