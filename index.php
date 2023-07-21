<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <style>
    body {
      background-color: #F2F2F2;
    }

    .login {
      position: absolute;
      transform: translate(-50%, -50%);
      top: 50%;
      left: 50%;
      background: #F8F8F8;
      border: 1px solid rgba(0, 0, 0, 0.1);
      width: 350px;
      padding: 20px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    h1 {
      font-size: 2em;
      text-align: center;
      border-bottom: 1px solid rgba(0, 0, 0, 0.2);
      padding: 10px;
      margin-bottom: 20px;
      font-family: 'Pacifico', cursive;

      color: #333333;
    }

    .login_username input,
    .login_password input {
      width: 100%;
      margin-bottom: 15px;
      height: 40px;
      padding: 10px;
      border: 1px solid rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      background-color: #FFFFFF;
      color: #333333;
      font-size: 1em;
      font-family: 'Pacifico', cursive;
    }

    input[type=submit] {
      width: 100%;
      height: 50px;
      background: #333333;
      border: none;
      border-radius: 25px;
      color: #FFFFFF;
      font-size: 1.2em;
      font-weight: 500;
      cursor: pointer;
      transition: background-color 0.3s;
      font-family: 'Pacifico', cursive;
    }

    input[type=submit]:hover {
      background-color: #555555;
    }

    .login_links {
      margin-top: 10px;
      text-align: center;
      font-size: 0.9em;
      color: #888888;
      font-family: 'Pacifico', cursive;
    }

    .login_links a {
      text-decoration: none;
      color: #888888;
      transition: color 0.3s;
    }

    .login_links a:hover {
      color: #333333;
    }

    .login_message {
      margin-top: 10px;
      text-align: center;
      font-size: 1em;
      color: #FF9494;
      font-family: 'Pacifico', cursive;
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
  <div class="login">
    <form action="login.php" method="post">
      <h1>Login</h1>
      <div class="login_username">
        <input type="text" name="username" placeholder="Username">
      </div>

      <div class="login_password">
        <input type="password" name="password" placeholder="Password" id="myPassword">
      </div>

      <input type="submit" name="login" value="Login">
    </form>

    <div class="login_links">
      <a href="signup.php">Signup?</a>
      <br>
      <a href="forgot_password.php">Forgot password?</a>
    </div>

    <div class="login_message">
      <?php
      session_start();
      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>
    </div>
  </div>
</body>

</html>
