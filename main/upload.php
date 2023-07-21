<?php
// Database connection
$dbHost = "localhost";
$dbName = "community";
$dbUser = "root";
$dbPass = "";

$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    // Specify the directory where the uploaded files will be saved
    $uploadDir = "community";

    // Get the details of the uploaded file
    $fileTmp = $_FILES["photo"]["tmp_name"];
    $fileSize = $_FILES["photo"]["size"];
    $fileError = $_FILES["photo"]["error"];

    // Check if the file was uploaded successfully
    if ($fileError === UPLOAD_ERR_OK) {
        // Move the uploaded file to the desired directory
        $filePath = $uploadDir . $_FILES["photo"]["name"];
        move_uploaded_file($fileTmp, $filePath);

        // Store file information in the database
        $insertQuery = "INSERT INTO community_chat (file_path) VALUES (:filePath)";
        $stmt = $db->prepare($insertQuery);
        $stmt->bindParam(":filePath", $filePath);
        $stmt->execute();

        echo "File uploaded successfully!";
    } else {
        echo "Error uploading file. Please try again.";
    }
}

// Retrieve the most recently uploaded photo from the database
$selectQuery = "SELECT * FROM community_chat ORDER BY chatid DESC LIMIT 1";
$stmt = $db->prepare($selectQuery);
$stmt->execute();
$photo = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Photo Upload</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
        <input type="file" name="photo" accept="image/*" required>
        <input type="submit" value="Upload">
    </form>

    <!-- Display the most recently uploaded photo -->
    <?php if ($photo): ?>
        <h2>Uploaded Photo</h2>
        <div>
            <img src="<?php echo $photo['file_path']; ?>" alt="Uploaded Photo" width="200">
        </div>
        
    <?php endif; ?>
</body>
</html>
