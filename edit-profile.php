<?php
include 'config.php';

if (isset($_POST['submit'])) {

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $repass = mysqli_real_escape_string($conn, $_POST['repassword']);
    $img = $_FILES['img']['name'];
    $img_size = $_FILES['img']['size'];
    $img_folder = 'profile_picture/' . $img;
    $good_message = 'Account Updated!';
    $img_tmp_name = $_FILES['img']['tmp_name'];
    $select = mysqli_query($conn, "SELECT * FROM `users_table` WHERE id = '$user_id';") or die('Query Failed');

    $firstname = empty($firstname) ? $fetch['firstname'] : $firstname;
    $lastname = empty($lastname) ? $fetch['lastname'] : $lastname;
    $username = empty($username) ? $fetch['username'] : $username;
    $email = empty($email) ? $fetch['email'] : $email;
    $pass = empty($pass) ? $fetch['password'] : $pass;
    $repass = empty($repass) ? $fetch['password'] : $pass;

    if ($pass != $repass) {
        $message[] = 'Password does not match';
    } elseif ($img_size > 2000000) {
        $message[] = 'Image size is too large!';
    } else {

        if (!empty($img)) {
            if (move_uploaded_file($img_tmp_name, $img_folder)) {
                $update = mysqli_query($conn, "UPDATE users_table SET firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', password = '$pass', img = '$img' WHERE id = '$user_id';") or die('Query failed');
                echo '<script>document.body.innerHTML = "<div style=\'text-align: center; margin-top: 20%;\'><h2>Loading...</h2></div>";
                    setTimeout(function() {
                        window.location.href = "' . $_SERVER['PHP_SELF'] . '";
                    }, 1);</script>';
            } else {
                $message[] = 'Error moving the uploaded file';
            }
        } else {
            $update = mysqli_query($conn, "UPDATE users_table SET firstname = '$firstname', lastname = '$lastname', username = '$username', email = '$email', password = '$pass' WHERE id = '$user_id';") or die('Query failed');
            echo '<script>document.body.innerHTML = "<div style=\'text-align: center; margin-top: 20%;\'><h2>Loading...</h2></div>";
                    setTimeout(function() {
                    window.location.href = "' . $_SERVER['PHP_SELF'] . '";
                    }, 1);</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <div class="edit-profile-container">
        <h2>Edit Profile</h2>
        <?php
        if (isset($message)) {
            foreach ($message as $message) {
                if ($message === $good_message) {
                    echo '<div class="good-message">' . $message . '</div>';
                } else {
                    echo '<div class="error-message">' . $message . '</div>';
                }
            }
        }
        ?>
        <div class="icon-container">
            <i class='bx bx-user icons'></i>
            <i class='bx bx-user icons'></i>
            <i class='bx bxs-user icons'></i>
            <i class='bx bxs-envelope icons'></i>
            <i class='bx bxs-lock-alt icons'></i>
            <i class='bx bxs-lock-alt icons'></i>
        </div>
        <form class="forms" action="" method="post" enctype="multipart/form-data">
            <input type="text" name="firstname" placeholder="<?php echo $fetch['firstname'] ?>" class="field">
            <input type="text" name="lastname" placeholder="<?php echo $fetch['lastname'] ?>" class="field">
            <input type="text" name="username" placeholder="<?php echo $fetch['username'] ?>" class="field">
            <input type="email" name="email" placeholder="<?php echo $fetch['email'] ?>" class="field">
            <input type="password" name="password" placeholder="Password" class="field">
            <input type="password" name="repassword" placeholder="Confirm Password" class="field">
            <p>Select Profile Picture</p>
            <input name="img" type="file" class="file-container" accept="image/jpg, image/jpeg, image/png">
            <input name="submit" type="submit" value="Apply Changes" class="submit-btn">
        </form>
    </div>

</body>

</html>