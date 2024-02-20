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
        <div class="page-title">
            <h3>Tasks Today</h3>
        </div>
        <div class="tasks-container">
            <?php
            $username = $fetch['username'];
            date_default_timezone_set('Asia/Manila');
            $currentDate = date('Y-m-d');
            $taskresult = mysqli_query($conn, "SELECT * FROM `all_tasks` WHERE `user_id` = '$user_id' AND `assigned_to` = '$username' AND `status` = 'Ongoing' AND `due_date` = '$currentDate';");
            if (mysqli_num_rows($taskresult) > 0) {
                while ($row = mysqli_fetch_assoc($taskresult)) {
                    echo '<div class="task-model">
                <li class="task-detail">
                    <a href="#">';
                    echo '<a href="#">';
                    if ($row["category"] === "Work") {
                        echo '<i class="bx bx-briefcase-alt-2 icon1"></i>';
                    } elseif ($row['category'] === 'Home') {
                        echo '<i class="bx bx-home-alt icon2"></i>';
                    } elseif ($row['category'] === 'Coding') {
                        echo '<i class="bx bxs-keyboard icon3"></i>';
                    } elseif ($row['category'] === 'Others') {
                        echo '<i class="bx bx-message-dots icon4"></i>';
                    }

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
            ?>

            <div class="separators"></div>
            <li class="task-model">
                <a href="javascript:void(0);" onclick="openCreatePopup()">
                    <i class="bx bx-list-plus bx-flip-vertical icon"></i>
                    <span class="details"> Create New Task</span>
                </a>
            </li>
        </div>
        <div class="task-assigned">
            <h3>Assigned to Me By Others</h3>
        </div>
        <div class="tasks-container">
            <?php
            $username = $fetch['username'];
            $taskresult = mysqli_query($conn, "SELECT * FROM `all_tasks` WHERE `assigned_to` = '$username' AND `status` = 'Ongoing' AND `due_date` = '$currentDate';");
            if (mysqli_num_rows($taskresult) > 0) {
                while ($row = mysqli_fetch_assoc($taskresult)) {
                    if ($row['assigned_by'] != $username) {
                        echo '<div class="task-model">
                <li class="task-detail">
                    <a href="#">';
                        echo '<a href="#">';
                        if ($row["category"] === "Work") {
                            echo '<i class="bx bx-briefcase-alt-2 icon1"></i>';
                        } elseif ($row['category'] === 'Home') {
                            echo '<i class="bx bx-home-alt icon2"></i>';
                        } elseif ($row['category'] === 'Coding') {
                            echo '<i class="bx bxs-keyboard icon3"></i>';
                        } elseif ($row['category'] === 'Others') {
                            echo '<i class="bx bx-message-dots icon4"></i>';
                        }

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
            }
            ?>
        </div>
    </div>
</body>

</html>