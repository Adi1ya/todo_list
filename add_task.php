<?php
    include 'connect.php';

    if(isset($_POST['add'])) {
        if(isset($_POST['task']) && !empty($_POST['task'])) {
            $task = $_POST['task'];
            $task = mysqli_real_escape_string($conn, $task);
            // The above PHP funcion is used to Escapes special characters like single quote(') in a string for use in an SQL statement, taking into account the current charset of the connection
        } else {
            header('Location: index.php');
            exit();
        }

        $insert_task = "INSERT INTO `tasks` (`tasks`, `status`) VALUES ('$task', 'Pending')";
        $insert_result = mysqli_query($conn, $insert_task);
        if(!$insert_result) {
            die('Insert Query Failed' .mysqli_error($conn));
        } else {
            header('Location: index.php');
            exit();
        }
    }
?>