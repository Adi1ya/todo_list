<?php

    $hostname = "localhost";
    $username = "root";
    $password = "passdbms@11";
    $dbname = "todo_list";

    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    if(!$conn) {
        die('Connection Failed' .mysqli_error($conn));
    }

?>