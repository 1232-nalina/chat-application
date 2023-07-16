<?php
include_once "session_start.php";
$title = "Chat||App";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title; ?></title>

  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/media.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato&family=Source+Sans+Pro&display=swap" rel="stylesheet">

  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>



<body style="position:relative;  height: 100vh;    ">

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




    <div class="image" style="position: absolute; left: 94%; top: 15px;">
      <img src="../<?php if (empty($srow['photo'])) {
                      echo "images/profile.jpg";
                    } else {
                      echo $srow['photo'];
                    } ?>" class="__userinfo" onclick="openInfo(),on()" style="  width: 1.875rem;
height: 1.875rem;
border-radius: 30px;

">
    </div>






  </header>

  <?php include_once "overlay.php";   ?>






  <main class="main-container" id="main-container" style="display: grid;  height:auto;">

    <div class="row" style="position:relative;width: inherit;height:inherit; display:flex; flex-wrap:wrap;">
      <?php
      $sql = "select * from community_member left join community_chatgroup on community_chatgroup.chatroomid=community_member.chatroomid where community_member.userid='" . $_SESSION['id'] . "' order by community_chatgroup.date_created desc";
      $query = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <div class="col-md-3" style="position: relative;margin: 30px  0  0 31px; max-width:100%; height:inherit;  ">
          <a style="margin:0;padding:0;margin: 0; padding: 0;position: absolute;height: 100%;width: 100%;" href="groupspace.php?id=<?php echo $row['chatroomid']; ?>">
            <div class="card" style="width: 300px;height:240px;  cursor:pointer; border:1px solid #cccc;">
              <div class="card-header" style="padding:1px;margin:0;  position: relative; height:60px;  background:rgba(59, 133, 198) ;border-bottom:1px solid #cccc;  ">
                <a style="position: absolute;height:60px;width:100%;" href="groupspace.php?id=<?php echo $row['chatroomid']; ?>">
                  <h1 style=" font-family:sans-serif; font-size:1.5em;font-weight:700;color:#fff;font-weight:100;border:none;"><?php echo $row['chat_name']; ?></h1>
                </a>
              </div>
              <div class="card-body">


                <?php
                $id = $row['chatroomid'];
                $cmem = mysqli_query($conn, "select * from community_member where chatroomid='$id'");

                ?>
                <h4 style="position: absolute;top:62%;left:85%;"><i class="fa fa-users" style="margin:0 10px 0 0 ;"></i><?php echo mysqli_num_rows($cmem); ?></h4>

                <h4 style="position: absolute;top:75%;left:20px;"><?php echo "Community id:" . " " . $row['chatroomid'] ?></h4>

                
                <div class="action">
                  <?php
                  $memb = mysqli_query($conn, "select * from community_chatgroup where userid='" . $_SESSION['id'] . "' and chatroomid='" . $row['chatroomid'] . "'");
                  if (mysqli_num_rows($memb) > 0) {
                  ?>



                    <!-- delete action -->

                    <form action="delete.php" method="post" >
                        <input  type="hidden" name="id" value="<?php echo $row['chatroomid']; ?>"/>

                    <button onclick="on(),deleteConfirm()" style="position: absolute;top:80%;left:85%;background:rgba(201, 28, 49);width:30px;border-radius:30px;"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    <h4 style="position: absolute;top:55%;left:20px;"><?php echo " Admin "; ?></h4>
                    <h4 style="position: absolute;top:65%;left:20px;"><?php echo "Code : ( " . $row['chat_password'] . " )" ?></h4>
                    </form>
                  <?php
                  }
                  // end of delete action
                  else {
                  ?>

                    <!-- leave action -->
                    <form action="leave.php" method="post" >
                    <input  type="hidden" name="id" value="<?php echo $row['chatroomid']; ?>"/>
                    <button onclick="on(),leaveConfirm()" style="position: absolute;top:80%;left:85%;background:rgba(227, 205, 9);width:30px;border-radius:30px;"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
                    <h4 style="position: absolute;top:55%;left:20px;"><?php echo " Member "; ?></h4>
                    <h4 style="position: absolute;top:65%;left:20px;"><?php echo "Code : ( " . $row['chat_password'] . " )" ?></h4>

                    </form>
                    
                  <?php
                  }
                  // end of leave  action

                  ?>
                </div>
              </div>
            </div>
          </a>
        </div>

      <?php
      }
      ?>


    </div>





  </main>


</body>

</html>