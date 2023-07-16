<?php
include "session_start.php";
$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

mysqli_query($conn, "delete from community_member where userid='" . $_SESSION['id'] . "' and chatroomid='$id'");


$r = mysqli_query($conn, "select * from community_member where chatroomid='$id'");
if (mysqli_num_rows($r) < 1) {
    mysqli_query($conn, "delete from community_chatgroup where chatroomid='$id'");
}

header('Location: index.php');
