<!-- chats to be fetched -->

<?php
require_once('../dbconn.php');
require_once('session_start.php');
require_once "func.php";

// Include the Composer autoloader
require_once '../vendor/autoload.php';



$encrypted = ""; // Assign an empty string to $encrypted
$key = ""; // Assign an empty string to $key

//decrypt received message

$decrypted = decryptMessage($encrypted, $key);


if (isset($_POST['fetch'])) {
    $id = $_POST['id'];

    $query = mysqli_query($conn, "select * from `community_chat` left join `community_user` on community_user.userid=community_chat.userid where chatroomid='$id' order by chat_date asc");
    while ($row = mysqli_fetch_array($query)) {
?>


        <div style=" height:auto;width: 100%;margin:25px 20px 20px 20px;">


            <?php if ($row['userid'] == $_SESSION['id']) { ?>
                <div class="chatoutgoing" style="display: flex;">
                    <img src="../<?php if (empty($row['photo'])) {
                                        echo "images/profile.jpg";
                                    } else {
                                        echo $row['photo'];
                                    } ?>" style="height:40px; width:40px;border-radius:30px;position:absolute;left:96.8% ">
                    <span style="font-size:0.9em; position:absolute;left:97%;margin-top:40px;"><i style="font-size:0.7em;"><?php echo date('d M ', strtotime($row['chat_date'])); ?></i> </span>

                    <div style="position:relative;  width:max-content;max-width:85%;height:auto;  background:#158ffe;padding:5px 10px 5px 10px;margin-left:auto;right:75px;">
                        <span style="font-size:0.9em; position:relative;  "><strong style="margin-right: 3px;"><?php echo $row['uname']; ?></strong> </span>
                        <span style="font-size:0.9em;position:relative;  "><i style="font-size:0.7em;"><?php echo date('h:i', strtotime($row['chat_date'])); ?></i> </span>

                        <br>

                        <span style=" color: #fff;"><?php echo decryptMessage($row['message'], getEncKey()); ?> </span>
                        
                    </div>

                </div>


            <?php   } else { ?>
                <div class="chatincomimg" style="display: flex;">
                    <img src="../<?php if (empty($row['photo'])) {
                                        echo "images/profile.jpg";
                                    } else {
                                        echo $row['photo'];
                                    } ?>" style="height:40px; width:40px;border-radius:30px;position:absolute; ">
                    <div style="position:relative;  width:max-content;max-width:90%;height:auto;left:50px;top:0px;  padding:5px 20px 5px 10px;background:rgba(128,128,128,0.1); ">
                        <span style="font-size:0.9em; position:relative;  "><strong style="margin-right: 3px;"><?php echo $row['uname']; ?></strong> </span>
                        <span style="font-size:0.9em;position:relative;  "><i style="font-size:0.7em;"><?php echo date('h:i', strtotime($row['chat_date'])); ?></i> </span>

                        <br>

                        <span style=" color: #000;"><?php echo decryptMessage($row['message'], getEncKey()); ?> </span>
                        <span style="font-size:0.9em; position:absolute;top:40px;left:-45px;"><i style="font-size:0.7em;"><?php echo date('d M ', strtotime($row['chat_date'])); ?></i> </span>
                    </div>

                </div>




            <?php  }   ?>



        </div>




<?php
    }
}
?>
<!-- chats to be fetched -->