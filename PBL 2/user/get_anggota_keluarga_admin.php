<?php

// Include your database connection file
include('../conect.php'); // Replace with the actual filename

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming you're sending the 'rt' parameter from Flutter
    $rt = $_POST['rt'];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM biodata WHERE no_rt = ?";
    $stmt = $koneksi->prepare($sql);
    
    // Bind the parameter
    $stmt->bind_param('s', $rt);
    
    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output data as JSON
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    } else {
        echo json_encode(array('error' => 'No profiles found for the specified rt'));
    }

    // Close the statement
    $stmt->close();
} else {
    echo json_encode(array('error' => 'Invalid request method'));
}

// Close the database connection
$koneksi->close();
?>




