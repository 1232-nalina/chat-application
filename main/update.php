<?php
include('session_start.php');
$id = $_SESSION['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}
$myq = mysqli_query($conn, "select * from `community_user` where userid='" . $_SESSION['id'] . "'");
$myqrow = mysqli_fetch_array($myq);
$upname = $_POST['mname'];
if (preg_match('~[0-9]~', $_POST['mname'])) { ?>
    <script>
        window.alert(' Invalid name');
        window.history.back();
    </script>
    <?php
} else {
    $upusername = $_POST['musername'];
    $check_username = mysqli_query($conn, "SELECT * FROM community_user WHERE username = '$upusername'");
    if (mysqli_num_rows($check_username)) { ?>
        <script>
            window.alert(' Username already exist');
            window.history.back();
        </script>
        <?php
    } else {
        $uppassword = md5($_POST['mpassword']);
        $upcpassword = md5($_POST['cmpassword']);
        if ($uppassword != $upcpassword) {
        ?>
            <script>
                window.alert(' Password did not match!');
                window.history.back();
            </script>
        <?php
        } else {
            mysqli_query($conn, "update `community_user` set username='$upusername', password='$uppassword', uname='$upname' where userid='" . $_SESSION['id'] . "'");
        ?>
            <script>
                window.alert('Changes Saved!');
                window.history.back();
            </script>
<?php }
    }
}
?>