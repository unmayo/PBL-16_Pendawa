<?php
// Include database connection file
include "../conect.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $kartu_keluarga = $_POST['kartu_keluarga'];
    $password = $_POST['password'];
    $no_rt = intval($_POST['no_rt']); // Convert to integer

    // Validate input
    if (empty($kartu_keluarga) || empty($password) || empty($no_rt)) {
        // Send an error response if any of the fields are empty
        echo "Error: All fields are required!";
    } else {
        // Check if kartu_keluarga already exists in the database
        $checkQuery = "SELECT * FROM user_credentials WHERE kartu_keluarga = '$kartu_keluarga'";
        $result = mysqli_query($koneksi, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            // If kartu_keluarga already exists, send an error response
            echo "Error: Kartu Keluarga already exists!";
        } else {
            // Hash the password before storing it in the database for security
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // SQL query to insert data into the user_credentials table
            $insertQuery = "INSERT INTO user_credentials (kartu_keluarga, password, no_rt) VALUES ('$kartu_keluarga', '$hashedPassword', $no_rt)";

            // Perform the query
            if (mysqli_query($koneksi, $insertQuery)) {
                // If the query is successful, send a success response
                echo "User signed up successfully!";
            } else {
                // If there is an error in the query, send an error response
                echo "Error: " . mysqli_error($koneksi);
            }
        }
    }

    // Close the database connection
    mysqli_close($koneksi);
} else {
    // If the request is not a POST request, send an error response
    echo "Error: Invalid request!";
}
?>

