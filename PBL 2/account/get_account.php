<?php
    include '../conect.php';

    $role = $_POST['role'];

    $sql = "SELECT * FROM user_credentials WHERE role='$role'";
    
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;            
        }
        echo json_encode(array(
            "success" => true,
            "users" => $users,
        ));
    } else {
        echo json_encode(array(
            "success" => false,
        ));
    }
?>


