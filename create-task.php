<?php
include 'config.php';
if (isset($_POST['submittask'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $username = $fetch['username'];
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $due_date = mysqli_real_escape_string($conn, $_POST['date']);
    $priority = mysqli_real_escape_string($conn, $_POST['priority']);
    $assigned_by = $fetch['username'];
    $assigned_to = mysqli_real_escape_string($conn, $_POST['assignee']);
    $status = 'Ongoing';
    $insert = mysqli_query($conn, "INSERT INTO `all_tasks` (user_id, username, title, description, category, due_date, priority, assigned_by, assigned_to, status) VALUES ('$user_id', '$username', '$title', '$description', '$category', '$due_date', '$priority', '$assigned_by', '$assigned_to', '$status');") or die('Query failed');
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
                <input type="text" name="title" class="field" required>
                <span class="create-texts">Description</span>
                <textarea name="description" class="description" cols="40" rows="7"></textarea>
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
                        <option value="Work">Work</option>
                        <option value="Home">Home</option>
                        <option value="Coding">Coding</option>
                        <option value="Others">Others</option>
                    </select>
                    <input type="date" class="date" name="date" required>
                    <select name="priority" class="priority" required>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                    <select name="assignee" class="assignee">

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
            <input name="submittask" type="submit" value="Create" class="submit-btn">
        </form>
    </div>

</body>

</html>