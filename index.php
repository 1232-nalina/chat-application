<?php
require_once 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<style>
  .login {
    position: absolute;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
    background: white;
    border: 1px solid rgba(128, 128, 128, 0.3);
    width: 350px;
    height: auto;
  }

  h1 {
    font-size: 2em;
    text-align: center;
    border-bottom: 1px solid rgba(128, 128, 128, 0.4);
    padding: 10px;

    font-family: 'Dancing Script', cursive;
  }

  .login_username input {
    width: 90%;
    margin: 10px;
    height: 40px;

  }

  .login_password input {
    width: 90%;
    margin: 10px 10px 0 10px;
    height: 40px;

  }

  input[type=submit] {
    width: 60%;
    margin: 30px 60px;
    height: 50px;
    background: rgba(59, 133, 198);
    border: none;
    border-radius: 30px;
    color: white;
    font-size: 1.2em;
    font-weight: 500;
    cursor: pointer;
  }

  input[type=submit]:hover {
    opacity: 0.7;
  }
</style>
<script>
  function showPassword() {
    var pass = document.getElementById("myPassword");
    if (pass.type === "password") {
      pass.type = "text";
    } else {
      pass.type = "password";
    }
  }
</script>

<body>

  <?php
  include_once "main/loader.php";
  ?>

  <div class="login">
    <form action="login.php" method="post">
      <h1>Login</h1>
      <div class="login_username">
        <input type="text" name="username" placeholder="username">

      </div>

      <div class="login_password">
        <input type="password" name="password" placeholder=" password" id="myPassword" style="display: block;">
        <input type="checkbox" name="" id="" onclick="showPassword()" style="position:relative;width:20px;height:10px;margin:10px 0 10px 0px;left:235px;"> <span style="color:grey;font-size:0.8em;margin-left:230px;"> show password</span>

      </div>


      <input type="submit" name="login" value="Login">

    </form>
    <a href="signup.php" style="position:relative;text-decoration:none;left:140px;color:grey; font-size:0.9em;" onMouseOver="this.style.color='rgba(59, 133, 198)'" onMouseOut="this.style.color='grey'"> Signup?</a>
    <br>

    <a href="forgot_password.php" style="position:relative;text-decoration:none;left:140px;color:grey; font-size:0.9em;" onMouseOver="this.style.color='rgba(59, 133, 198)'" onMouseOut="this.style.color='grey'"> forgot password?</a>

    <div style="height: 5px;"></div>
    <div style="color: rgba(255,148,148); font-size: 1em;">
      <center>
        <?php
        session_start();
        if (isset($_SESSION['msg'])) {
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }
        ?>
      </center>
    </div>
    <div style="height: 5px;"></div>
  </div>
</body>

</html>