<?php
include('dbconn.php');

// Assuming this is your verification endpoint (e.g., /verify)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve the verification token from the request parameters or URL
    $verificationToken  = $_GET['verification_id'] ?? '';
    $activationCode = $_GET['activation_code'] ?? '';

    // Debugging statements
    // echo "Verification ID: $verificationToken<br>";
    // echo "Verification Code: $activationCode<br>";

    // Validate the verification token
    // Check if the token exists and is valid (e.g., compare with the stored token in the database)
    if (!empty($verificationToken) && !empty($activationCode)) {
        // Connect to the database (adjust the credentials as needed)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "community";

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Check if the verification record exists in the database
            $stmt = $pdo->prepare("SELECT * FROM community_user WHERE verification_id = :verification_id AND activation_code = :activation_code");
            $stmt->bindParam(':verification_id', $verificationToken);
            $stmt->bindParam(':activation_code', $activationCode);
            $stmt->execute();

            $rows = $stmt->fetchAll();

            if (count($rows) > 0) {
                // Update the user's verification status in the database
                $updateStmt = $pdo->prepare("UPDATE community_user SET verified = 1 WHERE verification_id = :verification_id AND activation_code = :activation_code");
                $updateStmt->bindParam(':verification_id', $verificationToken);
                $updateStmt->bindParam(':activation_code', $activationCode);
                $updateStmt->execute();

                // Check if any rows were affected
                if ($updateStmt->rowCount() > 0) {
                    // Display success message or redirect to a success page
                    echo 'Verification successful! Your email has been verified.';
                    // or: header('Location: /success-page.php');
                } else {
                    // Display error message or redirect to a failure page
                    echo 'Verification failed. Please check your verification link or contact support.';
                    // or: header('Location: /failure-page.php');
                }
            } else {
                // Display error message or redirect to a failure page
                echo 'Verification token not found. Please check your verification link or contact support.';
                // or: header('Location: /failure-page.php');
            }
        } catch (PDOException $e) {
            echo 'Verification failed. Error: ' . $e->getMessage();
            // or: header('Location: /failure-page.php');
        }
    } else {
        // Display error message or redirect to a failure page
        echo 'Verification token not found. Please check your verification link or contact support.';
        // or: header('Location: /failure-page.php');
    }
} else {
    // Redirect to the homepage or an appropriate page for handling invalid requests
    header('Location: mail.php');
    exit;
}
?>
