<?php
    include 'connect.php';

    if(isset($_GET['task_id'])) {
        $deleteId = $_GET['task_id'];

        $delete_query = "DELETE FROM `tasks` WHERE `task_id` = '$deleteId'";
        $delete_result = mysqli_query($conn, $delete_query);
        if(!$delete_result) {
            die('Delete Query Failed' .mysqli_error($conn));
        } else {
            header('Location: index.php');
            exit();
        }
    }

?>