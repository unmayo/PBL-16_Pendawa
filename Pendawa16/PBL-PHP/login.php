<?php
include 'conect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get NIK, password, and KK from POST request
    $nikORktp = $_POST['nikORktp'];
    $password = $_POST['password'];
    $kk = $_POST['kk'];

    // Query to retrieve the hashed password, admin status, and rt status for the given KK
    $sqlCredentials = "SELECT id, password, admin, rt FROM user_credentials WHERE kartu_keluarga = '$kk'";
    $resultCredentials = $koneksi->query($sqlCredentials);

    // Check if the query for credentials was successful
    if ($resultCredentials->num_rows > 0) {
        // Fetch the data from the result
        $rowCredentials = $resultCredentials->fetch_assoc();
        $hashedPasswordFromDB = $rowCredentials['password'];
        $isAdmin = $rowCredentials['admin'];
        $isRT = $rowCredentials['rt'];

        // Verify the provided password against the hashed password
        if (password_verify($password, $hashedPasswordFromDB)) {
            // Passwords match, now check in biodata table
            $sqlBiodata = "SELECT * FROM biodata WHERE no_kartu_keluarga = '$kk' AND no_ktp = '$nikORktp'";
            $resultBiodata = $koneksi->query($sqlBiodata);

            // Check if the combination of KK and NIK exists in biodata table
            if ($resultBiodata->num_rows > 0) {
                // User exists, determine the status based on 'admin' and 'rt'
                if ($isAdmin == 'yes') {
                    echo json_encode(['status' => 'admin']);
                } elseif ($isRT == 'yes') {
                    echo json_encode(['status' => 'rtadmin']);
                } else {
                    echo json_encode(['status' => 'success']);
                }
            } else {
                // User doesn't exist in biodata, return error status
                echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
            }
        } else {
            // Passwords don't match, return error status
            echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
        }
    } else {
        // User with KK doesn't exist in user_credentials, return error status
        echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
    }

    // Close the database connection
    $koneksi->close();
}
?>



