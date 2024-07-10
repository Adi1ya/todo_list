<?php
    include 'connect.php';

    if(isset($_GET['task_id'])) {
        $updateId = $_GET['task_id'];

        $update_query = "UPDATE `tasks` SET `status` = 'Done' WHERE `task_id` = '$updateId'";
        $update_result = mysqli_query($conn, $update_query);

        if(!$update_result) {
            die('Update Query Failed' .mysqli_error($conn));
        } else {
            header('Location: index.php');
            exit();
        }
    }

?>