<?php
include 'conect.php';

$target_dir = __DIR__ . '/images/'; // Change this to your target directory
$uploadOk = 1;

// Get 'no_ktp' from POST data
$noKTP = isset($_POST['no_ktp']) ? $_POST['no_ktp'] : '';

// Define an array to store file paths
$filePaths = array();

foreach ($_FILES as $key => $file) {
    // If 'no_ktp' is provided, use it as part of the new filename; otherwise, use a timestamp
    $originalFileName = pathinfo($file["name"], PATHINFO_FILENAME);
    $extension = pathinfo($file["name"], PATHINFO_EXTENSION);
    $newFileName = !empty($noKTP) ? $originalFileName . '.' . $noKTP . '.' . $extension : $originalFileName . '.' . $extension;
    $target_file = $target_dir . $newFileName;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        break; // Stop processing if any file already exists
    }

    // Check file size (optional)
    if ($file["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        break; // Stop processing if any file is too large
    }

    // Allow certain file formats
    $allowedFileTypes = array("jpg", "png", "jpeg", "gif", "pdf");
    if (!in_array($extension, $allowedFileTypes)) {
        echo "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
        $uploadOk = 0;
        break; // Stop processing if any file type is not allowed
    }

    // If all checks pass, move the file and store the path
    if ($uploadOk) {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            $filePaths[$key] = 'images/' . $newFileName;
        } else {
            echo "Sorry, there was an error uploading your file.";
            $uploadOk = 0;
            break; // Stop processing if any error occurs during file upload
        }
    }
}

$koneksi->close();
?>


