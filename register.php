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
    $username = check_input($_POST['username']);

    if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
        $_SESSION['sign_msg'] = "Username should not contain spaces and special characters!";
        header('location: signup.php');
    } else {
        $fusername = $username;
        $check_username = mysqli_query($conn, "SELECT * FROM community_user WHERE username = '$fusername'");
        if (mysqli_num_rows($check_username)) {
            $_SESSION['sign_msg'] = 'This username already exists';
            header('location: signup.php');
        } else {
            $password = check_input($_POST["password"]);
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);

            $fpassword = md5($password);
            $fname = check_input($_POST["name"]);
            if (preg_match('~[0-9]~', $_POST['name'])) {
                $_SESSION['sign_msg'] = "Invalid Name";
                header('location: signup.php');
            } else {
                // Generate a verification token
                $verificationToken = bin2hex(random_bytes(16));

                // Generate a random activation code
                $activationCode = bin2hex(random_bytes(16));

                // Insert user data into the database
                $query = "INSERT INTO `community_user` (uname, username, password, email, access, verification_id, activation_code, verified) VALUES (?, ?, ?, ?, ?, ?, ?, 0)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("sssssss", $fname, $fusername, $fpassword, $email, $access, $verificationToken, $activationCode);
                $access = '2'; // Assuming '2' represents the user access level
                $email = check_input($_POST["email"]);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    // Send verification email
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
                        $mail->setFrom('nalinashrestha90@outlook.com', 'Verify Your Email');
                        $mail->addAddress($_POST["email"], $fname);

                        // Email content
                        $mail->isHTML(true);
                        $mail->Subject = 'Email Verification';
                        $verificationLink = "http://localhost:8080/chatt/verify.php?username=$fusername&verification_id=$verificationToken&activation_code=$activationCode";
                        $mail->Body = "Hello $fname,<br><br>"
                            . "Thank you for signing up! Please click the following link to verify your email:<br><br>"
                            . "<a href='$verificationLink'>$verificationLink</a>";

                        $mail->send();

                        $_SESSION['msg'] = "Sign up successful. Please check your email to verify your account!";
                        header('location: index.php');
                    } catch (Exception $e) {
                        $_SESSION['sign_msg'] = "Failed to send verification email. Error: " . $mail->ErrorInfo;
                        header('location: signup.php');
                    }
                } else {
                    $_SESSION['sign_msg'] = "Failed to insert user data into the database.";
                    header('location: signup.php');
                }
            }
        }
    }
}
?>
