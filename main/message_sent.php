<?php
require_once "../dbconn.php";
require_once "func.php";

// Include the Composer autoloader
// require_once '../vendor/autoload.php';
// $message = "Hey, this is a chat message with a badword1.";

// if ($profanity->isProfane($message)) {
//     // Handle the presence of profanity
//     echo "Profanity detected!";
// } else {
//     // Process the clean message
//     echo "No profanity found.";
// }



session_start();
if (isset($_POST['msg'])) {
    $msg = encryptMessage($_POST['msg'], getEncKey());
    $id = $_POST['id'];
    mysqli_query($conn, "insert into `community_chat` (chatroomid, message, userid, chat_date) values ('$id', '" . mysqli_real_escape_string($conn, $msg) . "', '" . $_SESSION['id'] . "', NOW())");
   
}


