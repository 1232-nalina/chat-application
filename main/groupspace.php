<?php
include_once "session_start.php";
include_once "func.php";

$id = $_REQUEST['id'];
$chatq = mysqli_query($conn, "select * from community_chatgroup where chatroomid='$id'");
$chatrow = mysqli_fetch_array($chatq);
$cmem = mysqli_query($conn, "select * from community_member where chatroomid='$id'");

// if (isset($_POST['message'])) {
//     $message = $_POST['message'];
// }
    // Process the message or perform desired operations
// } else {
//     // Handle the case when 'message' key is not present in $_POST array
// }

$message = isset($_POST['message']) ? $_POST['message'] : ""; // Assign an empty string to $message
$key = bin2hex(random_bytes(16)); // Assign an empty string to $key
 
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Chat"; ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="../vendor/emoji-picker/lib/css/emoji.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendor/emoji-picker/lib/js/config.js"></script>
    <script src="../vendor/emoji-picker/lib/js/util.js"></script>
    <script src="../vendor/emoji-picker/lib/js/jquery.emojiarea.js"></script>
    <script src="../vendor/emoji-picker/lib/js/emoji-picker.js"></script>
    
    </head>

<body style="width:100%;height:100vh;overflow:hidden;">
    <?php
    include_once "loader.php";
    include_once "forms.php";
    ?>
    <header class="header" id="header">
        <div class="logo">
            <a href="index.php">Chat<span>App</span></a>
        </div>
        <div class="createjoin">
            <a class="create" id="create" style="margin:0 45px 0 0 ;cursor:pointer;" onclick="createForm(),on()"><i class="fa fa-users" style="margin:0 10px 0 0 ;"></i>Create</a>
            <a class="join" id="join" onclick="on(),joinForm()"><i class="fa fa-plus" style="margin:0 10px 0 0 ;cursor:pointer;"></i>Join</a>
        </div>
        <h3 style="position:absolute;top:0;left:180px;"><span style=""><span style=""><span id="user_details"></span> <?php echo "( " . $chatrow['chat_name'] . " )"; ?></span></span>
        </h3>
        <img src="../<?php if (empty($srow['photo'])) {
                            echo "images/profile.jpg";
                        } else {
                            echo $srow['photo'];
                        } ?>" alt="user" class="__userinfo" onclick="openInfo(),on()" style="  width: 30px;
height: 30px;
border-radius: 30px;
position: absolute;
left: 93%;
top: 15px;
padding: 2px;">
    </header>

    <?php include_once "overlay.php"; ?>
    </header>
    <div class="container" style="width: 100%;height:100vh;overflow:hidden;">
        <div class="row" id="chat_contain" style="
width:100%;max-height:80vh;background:white;margin:0px 0 0 0;overflow-y:scroll;padding-right:20px;">
            <div class="col" style="width: 100%;border:none;height:auto;">
                <div class="panel " style=" margin:0;border:none;box-shadow:none;">
                </div>
                <div>
                    <div class="panel " style="height: auto;border:none;position:relative;top:0px;width:100%;box-shadow:none;">
                        <div id="chat_area" style=" max-height:auto; overflow-y:hidden;overflow-x:hidden;">
                        </div>
                    </div>
                    <div style="height:30px;"></div>
                    <div class="input" style="position: fixed;top:88%;width:100%;background:white;height:80px;border-top:1px solid rgba(128,128,128,0.1)">
                        <input type="text" class="form-control" placeholder="Type message..." id="chat_msg" style="height: 50px;width:90%;margin:10px 0 0 20px;" data-emojiable="true"
							data-emoji-input="unicode">
                        
                            <input type="file" id="image-input" accept="image/*" style="display: none;" onchange="handleImageUpload(event)">
            
                            <a href="#" onclick="document.getElementById('image-input').click(); return false;"><i class="fa fa-image"></i> </a>
                    
                            <i class="fa-regular fa-face-smile" id="emoji-picker-icon"></i>

                        <button class="btn" type="submit" id="send_msg" value="<?php echo $id; ?>" style="border-top-left-radius: 0;
