<?php
session_start();
include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/profile.css">
    <script src="JS/popupform.js"></script>
    <title>Your Profile</title>
</head>

<body>
    <!---LOGO AND OVERALL--->
    <div class="content">
        <div class="nav">
            <div class="logo">
                <img src="Logo/CHEF_S_DIARIES-removebg-preview.png" alt="Logo of Chef's diaries">
                <p>CHEF'S Diaries</p>

                <!------WHERE DOES THE INFORMATION DISPLAYED AT----->
                <?php
                $id = $_SESSION['ID'];
                $query = mysqli_query($con, "SELECT*FROM users_tbl WHERE ID=$id");

                while ($result = mysqli_fetch_assoc($query)) {
                    $res_Uname = $result['username'];
                    $res_Email = $result['email'];
                    $res_id = $result['ID'];
                }

                echo "";
                ?>
                <main>
                    <div class="main-box top">
                        <div class="top">
                            <div class="box">
                                <p>Hello <b>
                                        <?php print $res_Uname ?>
                                    </b></p>
                                <div class="box">
                                    <p>Your current Email is: <b>
                                            <?php print $res_Email ?>
                                        </b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div class="right-links">


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
                <a href="edit.php"><button class="btn">Edit Info</button></a>
                <button id="show-form" class="btn">UPLOAD Profile Picture</button>
                <a href="index.php"><button class="btn">Log Out</button></a>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="popup">
            <h2>UPLOAD PROFILE PICTURE</h2>
            <div class="form">
                <div class="close-btn">&times</div>
                <form action="" method="post" enctype="multipart/form-data">
                    <?php
                    //!---SUBMISSION TO THE DATABASE---//
                    if (isset($_POST['submit'])) {
                        $file_name = $_FILES['image']['name'];
                        $tempname = $_FILES['image']['tmp_name'];
                        $folder = 'Images/' . $file_name;

                        $query = mysqli_query($con, "INSERT INTO images (ID, file) VALUES ('$id', '$file_name')");
                        if ($query && move_uploaded_file($tempname, $folder)) {
                            echo "<h2>FILE UPLOADED SUCCESSFULLY</h2>";
                        } else {
                            echo "<h2>ERROR: " . mysqli_error($con) . "</h2>";
                        }
                    }
                    //!----SHOWING IMAGES TO SCREEN ON THE FORM----//
                    $res = mysqli_query($con, "SELECT * FROM images WHERE ID = $id");
                    if ($row = mysqli_fetch_assoc($res)) {
                        echo '<div class="container">
                        <div class="pfp">
                            <img src="Images/' . $row['file'] . '" alt="A PHOTO OF THE USER">
                        </div>
                    </div>';
                    }
                    ?>
                    <div class="upload">
                        <input type="file" name="image">
                        <br><br>
                    </div>
                    <button type="submit" name="submit" class="btn">UPLOAD IMAGE</button>
            </div>
        </div>
    </div>


</body>

</html>