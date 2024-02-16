<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/container.css" />
  </head>
  <body>
    <!-- == Header == -->

    <header class="header-body">
      <div class="acc-holder">
        <div class="profile">
          <li>
            <a href="#"><img class="prof" src="img/logo.png" alt="" /></a>
          </li>
          <li><a id="name" href="#">Name Holder</a></li>
        </div>
        <li><button class="btnlogout">Log-out</button></li>
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
              <a href="#">
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
              <a href="#">
                <i class="bx bx-calendar icon3"></i>
                <span class="text nav-text"> Today</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="?page=page2">
                <i class="bx bx-calendar icon4"></i>
                <span class="text nav-text"> Next 7 Days</span>
              </a>
            </li>
            <div class="separator"></div>
            <li class="nav-links">
              <a href="#">
                <i class="bx bx-calendar-exclamation icon5"></i>
                <span class="text nav-text"> High Priority</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="#">
                <i class="bx bx-calendar-exclamation icon6"></i>
                <span class="text nav-text"> Medium Priority</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="#">
                <i class="bx bx-calendar-exclamation icon7"></i>
                <span class="text nav-text"> Low Priority</span>
              </a>
            </li>
            <div class="separator"></div>
            <li class="nav-links">
              <a href="#">
                <i class="bx bx-briefcase-alt-2 icon8"></i>
                <span class="text nav-text"> Work</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="#">
                <i class="bx bx-home-alt icon9"></i>
                <span class="text nav-text"> Home</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="#">
                <i class="bx bxs-keyboard icon10"></i>
                <span class="text nav-text"> Coding</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="#">
                <i class="bx bx-message-dots icon11"></i>
                <span class="text nav-text"> Others</span>
              </a>
            </li>
            <div class="separator"></div>
            <li class="nav-links">
              <a href="#">
              <i class='bx bxs-check-square icon12'></i>
                <span class="text nav-text"> Completed</span>
              </a>
            </li>
            <li class="nav-links">
              <a href="#">
              <i class='bx bx-calendar-exclamation icon13' ></i>
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
      $today = "Today";
      include('test.php');
    }
  }
  ?>
</section>

    <script>
      const body = document.querySelector("body"),
        sidebar = body.querySelector(".sidebar"),
        header = body.querySelector(".header-body"),
        container = body.querySelector(".content-container"),
        toggle = body.querySelector(".toggle");

      toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
      });
      toggle.addEventListener("click", () => {
        header.classList.toggle("close");
      });
      toggle.addEventListener("click", () => {
        container.classList.toggle("close");
      });
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
