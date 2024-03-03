<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
  header('location: login-signup.php');
}
if (isset($_GET['logout'])) {
  unset($session_id);
  session_destroy();
  header('location: login-signup.php');
}

$currentDate = date("Y-m-d");
$updateQuery = "UPDATE `all_tasks` SET status = 'Past-Due' WHERE due_date < '$currentDate'";
mysqli_query($conn, $updateQuery);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TaskHub: To-do List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="styles/style.css" />
  <link rel="stylesheet" href="styles/container.css" />
  <link rel="stylesheet" href="styles/task-details.css" />
</head>

<body>
  <!-- == Header == -->
  <?php
  $select = mysqli_query($conn, "SELECT * FROM `users_table` WHERE id = '$user_id'; ") or die('query failed');
  if (mysqli_num_rows($select) > 0) {
    $fetch = mysqli_fetch_assoc($select);
  }
  ?>

  <header class="header-body">
    <div class="acc-holder">
      <div class="profile">
        <li>
          <a href="javascript:void(0);" onclick="menuToggle();"><img class="prof"
              src="<?php echo 'profile_picture/' . $fetch['img'] ?>" alt="" /></a>
        </li>
      </div>
    </div>

    <div class="prof-menu">
      <h5>
        <?php echo $fetch['firstname'] . ' ' . $fetch['lastname']; ?>
      </h5>
      <div class="separator"></div>
      <ul>
        <li><i class='bx bx-user-circle'></i><a href="?page=profile">My Profile</a></li>
        <li><i class='bx bxs-log-in-circle'></i></i><a href="main.php?logout=<?php echo $user_id; ?>">Logout</a></li>
      </ul>
    </div>
  </header>

  <!-- == Side Bar == -->
  <nav class="sidebar">
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
      <i class="bx bx-chevron-right toggle"></i>
    </header>
    <div class="scrollbar">
      <div class="menu-bar">
        <div class="menu">
          <ul class="menu-links">
            <div class="separator"></div>
            <li class="nav-links">
              <a href="?page=create">
                <i class="bx bx-list-plus bx-flip-vertical icon1"></i>
                <span class="text nav-text"> Create New Task</span>
              </a>
            </li>
            <div class="separator"></div>
            <li class="nav-links">
              <a href="?page=page1">
                <i class="bx bx-list-ul icon2"></i>
                <span class="text nav-text"> All Tasks</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="?page=page2">
                <i class="bx bx-calendar icon3"></i>
                <span class="text nav-text"> Today</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="?page=page3">
                <i class="bx bx-calendar icon4"></i>
                <span class="text nav-text"> Next 7 Days</span>
              </a>
            </li>
            <div class="separator"></div>
            <li class="nav-links">
              <a href="?page=page4">
                <i class="bx bx-calendar-exclamation icon5"></i>
                <span class="text nav-text"> High Priority</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="?page=page5">
                <i class="bx bx-calendar-exclamation icon6"></i>
                <span class="text nav-text"> Medium Priority</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="?page=page6">
                <i class="bx bx-calendar-exclamation icon7"></i>
                <span class="text nav-text"> Low Priority</span>
              </a>
            </li>
            <div class="separator"></div>
            <li class="nav-links">
              <a href="?page=page7">
                <i class="bx bx-briefcase-alt-2 icon8"></i>
                <span class="text nav-text"> Work</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="?page=page8">
                <i class="bx bx-home-alt icon9"></i>
                <span class="text nav-text"> Home</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="?page=page9">
                <i class="bx bxs-keyboard icon10"></i>
                <span class="text nav-text"> Coding</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="?page=page10">
                <i class="bx bx-message-dots icon11"></i>
                <span class="text nav-text"> Others</span>
              </a>
            </li>
            <div class="separator"></div>
            <li class="nav-links">
              <a href="?page=page11">
                <i class='bx bxs-check-square icon12'></i>
                <span class="text nav-text"> Completed</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="?page=page12">
                <i class='bx bxs-message-square-x icon13'></i>
                <span class="text nav-text"> Past-due</span>
              </a>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- == Body == -->
  <section class="content-container">
    <?php
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      if ($page === 'page1') {
        include('containers/all-task-container.php');
      } elseif ($page === 'page2') {
        include('containers/today-all-task-container.php');
      } elseif ($page === 'page3') {
        include('containers/7days-task-container.php');
      } elseif ($page === 'page4') {
        include('containers/highprio-task-container.php');
      } elseif ($page === 'page5') {
        include('containers/midprio-task-container.php');
      } elseif ($page === 'page6') {
        include('containers/lowprio-task-container.php');
      } elseif ($page === 'page7') {
        include('containers/work-task-container.php');
      } elseif ($page === 'page8') {
        include('containers/home-task-container.php');
      } elseif ($page === 'page9') {
        include('containers/coding-task-container.php');
      } elseif ($page === 'page10') {
        include('containers/others-task-container.php');
      } elseif ($page === 'page11') {
        include('containers/completed-task-container.php');
      } elseif ($page === 'page12') {
        include('containers/pastdue-task-container.php');
      } elseif ($page === 'profile') {
        include('viewprofile.php');
      } elseif ($page === 'tasks') {
        include('store_data.php');
      } elseif ($page === 'edit') {
        include('edit-task.php');
      } elseif ($page === 'create') {
        include('create-task.php');
      }
    } else {
      include('containers/all-task-container.php');
    }
    ?>
  </section>

  <!-- === POP-UP Container -->

  <div id="popup-container">
    <?php
    include('edit-profile.php');
    ?>
  </div>

  <script src="main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>