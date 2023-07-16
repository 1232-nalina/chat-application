<?php
include('dbconn.php');
session_start();

function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the account verification message is set in the session
if (isset($_SESSION['verification_msg'])) {
    $verificationMsg = $_SESSION['verification_msg'];
    unset($_SESSION['verification_msg']); // Remove the message from the session
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = check_input($_POST['username']);

    if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
        $_SESSION['msg'] = "Username should not contain space and special characters!";
        header('Location: index.php');
    } else {
        $fusername = $username;
        $password = check_input($_POST["password"]);
        $fpassword = md5($password);

        // Check if the user is verified
        $query = mysqli_query($conn, "SELECT * FROM `community_user` WHERE username='$fusername' AND password='$fpassword'");

        if (mysqli_num_rows($query) == 0) {
            // Invalid login credentials
            $_SESSION['msg'] = "Invalid username or password.";
            header('Location: index.php');
            exit;
        } else {
            $row = mysqli_fetch_array($query);
            if ($row['verified'] == 0) {
                // Account not verified
                $_SESSION['msg'] = "Your account has not been verified yet. Please check your email for the verification link.";
                header('Location: index.php');
                exit;
            } elseif ($row['access'] == 2) {
                // Successful login
                $_SESSION['id'] = $row['userid'];
                header('Location: main/');
                exit;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <!-- Display the verification message if set -->
    <?php if (isset($verificationMsg)) : ?>
        <p><?php echo $verificationMsg; ?></p>
    <?php endif; ?>

    <!-- Display the login error message if set -->
    <?php if (isset($_SESSION['msg'])) : ?>
        <p><?php echo $_SESSION['msg']; ?></p>
        <?php unset($_SESSION['msg']); ?>
    <?php endif; ?>

    <!-- Your login form goes here -->
    <form method="POST" action="index.php">
        <!-- Form fields -->
    </form>
</body>
</html>
