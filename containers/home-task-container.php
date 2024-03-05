<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/container.css">

</head>

<body>

    <div class="task-container">
        <!-- === First Container -->
        <div class="tasks-container">
            <div class="page-title">
                <h4>Home Related Tasks</h4>
            </div>
            <div class="separators"></div>
            <?php
            $username = $fetch['username'];
            $taskresult = mysqli_query($conn, "SELECT * FROM `all_tasks` WHERE `user_id` = '$user_id' AND `assigned_to` = '$username' AND `status` = 'Ongoing' AND category = 'Home';");
            if (mysqli_num_rows($taskresult) > 0) {
                while ($row = mysqli_fetch_assoc($taskresult)) {
                    echo '<div class="task-model">
                <li class="task-detail">';
                    echo '<i class="bx bx-home-alt icon9"></i>';
                    echo '<a href="?page=tasks&task_id=' . $row['task_id'] . '" class="data-link">';
                    echo '<span class="details">' . $row['title'] . '</span>';
                    echo '<span class="due">(Due: ' . $row['due_date'] . ')</span>';

                    echo '</a>
                    </li>';
                    $assigned_by = $row['assigned_by'];
                    $assignedbyresult = mysqli_query($conn, "SELECT * FROM `users_table` WHERE `username` = '$assigned_by';");
                    if (mysqli_num_rows($assignedbyresult) > 0) {
                        while ($assigned = mysqli_fetch_assoc($assignedbyresult)) {
                            echo '<div class="task-assignedto">Assigned by ' . $assigned['firstname'] . '</div>';
                        }
                    }
                    echo '</div>';
                }
            }else{
                echo '<span class="no-task">NO TASKS</span>';
            
            }
            ?>
            <div class="separators"></div>
            <li class="task-model">
                <a href="?page=create">
                    <i class="bx bx-list-plus bx-flip-vertical icon"></i>
                    <span class="details"> Create New Task</span>
                </a>
            </li>
        </div>

        <!-- === Second Container -->
        <div class="tasks-container">
            <div class="task-assigned">
                <h5>Assigned By Others</h5>
            </div>
            <div class="separators"></div>
            <?php
            $username = $fetch['username'];
            $taskresult = mysqli_query($conn, "SELECT * FROM `all_tasks` WHERE `assigned_to` = '$username' AND `status` = 'Ongoing' AND category = 'Home';");
            if (mysqli_num_rows($taskresult) > 0) {
                while ($row = mysqli_fetch_assoc($taskresult)) {
                    if ($row['assigned_by'] != $username) {
                        echo '<div class="task-model">';

                        echo '<li class="task-detail">';
                        echo '<i class="bx bx-home-alt icon9"></i>';
                        echo '<a href="?page=tasks&task_id=' . $row['task_id'] . '" class="data-link">';
                        echo '<span class="details">' . $row['title'] . '</span>';
                        echo '<span class="due">(Due: ' . $row['due_date'] . ')</span>';

                        echo '</a>
                    </li>';
                        $assigned_by = $row['assigned_by'];
                        $assignedbyresult = mysqli_query($conn, "SELECT * FROM `users_table` WHERE `username` = '$assigned_by';");
                        if (mysqli_num_rows($assignedbyresult) > 0) {
                            while ($assigned = mysqli_fetch_assoc($assignedbyresult)) {
                                echo '<div class="task-assignedto">Assigned by ' . $assigned['firstname'] . '</div>';

                            }

                        }
                        echo '</div>';
                    }
                }
            }else{
                echo '<span class="no-task">NO TASKS</span>';
            
            }
            ?>
        </div>



        <!-- === Third Container -->
        <div class="tasks-container">
            <div class="task-assigned">
                <h5>Assigned to Others</h5>
            </div>
            <div class="separators"></div>
            <?php
            $username = $fetch['username'];
            $taskresult = mysqli_query($conn, "SELECT * FROM `all_tasks` WHERE `assigned_by` = '$username' AND `status` = 'Ongoing' AND category = 'Home';");
            if (mysqli_num_rows($taskresult) > 0) {
                while ($row = mysqli_fetch_assoc($taskresult)) {
                    if ($row['assigned_by'] === $username && $row['assigned_to'] != $username) {
                        echo '<div class="task-model">';
                        echo '<li class="task-detail">';
                        echo '<i class="bx bx-home-alt icon9"></i>';
                        echo '<a href="?page=tasks&task_id=' . $row['task_id'] . '" class="data-link">';
                        echo '<span class="details">' . $row['title'] . '</span>';
                        echo '<span class="due">(Due: ' . $row['due_date'] . ')</span>';

                        echo '</a>
                    </li>';
                        $assigned_to = $row['assigned_to'];
                        $assignedbyresult = mysqli_query($conn, "SELECT * FROM `users_table` WHERE `username` = '$assigned_to';");
                        if (mysqli_num_rows($assignedbyresult) > 0) {
                            while ($assigned = mysqli_fetch_assoc($assignedbyresult)) {
                                echo '<div class="task-assignedto">Assigned to ' . $assigned['firstname'] . '</div>';

                            }

                        }
                        echo '</div>';
                    }
                }
            }else{
                echo '<span class="no-task">NO TASKS</span>';
            
            }
            ?>
        </div>
    </div>
</body>

</html>