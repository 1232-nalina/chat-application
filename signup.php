<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <style>
    body {
      background-color: #F2F2F2;
    }

    .signup {
      position: absolute;
      transform: translate(-50%, -50%);
      top: 50%;
      left: 50%;
      background: #FFFFFF;
      border: 1px solid rgba(0, 0, 0, 0.1);
      width: 450px;
      padding: 20px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
    }

    h1 {
      font-size: 2em;
      text-align: center;
      border-bottom: 1px solid rgba(0, 0, 0, 0.2);
      padding: 20px;
      font-weight: 600;
      font-family: 'Pacifico', cursive;
      color: #333333;
    }

    .signup input[type="text"],
    .signup input[type="email"],
    .signup input[type="password"] {
      width: 95%;
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

    input[type=checkbox] {
      position: relative;
      width: 20px;
      height: 10px;
      margin: 10px 0 10px 0px;
      left: 318px;
    }

    input[type=checkbox]+span {
      color: #585858;
      font-size: 0.8em;
      margin-left:315px;
      margin-top: 115px;
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
      background-color: #610053;
    }

    .signup_links {
      margin-top: 10px;
      text-align: center;
      font-size: 0.9em;
      color: #888888;
      font-family: 'Pacifico', cursive;
    }

    .signup_links a {
      text-decoration: none;
      color: #888888;
      transition: color 0.3s;
    }

    .signup_links a:hover {
      color: #333333;
    }

    .signup_message {
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
  <div class="signup">
    <form action="register.php" method="POST" enctype="multipart/form-data">
      <h1>Sign Up</h1>

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
        <input type="checkbox" onclick="showPassword()">
        <span>Show Password</span>
      </div>

      <input type="submit" value="Sign Up">
    </form>

    <div class="signup_links">
      <a href="index.php">Already have an account? click me</a>
    </div>

    <div class="signup_message">
      <?php
      // session_start();
      if (isset($_SESSION['sign_msg'])) {
        echo $_SESSION['sign_msg'];
        unset($_SESSION['sign_msg']);
      }
      ?>
    </div>
  </div>
</body>

</html>
