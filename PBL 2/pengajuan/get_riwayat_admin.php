<?php

// Include your database connection file
include('../conect.php'); // Replace with the actual filename

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get the nik from the request body
    $key = $_POST['key'];

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM ajuan WHERE no_unik = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('s', $key);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Fetch the data as an associative array
        $data = $result->fetch_assoc();

        // Return the data as JSON
        echo json_encode($data);
    } else {
        // Return an empty JSON object if no data is found
        echo json_encode([]);
    }

    // Close the statement and connection
    $stmt->close();
    $koneksi->close();
} else {
    // Return an error response if the request method is not POST
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'Invalid request method']);
}

?>


