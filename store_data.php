<?php
if (isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];
} else {
    echo "Task ID not provided";
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

    </div>
</body>

</html>