<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $select = mysqli_query($conn, "SELECT * FROM `users_table` WHERE username = '$username' AND password = '$pass';") or die('Query Failed');
    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('location: main.php');
        exit();
    } else {
        $message[] = 'Username or password incorrect';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TaskHub: Login</title>
    <link rel="stylesheet" href="styles/loginform.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body style="background: url('img/glenn-carstens-peters-RLw-UC03Gwc-unsplash.jpg') no-repeat ;
    min-height: 100vh;
    background-size: cover;
    background-position: center;">

    <header>
        <div class="image-text">
            <span class="image">
                <img src="img/logo.png" alt="logo.png" />
            </span>
            <div class="text header-text">
                <span class="name">TaskHub:</span>
                <span class="profession">To-do List</span>
            </div>
        </div>
    </header>


    <div class="form-container">
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '<div class="error-message">' . $message . '</div>';
            }
        }
        ?>
        <h2>Sign-in</h2>
        <div class="icon-container">
            <i class='bx bxs-user icons'></i>
            <i class='bx bxs-lock-alt icons'></i>
        </div>
        <form class="forms" action="" method="post" enctype="multipart/form-data">
            <input type="text" name="username" placeholder="Username" class="field" required>
            <input type="password" name="password" placeholder="Password" class="field" required>
            <input name="submit" type="submit" value="Sign-In" class="submit-btn">
            <p>Don't have an account? <a href="registration.php">Register Now!</a></p>
        </form>
    </div>
</body>

</html>