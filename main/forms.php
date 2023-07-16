<!-- create form -->
<div class="createform" id="CreateForm" style="display: none;">
  <script>
    function createForm() {
      document.getElementById("CreateForm").style.display = "block";
    }
    document.addEventListener('mouseup', function(e) {
      var container = document.getElementById('CreateForm');
      if (!container.contains(e.target)) {
        container.style.display = 'none';
      }
    });
  </script>
  <style>
    .createform {
      position: absolute;
      z-index: 1000;
      transform: translate(-50%, -50%);
      top: 50%;
      left: 50%;
      background: white;
      border: 1px solid rgba(128, 128, 128, 0.3);
      width: 350px;
      height: auto;

    }

    h1 {
      font-size: 2em;
      text-align: center;
      border-bottom: 1px solid rgba(128, 128, 128, 0.4);
      padding: 10px;

      font-family: 'Dancing Script', cursive;
    }

    .create_admin input {
      width: 90%;
      margin: 10px;
      height: 40px;

    }

    .create_groupname input {
      width: 90%;
      margin: 10px;
      height: 40px;

    }

    .code input {
      width: 90%;
      margin: 10px;
      height: 40px;

    }

    input[type=submit] {
      width: 60%;
      margin: 30px 70px;
      height: 50px;
      background: rgba(59, 133, 198);
      border: none;
      border-radius: 30px;
      color: white;
      font-size: 1.2em;
      font-weight: 500;
      cursor: pointer;
    }

    input[type=submit]:hover {
      opacity: 0.7;
    }
  </style>
  <form action="create.php" method="post">
    <h1> Create <span style="font-family: 'Dancing Script', cursive;

margin: 0  0 0 5px;
display:inline-block;
font-size: 1em;
font-weight: 800;

left: 2.5%;
color: #000; ">Chat<span style=" color: rgba(59, 133, 198);
font-family: 'Dancing Script', cursive;">App</span></span></h1>

    <div class="create_groupname">
      <input type="text" name="groupname" placeholder="Group Name" required>
    </div>
    <!-- <div class="code"> (test module)
<input type="password" name="code" maxlength="12" placeholder="Set a Code (Note: Max-length: 12)" required>
</div> -->
    <input type="submit" value="Create">
  </form>
</div>
<!-- end of create form -->


<!-- join form -->
<div class="joinform" id="JoinForm" style="display:none;">
  <script>
    function joinForm() {
      document.getElementById("JoinForm").style.display = "block";
    }
    document.addEventListener('mouseup', function(e) {
      var container = document.getElementById('JoinForm');
      if (!container.contains(e.target)) {
        container.style.display = 'none';
      }
    });
  </script>
  <style>
    .joinform {
      position: absolute;
      z-index: 1000;
      transform: translate(-50%, -50%);
      top: 50%;
      left: 50%;
      background: white;
      border: 1px solid rgba(128, 128, 128, 0.3);
      width: 350px;
      height: auto;

    }



    .code_join input {
      width: 90%;
      margin: 10px;
      height: 40px;

    }

    .commu_id input {
      width: 90%;
      margin: 10px;
      height: 40px;

    }
  </style>

  <form action="join.php" method="post">
    <h1> Join <span style="font-family: 'Dancing Script', cursive;

margin: 0  0 0 5px;
display:inline-block;
font-size: 1em;
font-weight: 800;

left: 2.5%;
color: #000; ">Chat<span style=" color: rgba(59, 133, 198);
font-family: 'Dancing Script', cursive;">App</span></span></h1>
    <!-- <div class="commu_id">
<input type="number" placeholder="community id" name="commu_id" required>
</div> -->

    <div class="code_join">
      <input type="text" name="join_code" placeholder="Code" required>


    </div>

    <input type="submit" value="Join" class="join_chat">
  </form>
</div>

<!-- end of join form -->

