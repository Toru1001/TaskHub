<?php
include("config.php");

if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
} else {
    echo "Task ID not provided";
}

$taskdetails = mysqli_query($conn, "SELECT * FROM `all_tasks` WHERE `task_id` = '$task_id';");
if (mysqli_num_rows($taskdetails) > 0) {
    $retrieve = mysqli_fetch_assoc($taskdetails);
    $title = $retrieve['title'];
    $description = $retrieve['description'];
    $category = $retrieve['category'];
    $due_date = $retrieve['due_date'];
    $priority = $retrieve['priority'];
    $assigned_by = $retrieve['assigned_by'];
    $assigned_to = $retrieve['assigned_to'];
    $status = $retrieve['status'];
}

if (isset($_POST['delete'])) {
    $delete = mysqli_query($conn, "DELETE FROM `all_tasks` WHERE `task_id` = '$task_id';");
    echo '<script>document.body.innerHTML = "<div style=\'text-align: center; margin-top: 20%;\'><h2>Loading...</h2></div>";
    setTimeout(function() {
    window.location.href = "' . $_SERVER['PHP_SELF'] . '";
    }, 1);</script>';
}

if (isset($_POST['complete'])) {
    $update = mysqli_query($conn, "Update `all_tasks` SET status = 'Completed' WHERE `task_id` = '$task_id';");
    echo '<script>document.body.innerHTML = "<div style=\'text-align: center; margin-top: 20%;\'><h2>Loading...</h2></div>";
    setTimeout(function() {
    window.location.href = "' . $_SERVER['PHP_SELF'] . '";
    }, 1);</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="main.js"></script>
</head>

<body>
    <div class="task-details-container">
        <h2 class="title">Task Details</h2>
        <div class="details-container">
            <h5 class="title-details">Title:</h5>
            <span class="detail">
                <?php echo $title; ?>
            </span>
            <h5 class="title-details">Description:</h5>
            <span class="detail-description">
                <?php echo $description; ?>
            </span>
            <h5 class="title-details">Category:</h5>
            <span class="detail">
                <?php
                if ($category === "Work") {
                    echo '<i class="bx bx-briefcase-alt-2 icon1"></i>';
                } elseif ($category === 'Home') {
                    echo '<i class="bx bx-home-alt icon2"></i>';
                } elseif ($category === 'Coding') {
                    echo '<i class="bx bxs-keyboard icon3"></i>';
                } elseif ($category === 'Others') {
                    echo '<i class="bx bx-message-dots icon4"></i>';
                }
                ?>
                <span class="text-details">
                    <?php
                    echo $category;
                    ?>
                </span>
            </span>
            <h5 class="title-details">Due Date:</h5>
            <span class="detail">
                <i class="bx bx-calendar icon6"></i>
                <span class="text-details">
                    <?php
                    echo $due_date;
                    ?>
                </span>
            </span>
            <h5 class="title-details">Priority:</h5>
            <span class="detail">
                <?php
                if ($priority === "High") {
                    echo '<i class="bx bx-calendar-exclamation icon7"></i>';
                } elseif ($priority === "Medium") {
                    echo '<i class="bx bx-calendar-exclamation icon8"></i>';
                } elseif ($priority === "Low") {
                    echo '<i class="bx bx-calendar-exclamation icon9"></i>';
                }
                ?>
                <span class="text-details">
                    <?php
                    echo $priority . ' Priority';
                    ?>
                </span>
            </span>
            </span>
            <h5 class="title-details">Assigned by:</h5>
            <span class="detail">
                <i class='bx bxs-user-rectangle icon12'></i>
                <span class="text-details">
                    <?php
                    $assignedbyresult = mysqli_query($conn, "SELECT * FROM `users_table` WHERE `username` = '$assigned_by';");
                    if (mysqli_num_rows($assignedbyresult) > 0) {
                        while ($assigned = mysqli_fetch_assoc($assignedbyresult)) {
                            echo $assigned['firstname'] . ' ' . $assigned['lastname'];
                        }
                    }
                    ?>
                </span>
            </span>
            <h5 class="title-details">Status:</h5>
            <span class="detail">
                <?php
                if ($status === "Ongoing") {
                    echo '<i class="bx bxs-circle-three-quarter icon10"></i>';
                } elseif ($status === "Completed") {
                    echo '<i class="bx bxs-check-circle icon11" ></i>';
                } elseif ($status === "Past-Due") {
                    echo '<i class="bx bxs-message-square-x icon13"></i>';
                }
                ?>
                <?php
                echo $status;
                ?>
            </span>
        </div>

        <div class="button-holder">
            <form action="" method="post" enctype="multipart/form-data">
                <?php
                $username = $fetch['username'];
                if ($status === 'Past-Due') {
                    if ($assigned_by != $username && $assigned_to === $username) {

                    } elseif ($assigned_by === $username && $assigned_to === $username) {
                        echo '<input type="submit" class="btn btn-danger me-md-3" name="delete" value="Delete Task"></input>';

                    } else {
                        echo '<a href="?page=edit&task_id= ' . $task_id . '" class="btn btn-secondary me-md-3" name="edit">Edit Task</a>';
                        echo '<input type="submit" class="btn btn-danger me-md-3" name="delete" value="Delete Task"></input>';
                    }
                } elseif ($status === 'Completed') {

                } elseif ($status === 'Ongoing') {
                    if ($assigned_by != $username && $assigned_to === $username) {
                        echo '<input type="submit" class="btn btn-danger me-md-3" name="delete" value="Delete Task"></input>';
                        echo '<input type="submit" class="btn btn-success me-md-3" name="complete" value="Task Completed"></input>';
                    } else {
                        echo '<a href="?page=edit&task_id= ' . $task_id . '" class="btn btn-secondary me-md-3" name="edit">Edit Task</a>';
                        echo '<input type="submit" class="btn btn-danger me-md-3" name="delete" value="Delete Task"></input>';
                        echo '<input type="submit" class="btn btn-success me-md-3" name="complete" value="Task Completed"></input>';
                    }
                }

                ?>
            </form>
        </div>

    </div>
</body>

</html>