<?php
    include '../conect.php';

    $id = $_POST['id']; // Assuming 'id' is the primary key of the 'biodata' table

    $sql = "DELETE FROM biodata WHERE id='$id'";
    $result = $connect->query($sql);

    echo json_encode(array("success" => $result));
?>