<!-- update info form -->
<div class="updateinfo" id="upinfo">
  <script>
    function upForm() {
      document.getElementById("upinfo").style.display = "block";
    }
    document.addEventListener('mouseup', function(e) {
      var container = document.getElementById('upinfo');
      if (!container.contains(e.target)) {
        container.style.display = 'none';
      }
    });

    function showUpPassword() {
      var pass = document.getElementById("newPassword");
      if (pass.type === "password") {
        pass.type = "text";
      } else {
        pass.type = "password";
      }
    }

    function showCupPassword() {
      var pass = document.getElementById("confirmnewpassword");
      if (pass.type === "password") {
        pass.type = "text";
      } else {
        pass.type = "password";
      }
    }
  </script>
  <style>
    .updateinfo {
      position: absolute;
      display: none;
      z-index: 1000;
      transform: translate(-50%, -50%);
      top: 50%;
      left: 50%;
      background: white;
      border: 1px solid rgba(128, 128, 128, 0.3);
      width: 350px;
      height: auto;


    }

    .upphoto {
      width: 90%;
      margin: 0 10px 0px 10px;
      height: 40px;
    }

    .upfullname input {
      width: 90%;
      margin: 0 10px 10px 10px;
      height: 40px;

    }

    .upusername input {
      width: 90%;
      margin: 0 10px 20px 10px;
      height: 40px;

    }

    .upusername input {
      width: 90%;
      margin: 0 10px 20px 10px;
      height: 40px;

    }

    .uppass input {
      width: 90%;
      margin: 0 10px 20px 10px;
      height: 40px;

    }

    .confirmuppass input {
      width: 90%;
      margin: 0 10px 10px 10px;
      height: 40px;

    }

    label {
      position: relative;
      left: 10px;
      margin-bottom: 5px;
      font-size: 1.1em;
    }
  </style>
  <form method="POST" action="update.php">
    <h1> Update </h1>

    <div class="upfullname">
      <label>Name:</label>
      <input type="text" name="mname" value="<?php echo $srow['uname']; ?>" required>
    </div>
    <div class="upusername">
      <label>Username:</label>
      <input type="text" name="musername" value="<?php echo $srow['username']; ?>" required>
    </div>
    <div class="uppass">
      <label> New Password:</label>
      <input type="password" name="mpassword" value="" id="newPassword" required>

    </div>
    <div class="confirmuppass">
      <label>Confirm Password:</label>
      <input type="password" name="cmpassword" id="confirmnewpassword" required>
    </div>
    <input type="checkbox" name="" id="" onclick="showUpPassword(),showCupPassword()" style="position:relative;width:20px;height:10px;margin:10px 0 10px 0px;left:235px;"> <span style="color:grey;font-size:0.8em;margin-left:230px;"> show password</span>

    <input type="submit" value="update">
  </form>
</div>
<!-- end of update form -->


<!-- display photo code -->
<div class="displayPhoto" id="displayPhoto">
  <script>
    function phoup() {
      document.getElementById("displayPhoto").style.display = "block";
    }
    document.addEventListener('mouseup', function(e) {
      var container = document.getElementById('displayPhoto');
      if (!container.contains(e.target)) {
        container.style.display = 'none';
      }
    });
  </script>
  <style>
    .displayPhoto {
      position: absolute;
      display: none;
      z-index: 1005;
      transform: translate(-50%, -50%);
      top: 50%;
      left: 50%;
      width: auto;
      max-width: 100%;
      height: 90vh;


    }

    @media screen and (min-device-width: 320px) and (max-device-width:400px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait) {
      .displayPhoto {
        width: 100%;
        height: 500px;
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-50%, -50%);
      }

    }
  </style>


  <img src="../<?php if (empty($srow['photo'])) {
                  echo "images/profile.jpg";
                } else {
                  echo $srow['photo'];
                } ?>" alt="user" class="__userinfo" style="  width: inherit;
height: inherit;

position: relative;
top:2px;

">

</div>

<!-- end of displaying of profile picture -->









<!-- photo upload and update -->
<div class="photoupload" id="photoupload">
  <script>
    function photoUp() {
      document.getElementById("photoupload").style.display = "block";
    }
    document.addEventListener('mouseup', function(e) {
      var container = document.getElementById('photoupload');
      if (!container.contains(e.target)) {
        container.style.display = 'none';
      }
    });

    function previewFile(input) {
      var file = $("input[type=file]").get(0).files[0];

      if (file) {
        var reader = new FileReader();

        reader.onload = function() {
          $("#previewImage").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
      }
    }
  </script>
  <style>
    .photoupload {
      position: absolute;
      display: none;
      z-index: 1000;
      transform: translate(-50%, -50%);
      top: 50%;
      left: 50%;
      background: white;
      border: 1px solid rgba(128, 128, 128, 0.3);
      width: 350px;
      height: 350px;
    }

    .image-preview {
      width: 90px;
      height: 90px;
      border-radius: 50px;
      position: relative;
      left: 130px;
      border: 1px solid rgba(59, 133, 198);

      padding: 5px;

    }

    .image-preview img {
      width: 90px;
      height: 90px;
      border-radius: 50px;

    }
  </style>
  <h1>Upload picture</h1>
  <!-- <img onclick="" src="../<?php if (empty($srow['photo'])) {
                                  echo "images/profile.jpg";
                                } else {
                                  echo $srow['photo'];
                                } ?>" alt="user" class="__userinfo" 
