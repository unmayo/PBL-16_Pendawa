<?php
    include '../conect.php';

    $id = $_POST['id']; // Assuming 'id' is the primary key of the 'user_credentials' table
    $NIK = $_POST['NIK'];
    $password = $_POST['password'];

    $sql = "UPDATE user_credentials
            SET
            NIK='$NIK',
            password='$password'
            WHERE
            id='$id'
            ";

    $result = $connect->query($sql);

    echo json_encode(array("success" => $result));
?>

