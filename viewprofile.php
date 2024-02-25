<?php
include 'config.php';
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

    <div class="profile-container">
        <div class="profile-picture">
            <div class="img-container">
                <img class="prof-img" src="<?php echo 'profile_picture/' . $fetch['img'] ?>" alt="">
            </div>
            <h3 class="name-holder">
                <?php echo $fetch['firstname'] . " " . $fetch['lastname'] ?>
            </h3>
        </div>
        <div class="profile-details">
            <div class="text">
                <?php
                echo '<span class="text-details">First Name:</span>';
                echo '<span class="main-details">' . $fetch['firstname'] . '</span>';
                echo '<span class="text-details">Last Name:</span>';
                echo '<span class="main-details">' . $fetch['lastname'] . '</span>';
                echo '<span class="text-details">Username:</span>';
                echo '<span class="main-details">' . $fetch['username'] . '</span>';
                echo '<span class="text-details">Email:</span>';
                echo '<span class="main-details">' . $fetch['email'] . '</span>';
                echo '<span class="text-details">Password:</span>';
                echo '<span class="main-details"><input type="password" class="password" readonly value="' . $fetch['password'] . '"></span>';
                ?>
            </div>
        </div>
        <button class="edit-profilebtn" onclick="openPopup()">Edit Profile</button>
    </div>

</body>

</html>