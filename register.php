<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!----------MY CSS---------------->
    <link rel="stylesheet" href="CSS/register.css" />
    <link
      rel="stylesheet"
      href="./Icons/fontawesome-free-6.6.0-web/css/all.css"
    />
<!----------------JS---------------->
    <script src = "JS/enterbind.js" ></script>
    <title>CHEF'S Corner Registration</title>
  </head>
  <body>
    <div class="wrapper">
      <?php
      include("php/config.php");
      if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

      $verify_query = mysqli_query($con, "SELECT email FROM users_tbl WHERE email ='$email'");
      
      if (mysqli_num_rows ($verify_query)!=0){
        print "<div class='message'>
              <p>This email is already used, Try another email</p> </div><br>";
        print "<a href='javascript:self.history.back()'><button class='btn'>GO BACK </button>";
      }
      else{
        mysqli_query($con, "INSERT INTO users_tbl(username,password,email)values('$username','$password','$email')") or die ("AN ERROR HAS OCCURED");
        print "<div class='message'>
              <p>Registered successfully</p> </div><br>";
        print "<a href='login.php'><button class='btn'> LOGIN NOW!</button>";
      }
    }
      else{
      ?>
      <h1>REGISTER</h1>
      <form action="" method="post">
        <div class="input-box">
          <input type="username" name ="username" placeholder="USERNAME" autocomplete="off" />
          <i class="fa-regular fa-user"></i>
        </div>
        <div class="input-box">
          <input type="password" name ="password" placeholder="PASSWORD" autocomplete="off" />
          <i class="fa-solid fa-lock"></i>
        </div>

        <div class="input-box">
          <input type="password" name ="password" placeholder="CONFIRM PASSWORD" autocomplete="off" />
          <i class="fa-solid fa-lock"></i>
        </div>

        <div class="input-box">
          <input type="email" name ="email" placeholder="EMAIL" autocomplete="off" />
          <i class="fa-solid fa-envelope"></i>
        </div>
        <button class="submit-button" type="submit" name="submit">SUBMIT</button>
        <div class="register-link">
          <p>ALREADY HAVE AN ACCOUNT? <a href="login.php">Sign-in</a></p>
        </div> 
      </form>
      <?php } ?>
    </div>
  </body>
</html>