border-bottom-left-radius: 0;
height: 55px;
position:relative;
left:10px;
top:0px;
background: rgba();
background: #610053;">
                            Send
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>





        <script>

       
            $(document).ready(function() {
                fetchMessage();

                $(document).on('click', '#send_msg', function() {
                    id = <?php echo $id; ?>;
                    if ($('#chat_msg').val() == "") {
                        echo('Please write message first');
                        // $msg = "Please write message first";
                    } else {
                        $msg = $('#chat_msg').val();
                        // const data = encrypt(msg,key);
                        //encrypt message
                    //   $encrypted = encryptMessage($message, $key);        


                    //  alert($msg)
                        $.ajax({
                            type: "POST",
                            url: "message_sent.php",
                            data: {
                                msg: $msg,
                                id: id,
                            },
                            success: function() {
                                $('#chat_msg').val("");
                                fetchMessage();
                            }
                        });
                    }
                });



                $(document).keypress(function(e) {
                    if (e.which == 13) {
                        $("#send_msg").click();
                    }
                    
                });
            });


            function fetchMessage() {
                id = <?php echo $id; ?>;
                $.ajax({
                    url: 'get_chat.php',
                    type: 'POST',
                    async: false,
                    data: {
                        id: id,
                        fetch: 1,
                    },
                    success: function(response) {
                        $('#chat_area').html(response);
                        $("#chat_contain").scrollTop($("#chat_contain")[0].scrollHeight);
                    }
                });
            }


            function getMessage() {
                id = <?php echo $id; ?>;
                $.ajax({
                    url: 'get_chat.php',
                    type: 'POST',
                    async: false,
                    data: {
                        id: id,
                        fetch: 1,
                    },
                    success: function(response) {
                        $('#chat_area').html(response);
                    }
                });
            }

            $(document).ready(function() {
                setInterval(getMessage, 1000);
            });

    
            let ignoreKeyword = [ 'shit','5h1t','5hit','sujan'];

            $(document).on('keyup', '#chat_msg', function() {
            let keyword = $(this).val();
            // console.log("Keyword: " + keyword);

            let containsIgnoreKeyword = ignoreKeyword.some(function(ignore) {
                return keyword.toLowerCase().includes(ignore.toLowerCase());
            });

            // console.log(containsIgnoreKeyword);

            if (containsIgnoreKeyword) {
                $(this).val("");
            }
            });

            function handleImageUpload(event) {
            const file = event.target.files[0];
            // Process the selected image file here
            }
            //emoji

//             $(document).ready(function() {
//   // Initialize the emoji picker
//             window.emojiPicker = new EmojiPicker({
//                 emojiable_selector: '[data-emojiable=true]',
//                 assetsPath: '../vendor/emoji-picker/img/',
//                 popupButtonClasses: 'icon-smile'
//             });

//             // Discover and initialize the emoji picker
//             window.emojiPicker.discover();
//             });


       


//                     import * as Video from 'twilio-video';

//         function participantDisconnected(participant: Video.RemoteParticipant) {
//         console.log('Participant "%s" disconnected', participant.identity);
//         document.getElementById(participant.sid).remove();

        
//         const Video = Twilio.Video;


        
// }
//                 const Video = require('twilio-video');

//                 Video.connect('$TOKEN', { name: 'room-name' }).then(room => {
//                 console.log('Connected to Room "%s"', room.name);

//                 room.participants.forEach(participantConnected);
//                 room.on('participantConnected', participantConnected);

//                 room.on('participantDisconnected', participantDisconnected);
//                 room.once('disconnected', error => room.participants.forEach(participantDisconnected));
//                 });

//                 function participantConnected(participant) {
//                 console.log('Participant "%s" connected', participant.identity);

//                 const div = document.createElement('div');
//                 div.id = participant.sid;
//                 div.innerText = participant.identity;

//                 participant.on('trackSubscribed', track => trackSubscribed(div, track));
//                 participant.on('trackUnsubscribed', trackUnsubscribed);

//                 participant.tracks.forEach(publication => {
//                     if (publication.isSubscribed) {
//                     trackSubscribed(div, publication.track);
//                     }
//                 });

//                 document.body.appendChild(div);
//                 }

//                 function participantDisconnected(participant) {
//                 console.log('Participant "%s" disconnected', participant.identity);
//                 document.getElementById(participant.sid).remove();
//                 }

//                 function trackSubscribed(div, track) {
//                 div.appendChild(track.attach());
//                 }

//                 function trackUnsubscribed(track) {
//                 track.detach().forEach(element => element.remove());
//                 }       
        </script>

</body>

</html>