style="  width: 90px;
height: 90px;
border-radius: 50px;
position: relative;
left:130px;

border:1px solid rgba(59, 133, 198);
padding:3px;
"

> -->

  <div class="image-preview">
    <img src="/examples/images/transparent.png" id="previewImage" style="border: none;" alt="No photo ">

  </div>




  <form action="imageupload.php" enctype="multipart/form-data" method="post">
    <div class="photo__upload" style="position:relative;left:130px;">
      <label style="
        padding:10px;
       
    background:white;
    
    display: table;
    color:rgba(59, 133, 198) ;">Browse
        <input style="display: none;" type="file" name="image" onchange="previewFile(this);" size="60">
      </label>
    </div>
    <input style="left:20px;" type="submit" value="upload">
  </form>



</div>

<!-- end of photo upload and update -->



<!-- delete confirmation -->

<!-- profile card -->
<script>
  function openInfo() {
    document.getElementById("myInfo").style.display = "block";
  };

  document.addEventListener('mouseup', function(e) {
    var container = document.getElementById('myInfo');
    if (!container.contains(e.target)) {
      container.style.display = 'none';
    }
  });
</script>

<div class="profile_card" id="myInfo">

  <img onclick="on1(),phoup(),off()" src="../<?php if (empty($srow['photo'])) {
                                                echo "images/profile.jpg";
                                              } else {
                                                echo $srow['photo'];
                                              } ?>" alt="user" class="__userinfo" style="  width: 50px;
height: 50px;
border-radius: 30px;
position: absolute;
left: 40%;
top: 15px;
border:1px solid rgba(59, 133, 198);
padding:3px;">

  <?php
  if (empty($srow['photo'])) { ?>
    <a href="#" onclick="on(),photoUp()" style="position: absolute;top:74px;left:28%;font-size: 0.9em;color:rgba(59, 133, 198);cursor:pointer;">Upload picture</a>


  <?php } else { ?>
    <a href="#" onclick="on(),photoUp()" style="position: absolute;top:74px;left:28%;font-size: 0.9em;color:rgba(59, 133, 198);cursor:pointer;">Update your picture</a>


  <?php }


  ?>



  <h2 class="profile_name" style="font-size: 0.9em;
font-weight:500;

position: absolute;
margin-left: 20px;
top:85px ;
text-align: center;"><?php echo "Username : " . $user; ?></h2>

  <h2 style="  font-size: 0.9em;
font-weight:500;
position: absolute;
margin-left: 20px;
top:110px ;
text-align: center;"><?php echo "User id : " . $useridshow; ?></h2>


  <button onclick="on(),upForm()">Edit</button>

  <div class="profile_logout">
    <a href="logout.php">Log out</a>
  </div>
</div>

<style>
  .profile_card {
    z-index: 5;
    display: none;
    position: absolute;
    top: 70px;
    left: 77%;
    border: 1px solid rgba(128, 128, 128, 0.3);
    width: 250px;
    height: 250px;
    border-radius: 5px;
    background: white;
  }

  p.profile_name {
    font-size: 1em;

    position: absolute;
    margin-left: 20px;
    top: -10px;
    text-align: center;
  }

  button {
    position: absolute;
    cursor: pointer;
    top: 65%;
    left: 37%;
    width: 70px;
    color: white;
    background: rgba(59, 133, 198);
    border-radius: 15px;
    border: none;
    height: 30px;
  }

  button:hover {
    opacity: 0.8;
  }

  .profile_logout {

    position: absolute;
    top: 200px;
    border-top: 1px solid rgba(128, 128, 128, 0.3);
    width: inherit;
  }

  .profile_logout a {
    position: relative;
    left: 90px;
    top: 15px;
    color: rgba(59, 133, 198);
    font-size: 1.2em;
    font-weight: 500;
  }

  .profile_logout a:hover {
    opacity: 0.8;
  }



  @media (min-device-width: 800px) and (max-device-width: 1050px) {


    .profile_card {
      position: absolute;
      top: 70px;
      left: 67%;
    }

  }




  @media screen and (min-device-width: 320px) and (max-device-width:400px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait) {
    .profile_card {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 300px;

    }
  }
</style>