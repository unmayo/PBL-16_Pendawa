<?php
    include '../conect.php';

    $id = $_POST['id']; // Assuming 'id' is the primary key of the 'user_credentials' table

    $sql = "DELETE FROM user_credentials WHERE id='$id'";
    $result = $connect->query($sql);

    echo json_encode(array("success" => $result));
?>

