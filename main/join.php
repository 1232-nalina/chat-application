<?php
include_once "session_start.php";


$pass = $_POST['join_code'];

$query = mysqli_query($conn, "select * from community_chatgroup where chat_password='$pass'");
$row = mysqli_fetch_array($query);
$cid = $row['chatroomid'];

if ($row['userid'] == $_SESSION['id']) {
    header('location: groupspace.php?id=' . $cid);
}
$select = mysqli_query($conn, "SELECT * FROM community_member WHERE chatroomid ='$cid' AND userid='" . $_SESSION['id'] . "'");
if (mysqli_num_rows($select) > 0) {

    header('location: groupspace.php?id=' . $cid);
} else {
    if ($row['chat_password'] == $pass) {
        mysqli_query($conn, "insert into community_member (chatroomid, userid) values ('$cid', '" . $_SESSION['id'] . "')");
        header('location: groupspace.php?id=' . $cid);
    } else {
?>
        <script>
            window.alert('Incorrect Password!');
            window.history.back();
        </script>
<?php
    }
}
?>