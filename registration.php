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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TaskHub: Login</title>
  <link rel="stylesheet" href="styles/signupform.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body style="background: url('img/glenn-carstens-peters-RLw-UC03Gwc-unsplash.jpg') no-repeat ;
    min-height: 100vh;
    background-size: cover;
    background-position: center;">

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
  <div class="form-container">
    <h2>Sign-Up</h2>
    <div class="icon-container">
      <i class='bx bx-user icons'></i>
      <i class='bx bx-user icons'></i>
      <i class='bx bxs-user icons'></i>
      <i class='bx bxs-envelope icons'></i>
      <i class='bx bxs-lock-alt icons'></i>
      <i class='bx bxs-lock-alt icons'></i>
    </div>
    <form class="forms" action="" method="post" enctype="multipart/form-data">
      <input type="text" name="firstname" placeholder="First Name" class="field" required>
      <input type="text" name="lastname" placeholder="Last Name" class="field" required>
      <input type="text" name="username" placeholder="Username" class="field" required>
      <input type="email" name="email" placeholder="Email" class="field" required>
      <input type="password" name="password" placeholder="Password" class="field" required>
      <input type="password" name="repassword" placeholder="Confirm Password" class="field" required>
      <p>Select Profile Picture</p>
      <input name="img" type="file" class="file-container" accept="image/jpg, image/jpeg, image/png">
      <input name="submit" type="submit" value="Sign-Up" class="submit-btn">
      <p>Already have an account? <a href="login.php">Login Now!</a></p>
    </form>
  </div>


</body>

</html>