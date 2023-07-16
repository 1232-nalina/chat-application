<?php
include('dbconn.php');
require 'PHPMailer/PHPMailerAutoload.php';

session_start();

function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = check_input($_POST["email"]);

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM community_user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $_SESSION['forgot_msg'] = "Email not found. Please enter a valid email address.";
    } else {
        // Generate a password reset token
        $resetToken = bin2hex(random_bytes(16));

        // Update the user's record with the reset token
        $stmt = $conn->prepare("UPDATE community_user SET reset_token = ? WHERE email = ?");
        $stmt->bind_param("ss", $resetToken, $email);
        $stmt->execute();

        // Send the password reset email
        $mail = new PHPMailer(true);

        try {
            // Server settings for Outlook
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nalinashrestha90@outlook.com';
            $mail->Password = 'Arch!tecture12';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Sender and recipient details
            $mail->setFrom('nalinashrestha90@outlook.com', 'Reset your password!!');
            $mail->addAddress($email);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset';
            $resetLink = "http://localhost:8080/chatt/reset_password.php?token=$resetToken";
            $mail->Body = "Hello,<br><br>"
                . "You have requested to reset your password. Please click the following link to reset your password:<br><br>"
                . "<a href='$resetLink'>$resetLink</a>";

            $mail->send();

            $_SESSION['forgot_msg'] = "A password reset link has been sent to your email address. Please check your inbox.";
        } catch (Exception $e) {
            $_SESSION['forgot_msg'] = "Failed to send password reset email. Error: " . $mail->ErrorInfo;
        }
    }

    header('Location: forgot_password.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #dddddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
        }

        p {
            margin-bottom: 15px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input[type="email"] {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #dddddd;
            border-radius: 3px;
            background-color: #ffffff;
            color: #333333;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #3B85C6;
            color: #ffffff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1c85dc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Forgot Password?</h2>

        <?php if (isset($_SESSION['forgot_msg'])): ?>
            <p><?php echo $_SESSION['forgot_msg']; ?></p>
            <?php unset($_SESSION['forgot_msg']); ?>
        <?php else: ?>
            <p>Enter your email address to reset your password:</p>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="email"></label>
            <input type="email" name="email" id="email" required>

            <input type="submit" value="Reset Password">
        </form>
    </div>
</body>
</html>
