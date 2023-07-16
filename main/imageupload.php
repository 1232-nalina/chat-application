<?php
include "session_start.php";

$image = PATHINFO($_FILES["image"]["name"]);

if (empty($_FILES["image"]["name"])) {
    $imagePath = $srow['photo'];
?>
    <script>
        window.alert('Uploaded photo is empty!');
        window.history.back();
    </script>
    <?php
} else {
    if ($image['extension'] == "jpg" or $image['extension'] == "png") {
        $temp_image = $image['filename'] . "_" . time() . "." . $image['extension'];
        move_uploaded_file($_FILES["image"]["tmp_name"], "../images/" . $temp_image);
        $imagePath = "images/" . $temp_image;

        mysqli_query($conn, "update `community_user` set photo='$imagePath' where userid='" . $_SESSION['id'] . "'");

    ?>
        <script>
            window.history.back();
        </script>
    <?php
    } else {
    ?>
        <script>
            window.alert('Photo not updated. Please upload JPG or PNG files only!');
            window.history.back();
        </script>
<?php
    }
}



?>