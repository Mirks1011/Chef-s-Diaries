<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/loginstyle.css" />
    <link rel="stylesheet" href="./Icons/fontawesome-free-6.6.0-web/css/all.css" />
    <script src="JS/enterbind.js"></script>
    <title>CHEF'S Corner Login</title>
</head>

<body>
    <div class="wrapper">
        <?php
        include("php/config.php");

        if (isset($_POST['submit'])) {
            $username = mysqli_real_escape_string($con, $_POST['username']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $result = mysqli_query($con, "SELECT * FROM users_tbl WHERE username='$username' AND Password='$password'") or die("AN ERROR HAS OCCURRED");
            $row = mysqli_fetch_assoc($result);

            if (is_array($row) && !empty($row)) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['ID'] = $row['ID'];
                $_SESSION['valid'] = true;

                header("Location: userindex.php");
                exit();
            } else {
                print "<div class='message'><p>WRONG USERNAME OR PASSWORD</p></div><br>";
                print "<a href='login.php'><button class='btn'> GO BACK</button></a>";
            }
        } else {
            ?>
            <h1>LOGIN</h1>
            <!------LOGIN FUNCTION----->
        <form action="" method="post">
            <div class="input-box">
                <input type="text" name="username" placeholder="USERNAME" id="username" autocomplete="off" />
                <i class="fa-regular fa-user"></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="PASSWORD" id="password" autocomplete="off" />
                <i class="fa-solid fa-lock"></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox" />Remember me</label>
                <a href="forgot-password.php">Forgot Password?</a>
            </div>

            <button type="submit" name="submit" class="btn">LOGIN</button>
            <div class="register-link">
                <p>DON'T HAVE AN ACCOUNT? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
    <?php } ?>
    </div>
</body>

</html>