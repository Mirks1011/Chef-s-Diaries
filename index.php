<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CHEF'S Corner</title>
    <!----------MY CSS---------------->
    <link rel="stylesheet" href="CSS/style.css" />

    <!--------ICONS---------------->
    <link rel="stylesheet" href="./Icons/boxicons-2.1.4/css/boxicons.min.css" />
    <link
      rel="stylesheet"
      href="./Icons/fontawesome-free-6.6.0-web/css/all.css"
    />
  </head>
  <body>
    <nav class="sidebar close">
      <header>
        <div class="image-text">
          <span class="image">
            <img src="Temp logo.png" alt="Group 7's Logo" />
          </span>

          <div class="text header-text">
            <span class="name"> CHEF'S Corner</span>
          </div>
        </div>
        <i class="bx bxs-chevrons-right toggle"></i>
      </header>
      <div class="menu-bar">
        <div class="menu">
          <li class="search-box">
            <i class="bx bx-search icons"></i>
            <input type="search" placeholder="What ya lookin' for?" />
          </li>

          <li class="nav-link">
            <a href="index.php">
              <i class="bx bx-home-smile icons"></i>
              <span class="text nav-text">Home</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="recipe.html">
              <i class="fa-solid fa-utensils icons"></i>
              <span class="text nav-text">Recipe</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="recipe.html">
              <i class="fa-solid fa-video icons"></i>
              <span class="text nav-text">Video Tutorials</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="recipe.html">
              <i class="fa-regular fa-calendar-check icons"></i>
              <span class="text nav-text">Planner</span>
            </a>
          </li>
        </div>
        <div class="bottom-content">
          <li class="">
            <a href="login.php">
              <i class="fa-solid fa-user icons"></i>
              <span class="text nav-text">Log-in</span>
            </a>
          </li>
          <li class="mode">
            <div class="moon-sun-icon">
              <i class="fa-solid fa-moon icons moon"></i>
              <i class="fa-solid fa-sun icons sun"></i>
            </div>
            <span class="text mode-text">Dark Mode</span>
            <div class="toggle-switch">
              <span class="switch"></span>
            </div>
          </li>
        </div>
      </div>
    </nav>
    <script src="JS/script.js"></script>
  </body>
</html>
