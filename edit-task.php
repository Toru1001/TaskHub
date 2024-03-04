<?php
include 'config.php';


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
    $status = $retrieve['status'];
}

if (isset($_POST['edittask'])) {
    $newtitle = mysqli_real_escape_string($conn, $_POST['title']);
    $newdescription = mysqli_real_escape_string($conn, $_POST['description']);
    $newcategory = isset($_POST['category']) ? mysqli_real_escape_string($conn, $_POST['category']) : null;
    $newdue_date = mysqli_real_escape_string($conn, $_POST['date']);
    $newpriority = isset($_POST['priority']) ? mysqli_real_escape_string($conn, $_POST['priority']) : null;
    $newassigned_by = $fetch['username'];
    $newassigned_to = isset($_POST['assignee']) ? mysqli_real_escape_string($conn, $_POST['assignee']) : null;
    $newstatus = 'Ongoing';
    echo $newpriority;

    $taskdetails = mysqli_query($conn, "SELECT * FROM `all_tasks` WHERE `task_id` = '$task_id';");
    if (mysqli_num_rows($taskdetails) > 0) {
        $retrieve = mysqli_fetch_assoc($taskdetails);
        $newtitle = empty($newtitle) ? $retrieve['title'] : $newtitle;
        $newdescription = empty($newdescription) ? $retrieve['description'] : $newdescription;
        $newcategory = empty($newcategory) ? $retrieve['category'] : $newcategory;
        $newdue_date = empty($newdue_date) ? $retrieve['due_date'] : $newdue_date;
        $newpriority = empty($newpriority) ? $retrieve['priority'] : $newpriority;
        $newassigned_to = empty($newassigned_to) ? $retrieve['assigned_to'] : $newassigned_to;

        $update = mysqli_query($conn, "UPDATE `all_tasks` SET 
            title = '$newtitle',
            description = '$newdescription',
            category = '$newcategory',
            due_date = '$newdue_date',
            priority = '$newpriority',
            assigned_to = '$newassigned_to',
            status = '$newstatus'
            WHERE task_id = $task_id") or die('Query failed');
    }
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
    <link rel="stylesheet" href="styles/create-task.css">
</head>

<body>

    <div class="create-task-container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="top">
                <span class="create-texts">Task Title</span>
                <input type="text" name="title" class="field" placeholder="<?php echo $title; ?>">
                <span class="create-texts">Description</span>
                <textarea name="description" class="description" cols="40" rows="7"
                    placeholder="<?php echo $description; ?>"></textarea>
            </div>
            <div class="lower">
                <div class="text">
                    <span class="create-texts">Category</span>
                    <span class="create-texts">Due Date</span>
                    <span class="create-texts">Priority Level</span>
                    <span class="create-texts">Assign to</span>
                </div>
                <div class="info">
                    <select name="category" class="category">
                        <option value="" disabled selected>
                            <?php echo $category; ?>
                        </option>
                        <option value="Work">Work</option>
                        <option value="Home">Home</option>
                        <option value="Coding">Coding</option>
                        <option value="Others">Others</option>
                    </select>
                    <input type="date" class="date" name="date">
                    <select name="priority" class="priority">
                        <option value="" disabled selected>
                            <?php echo $priority; ?>
                        </option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                    <select name="assignee" class="assignee">
                        <option value="" disabled selected>
                            <?php $assignedbyresult = mysqli_query($conn, "SELECT * FROM `users_table` WHERE `username` = '$assigned_by';");
                            if (mysqli_num_rows($assignedbyresult) > 0) {
                                while ($assigned = mysqli_fetch_assoc($assignedbyresult)) {
                                    echo $assigned['firstname'] . ' ' . $assigned['lastname'];
                                }
                            } ?>
                        </option>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM `users_table`");
                        if ($result) {
                            while ($row = mysqli_fetch_array($result)) {
                                if ($row['username'] == $fetch['username']) {
                                    echo '<option value="' . $row['username'] . '" aria-placeholder="Select name">Self</option>';
                                } else {
                                    echo '<option value="' . $row['username'] . '" aria-placeholder="Select name">' . $row['firstname'] . ' ' . $row['lastname'] . '</option>';
                                }
                            }

                        }
                        ?>
                    </select>
                </div>
            </div>
            <input name="edittask" type="submit" value="Edit Task" class="submit-btn">
        </form>
    </div>

</body>

</html>