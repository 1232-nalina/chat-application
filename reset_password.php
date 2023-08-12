<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
    body {
            background-color: #F2F2F2;
            font-family: Arial, sans-serif;
        }
        
        h2 {
            color: #333333;
        }
        
        .form-container {
            background-color: #FFFFFF;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .form-container p {
            color: #666666;
            margin-bottom: 20px;
        }
        
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #CCCCCC;
            border-radius: 3px;
            box-sizing: border-box;
        }
        
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #3B85C6;
            color: #FFFFFF;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .form-container input[type="submit"]:hover {
            background-color: #2978B5;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <h2>Reset Password</h2>

        <?php
        include('dbconn.php'); // Include your database connection code
        session_start();

        function check_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        // Function to verify token validity and fetch user information
        function verifyTokenAndGetUser($conn, $token) {
            $query = "SELECT userid, email FROM community_user WHERE reset_token = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows == 1) {
                return $result->fetch_assoc();
            } else {
                return false;
            }
        }


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $password = check_input($_POST["password"]);
            $confirmPassword = check_input($_POST["confirm_password"]);

            if ($password !== $confirmPassword) {
                $_SESSION['reset_msg'] = "Passwords do not match.";
            } else {
                // TODO: Validate password complexity

                $token = check_input($_POST["token"]);
                
                // Verify token validity and fetch user information
                $user = verifyTokenAndGetUser($conn, $token); // Use the function we discussed earlier
                
                if ($user) {
                    // Update the user's password in the database
                    $hashedPassword = md5($password);
                    $query = "UPDATE community_user SET password = ? WHERE reset_token = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("ss", $hashedPassword, $token);
                    $stmt->execute();
                    if ($stmt->affected_rows > 0) {
                        $_SESSION['reset_msg'] = "Password has been successfully reset.";
                    } else {
                        $_SESSION['reset_msg'] = "Failed to reset password.";
                    }
                } else {
                    $_SESSION['reset_msg'] = "Invalid or expired token.";
                }
            }
            header('location: reset_password.php');
            exit();
        }
        ?>

        <?php if (isset($_SESSION['reset_msg'])): ?>
            <p><?php echo $_SESSION['reset_msg']; ?></p>
            <?php unset($_SESSION['reset_msg']); ?>
        <?php else: ?>
            <p>Enter your new password:</p>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="password" name="password" required>
        <input type="password" name="confirm_password" required>
        <input type="hidden" name="token" value="<?php echo isset($_GET['token']) ? htmlspecialchars($_GET['token']) : ''; ?>">

      
        <input type="submit" value="Reset Password">
    </form>

    </div>
</body>
</html>
