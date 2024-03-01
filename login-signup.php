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

if (isset($_POST['regsubmit'])) {

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $repass = mysqli_real_escape_string($conn, $_POST['repassword']);
    $img = $_FILES['img']['name'];
    $img_size = $_FILES['img']['size'];
    $img_tmp_name = $_FILES['img']['tmp_name'];
    $img_folder = 'profile_picture/' . $img;
    $good_message = 'Account Created!';
    $select = mysqli_query($conn, "SELECT * FROM `users_table` WHERE email = '$email' AND username = '$username';") or die('Query Failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'Username or email already exist';
    } else {
        if ($pass != $repass) {
            $message[] = 'Password does not match';
        } elseif ($img_size > 2000000) {
            $message[] = 'Image size is too large!';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO `users_table` (firstname, lastname, username, email, password, img) VALUES ('$firstname', '$lastname', '$username', '$email', '$pass', '$img');") or die('Query failed');


            if ($insert) {
                move_uploaded_file($img_tmp_name, $img_folder);
                $message[] = $good_message;
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskHub: Sign-In</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles/login-signup.css">
</head>

<body>
    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="error-message">' . $message . '</div>';
        }
    }
    ?>
    <div class="container">

        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form" method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($message)) {
                        if (is_array($message) || is_object($message)) {
                            foreach ($message as $msg) {
                                echo '<div class="error-message">' . $msg . '</div>';
                            }
                        } else {
                            echo '<div class="error-message">' . $message . '</div>';
                        }
                    }
                    ?>
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <input name="submit" type="submit" value="Login" class="btn solid">
                </form>


                <form action="" class="sign-up-form" method="post" enctype="multipart/form-data">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="firstname" placeholder="Firstname" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="lastname" placeholder="Lastname" required>
                    </div>
                    <div class="input-field">
                        <i class='bx bx-user icons'></i>

                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-field">
                        <i class='bx bxs-envelope icons'></i>
                        <input type="text" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-field">
                        <i class='bx bxs-lock-alt icons'></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="input-field">
                        <i class='bx bxs-lock-alt icons'></i>
                        <input type="password" name="repassword" placeholder="Re-enter Password" required>
                    </div>
                    <h5>Select Profile Picture:</h5>
                    <div class="input-field">
                        <i class='bx bxs-camera'></i>
                        <input name="img" type="file" class="file-container" accept="image/jpg, image/jpeg, image/png"
                            required>
                    </div>
                    <input type="submit" name="regsubmit" value="Login" class="btn solid">
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New Here?</h3>
                    <p>"TaskHub: Your go-to solution for effortless task management, keeping you organized and
                        productive with a simple and intuitive to-do list interface."</p>
                    <button class="btn transparent" id="sign-up-btn">Sign Up</button>
                </div>
                <img src="img/logo.png" class="image" alt="">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Already have an account?</h3>
                    <p>"TaskHub: Your go-to solution for effortless task management, keeping you organized and
                        productive with a simple and intuitive to-do list interface."</p>
                    <button class="btn transparent" id="sign-in-btn">Sign In</button>
                </div>
                <img src="img/logo.png" class="image" alt="">
            </div>
        </div>
    </div>
    <script src="login-signup.js"></script>
</body>

</html>