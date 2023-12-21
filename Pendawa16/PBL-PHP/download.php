<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'download_pdf') {
        // Send the file in the response
        $filePath = $_POST['filePath'];
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        readfile($filePath);
    } else {
        // Handle other actions if needed
        echo 'Invalid action';
    }
} else {
    echo 'Invalid request method';
}
?>

