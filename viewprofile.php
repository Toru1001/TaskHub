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
            <img class="prof-img" src="<?php echo 'profile_picture/' . $fetch['img'] ?>" alt="">
            <h3 class="name-holder">
                <?php echo $fetch['firstname'] . " " . $fetch['lastname'] ?>
            </h3>
        </div>
        <div class="profile-details">
            <div class="text">
                <span>First Name:</span>
                <span>Last Name:</span>
                <span>Username:</span>
                <span>Email:</span>
                <span>Password:</span>
            </div>
            <div class="main-details">
                <?php
                echo '<span>' . $fetch['firstname'] . '</span>';
                echo '<span>' . $fetch['lastname'] . '</span>';
                echo '<span>' . $fetch['username'] . '</span>';
                echo '<span>' . $fetch['email'] . '</span>';
                echo '<span><input type="password" class="password" readonly value="' . $fetch['password'] . '"></span>';
                ?>
            </div>
        </div>
        <button class="edit-profilebtn" onclick="openPopup()">Edit Profile</button>
    </div>

    <script>
        function openPopup() {
            document.getElementById('popup-container').style.display = 'block';
        }
        function closePopup() {
            document.getElementById('popup-container').style.display = 'none';
        }
    </script>

</body>

</html>