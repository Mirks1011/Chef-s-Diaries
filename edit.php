<?php
session_start();
include("php/config.php");

// Redirect to login if session is not valid
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['ID'])) {
    echo "Session ID not set. Please log in.";
    exit();
}

$id = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/edit.css">
    <link rel="stylesheet" href="CSS/userindex.css">
    <link rel="stylesheet" href="./Icons/boxicons-2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="./Icons/fontawesome-free-6.6.0-web/css/all.css">
    <title>Edit Profile</title>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="Temp logo.png" alt="Group 7's Logo">
                </span>
                <div class="text header-text">
                    <span class="name">CHEF'S Corner</span>
                </div>
            </div>
            <i class="bx bxs-chevrons-right toggle"></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class="bx bx-search icons"></i>
                    <input type="search" placeholder="What ya lookin' for?">
                </li>
                <li class="nav-link">
                    <a href="userindex.php">
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
                    <a href="profile.php">
                        <i class="fa-solid fa-user icons"></i>
                        <span class="text nav-text">Your Profile</span>
                    </a>
                </li>
                <li class="logout">
                    <a href="php/logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="text nav-text">Log Out</span>
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
    <div class="wrapper">
        <?php
        if (isset($_POST['submit'])) {
            $file_name = $_FILES['image']['name'];
            $tempname = $_FILES['image']['tmp_name'];
            $folder = 'Images/' . $file_name;

            $query = mysqli_query($con, "UPDATE images SET file = '$file_name' WHERE ID=$id");
            if ($query && move_uploaded_file($tempname, $folder)) {
                echo "<h2>FILE UPLOADED SUCCESSFULLY</h2>";
            } else {
                echo "<h2>ERROR: " . mysqli_error($con) . "</h2>";
            }
        }

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];

            $edit_query = mysqli_query($con, "UPDATE users_tbl SET username='$username', email='$email' WHERE ID=$id");
            if ($edit_query) {
                echo "<div class='message'><p>Updated successfully</p></div><br>";
                echo "<a href='profile.php'><button class='btn'>GO BACK</button></a>";
            } else {
                echo "<h2>ERROR: " . mysqli_error($con) . "</h2>";
            }
        } else {
            $query = mysqli_query($con, "SELECT * FROM users_tbl WHERE ID=$id");
            if ($result = mysqli_fetch_assoc($query)) {
                $res_uname = $result['username'];
                $res_email = $result['email'];
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <h1>Edit Details</h1>
                <?php
                $res = mysqli_query($con, "SELECT * FROM images WHERE ID = $id");
                if ($row = mysqli_fetch_assoc($res)) {
                    echo '<div class="container">
                        <div class="pfp">
                            <img src="Images/' . $row['file'] . '" alt="A PHOTO OF THE USER">
                        </div>
                    </div>';
                } else {
                    echo "<p>No profile picture uploaded.</p>";
                }
                ?>
                <div class="input-box">
                    <input type="text" name="username" placeholder="USERNAME" id="username"
                        value="<?php echo $res_uname; ?>" autocomplete="off">
                    <i class="fa-regular fa-user"></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="EMAIL" id="email" value="<?php echo $res_email; ?>"
                        autocomplete="off">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="upload">
                    <input type="file" name="image">
                    <br><br>
                </div>
                <button type="submit" name="submit" class="btn">UPDATE</button>
            </form>
        <?php } ?>
    </div>
    <script src="JS/script.js"></script>
</body>

</html>