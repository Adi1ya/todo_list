<?php
    include 'connect.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" type="text/css" href="style.css" />

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav>
        <a href="#" class="heading">ToDo App</a>
    </nav>

    <div class="container">
        <div class="input-area">
            <form action="add_task.php" method="POST">
                <input type="text" name="task" id="task" placeholder="write your tasks here..." autocomplete="off">
                <button class="btn" name="add">Add Task</button>
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tasks</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM `tasks`";
                    $result = mysqli_query($conn, $query);
                    $serialNo = 1;
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $serialNo++; ?></td>
                            <td><?php echo $row['tasks']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td colspan="2" class="action">
                                <?php
                                    if($row['status'] != "Done") {
                                echo '<a href="update_tast.php?task_id=' .$row['task_id']. '"><i class="fa-solid fa-square-check custom-color-check"></i></a>';
                                }
                                ?>
                                <a href="delete_task.php?task_id=<?php echo $row['task_id']; ?>"><i class="fa-solid fa-square-xmark custom-color-xmark"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>