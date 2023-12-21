<?php

// Include your database connection file
include('../conect.php'); // Replace with the actual filename

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve the no_rt value from the POST request and convert to int
    $noRtValue = isset($_POST['no_rt']) ? (int)$_POST['no_rt'] : 0;

    // Add the condition for the 'no_rt' column and remove the check for POST method
    $sql = "SELECT * FROM ajuan WHERE status <> 'di tolak' AND no_rt = $noRtValue"; // No need for quotes around $noRtValue
    $result = $koneksi->query($sql);

    if ($result->num_rows > 0) {
        // Output data as JSON
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    } else {
        echo json_encode(array('error' => 'No data found in ajuan table with valid no_rt and status <> di tolak'));
    }

    $koneksi->close();
} else {
    // Handle non-POST requests
    echo json_encode(array('error' => 'Invalid request method. Only POST requests are allowed.'));
}
?>






