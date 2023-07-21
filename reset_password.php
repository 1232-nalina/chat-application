<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body {
            background-color: #F2F2F2;
            font-family: 'Lato', sans-serif;
        }
        
        h2 {
            color: #333333;
        }
        
        .form-container {
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
        
        .form-container p {
            color: #CCCCCC;
            margin-bottom: 20px;
        }
        
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #CCCCCC;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #FFFFFF;
            color: #333333;
            font-family: 'Lato', sans-serif;
            font-size: 1em;
        }
        
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #333333;
            color: #FFFFFF;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-family: 'Lato', sans-serif;
            font-size: 1.2em;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .form-container input[type="submit"]:hover {
            background-color: #555555;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <h2>Reset Password</h2>

        <?php if (isset($_SESSION['reset_msg'])): ?>
            <p><?php echo $_SESSION['reset_msg']; ?></p>
            <?php unset($_SESSION['reset_msg']); ?>
        <?php else: ?>
            <p>Enter your new password:</p>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="password" name="password" required>
            <input type="password" name="confirm_password" required>
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <input type="submit" value="Reset Password">
        </form>
    </div>
</body>
</html>
