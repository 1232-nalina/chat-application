<!-- Delete community code -->
<?php
include('../dbconn.php');

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}
mysqli_query($conn, "delete from `community_chatgroup` where chatroomid='$id'");
mysqli_query($conn, "delete from `community_chat` where chatroomid='$id'");
mysqli_query($conn, "delete from `community_member` where chatroomid='$id'");
header('Location: index.php');
?>
<!-- end of delete code -->