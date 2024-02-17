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
            <h3>All Tasks</h3>
        </div>
        <div class="tasks-container">
            <?php
            $taskresult = mysqli_query($conn, "SELECT * FROM `all_tasks`");
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
                    echo '<div class="task-assignedto">Assigned by ' . $row['assigned_by'] . '</div>';
                    echo '</div>';
                }
            }
            ?>

            <div class="separators"></div>
            <li class="task-model">
                <a href="#">
                    <i class="bx bx-list-plus bx-flip-vertical icon"></i>
                    <span class="details"> Create New Task</span>
                </a>
            </li>
        </div>
        <div class="task-assigned">
            <h3>Assigned to Me By Others</h3>
        </div>
        <div class="tasks-container">
            <div class="task-model">
                <li class="task-detail">
                    <a href="#">
                        <i class="bx bx-home-alt icon"></i>
                        <span class="details">Make Coffee</span>
                        <span class="due">(Due: 2020-07-05 00:00:00 am)</span>
                    </a>
                </li>
                <div class="task-assignedto">Assigned by Niel</div>
            </div>
        </div>
    </div>
</body>

</html>