<html>
<head>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Make Mates/profile page</title>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="profile.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <script>
        
            function ajax(){
         $(function () {

        $('#myform').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'shownumber.php',
            data: $('#myform').serialize(),
            statusCode: {
            200: function() {
            alert('200 status code! Your number will be displayed for the selected user ');
                 location.reload();
             }
            ,   
            202: function() {
            alert('202 status code! You have rejected user request ');
                 location.reload();
             }
            }

          });

        });

      });
            }
        </script> 
        <style>
        
        </style>
        <script>function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script></script>
    </head>
</head>
<body>
<?php
session_start();

if ( isset ($_SESSION["user"])){

     $user_id = $_SESSION['user_id'];
$rn = $_SESSION['user'];
$conn = new PDO("mysql:host=localhost;dbname=makemates", "root");
$statement= $conn->prepare("Select * from users where ID=?");
    $statement->bindParam(1,$user_id);
    $statement->execute();
$row=$statement->fetch()
?>

<div class="topnav" id="myTopnav">
  <a href="home.php" >Home</a>
  <a href ="profile.php"class="active">Profile</a>
    <a href ="logout.php">Logout</a>
          <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

                        </br>
      <div class="imagesettings">

                        <img  style="height:25%" width="20%"src="<?php echo "$row[image]";?>">
  

                        <form action="" method="post" enctype="multipart/form-data">

                            Select image to upload:</br></br>
          <input type="file" class="file" name="fileToUpload" id="fileToUpload"></br>
<input type="submit" value="Upload Image" name="submit"></br></br>
                    <p>Please note that by continuing. You agree to share your profile picture with other users </p>
                        </form>
            </div>
    
                    <?php
 if ( isset( $_POST['submit'] ) ) {    

$target_dir = "uploads/profile/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file has been successfully uploaded. Please refresh page to view it.";
        $conn = new PDO("mysql:host=localhost;dbname=makemates", "root");
        $conn->query("UPDATE users SET image = '$target_file' WHERE ID = $_SESSION[user_id]");
$page = $_SERVER['PHP_SELF'];
$sec = "0.1";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>
    <?php
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 }

?>
            
<div class="container">
      <div class="form-group">
  <h2>Profile details:</h2>
  <h4>Please note that date of birth and username are uneditable. For more information please refer to privacy agreement</h4>
  <form action="details.php" method="post">
      <input type="hidden" name="id" value="<?php echo "$row[ID]";?>">
            <label for="First name">First name:</label>
 <?php echo "<input type='text' name='firstname' class='form-control' value='$row[FirstName]'>";?>
    </div>
     <div class="form-group">
        <label for="Last name">Last name:</label>
 <?php echo "<input type='text' name='lastname' class='form-control' value='$row[LastName]'>";?>
    </div>
      <div class="form-group">
                  <label for="age">Date of birth:</label>
                        <?php echo " <span class='form-control'> $row[dayofbirth] - $row[monthofbirth] - $row[yearofbirth]</br></span>"; ?>
    </div>
      <div class="form-group">
                     <label for="Town">Town:</label>
                        <?php echo "<input type='text' name='town' class='form-control' value='$row[town]'>";?> 
    </div>

          <div class="form-group">
                    <label for="Email">Email:</label>
<?php echo "<input type='email' name='email' class='form-control' value='$row[email]'>";?>
    </div>     
     <div class="form-group">
                  <label for="Username">Username:</label>
<?php echo "<input type='text'  class='form-control' value='$row[UserName]'readonly>"; ?>
    </div>
                            <div class="form-group">
                  <label for="Country">Country:</label>
<?php echo "<input type='text' name='country' class='form-control'value='$row[country]'>"; ?>
    </div>
    <div class="form-group">
                    <label for="Phone Number">Phone number:</label>

   <?php echo "<input type='text' name='number' class='form-control' value='$row[number]'>"; ?>
    </div>
          <input type="submit" value="Update"></br></br>
    </form>
<label for="Requests">Requests:</label>
                   <?php         
                        $results = $conn->query("select * from requests,users where requests.userrecieve=$user_id AND requests.userrequest=users.ID AND requests.request=1");
                        $rows=$results->fetch();
    if($rows==true){

            echo "<a href='users.php?ID=$rows[userrequest]' target='_blank'>$rows[UserName]</a></span> has requested to view your phone number";  
        
                            ?> <form id="myform"> 
                            <input type="hidden" name="id" id="id" value="<?php echo "$rows[id]";?>">
                            <input type="radio" name="status" id="accept" value="accept"> Accept<br>
                            <input type="radio" name="status" id="reject" value="reject"> Reject <br>
                            <input name='submit' type='submit' value='Send' onclick='ajax()'>
                            </form>
    </div>
    <?php
}
        
            

    else{
        echo "no requests";
    }

    }


    else{
          header("location: login.php");
    }
?>
    </div>
    </body>
</html>