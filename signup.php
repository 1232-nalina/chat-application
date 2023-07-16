<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <style>
    .signup {
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
      padding: 20px;
      font-weight: 600;
      font-family: 'Dancing Script', cursive;
    }

    .signup_name input {
      width: 90%;
      margin: 10px;
      height: 40px;
    }

    .signup_password input {
      width: 90%;
      margin: 10px 10px 0 10px;
      height: 40px;
    }

    .signup_username input {
      width: 90%;
      margin: 10px;
      height: 40px;
    }

    .signup_email input {
      width: 90%;
      margin: 10px;
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

</head>

<body>
  <?php
  include_once "main/loader.php";
  ?>

  <div class="signup">
    <form action="register.php" method="POST" enctype="multipart/form-data">
      <h1>Sign in</h1>

      <div class="signup_name">
        <input type="text" name="name" placeholder="Full Name" required>
      </div>
      <div class="signup_username">
        <input type="text" name="username" placeholder="Set a Username" required>
      </div>
      <div class="signup_email">
        <input type="email" name="email" placeholder="Enter Your Email" required>
      </div>

      <div class="signup_password">
        <input type="password" name="password" placeholder="Set a Password" id="myPassword" required>
        <input type="checkbox" onclick="showPassword()" style="position:relative;width:20px;height:10px;margin:10px 0 10px 0px;left:235px;"> <span style="color:grey;font-size:0.8em;margin-left:230px;"> Show Password</span>
      </div>

     

     

      <input type="submit" value="Sign Up">
    </form>

    <a href="index.php" style="position:relative;text-decoration:none;left:100px;color:grey;font-size:0.9em;" onMouseOver="this.style.color='rgba(59, 133, 198)'" onMouseOut="this.style.color='grey'">Login here? Click me</a>

    <div style="height: 5px;"></div>

    <div style="color: rgba(255, 148, 148); font-size: 1em;padding:5px;">
      <center>
        <?php
        // session_start();
        if (isset($_SESSION['sign_msg'])) {
          echo $_SESSION['sign_msg'];
          unset($_SESSION['sign_msg']);
        }
        ?>
      </center>
    </div>

    <div style="height: 5px;"></div>
  </div>
</body>

</html>
