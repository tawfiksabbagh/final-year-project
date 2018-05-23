<html>
<head>
<title>Make Mates/profile page</title>
<link rel="stylesheet" href="profile.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <style>
        .tital { 
        font-size:16px; font-weight:500;
}
    
    .bot-border {
         border-bottom:3px #f8f8f8 solid;  margin:5px 0  5px 0
}	
    .picture {
        border-radius: 8px;
    }
            body{
                         margin: 0; height: auto; overflow: hidden;width: 100%;
overflow: auto;
  background: linear-gradient(#4CA1AF, #C4E0E5);
            }
            .topnav {
  overflow: hidden;
  background-color: #333;
    height: 50%;
}
.topnav{
 height: 5%;               
}
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;

}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

}
        </style>
<body>
<?php
session_start();



     $ID = $_GET["ID"];
$rn = $_SESSION['user'];
$conn = new PDO ("mysql:host=localhost;dbname=sabbaght;", "sabbaght", "thailiek");
$result= $conn->query("Select * from users where ID=$ID");
$row=$result->fetch()
?>
<div class="topnav" id="myTopnav">
  <a href="home.php" >Home</a>
  <a href ="profile.php"class="active">Profile</a>
    <a href ="logout.php">Logout</a>
         <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>


    <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">

                        <img class="img-responsive picture" src="<?php echo "$row[image]";?>">
                        <div>
                            <h5 class="text-bold"></h5>
                        </div>

                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-xs-4 col-xs-offset-4 text-left">
   
                    </br>
                        <div class=" col-xs-6 tital">First Name:</div>
                        <div class=" col-xs-6 "><?php echo "$row[FirstName]</br>";?></div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>

                        <div class="col-xs-6 tital ">Last Name:</div>
                        <div class="col-xs-6"> <?php echo "$row[LastName]</br>";?></div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>

                        <div class="col-xs-6 tital ">Age:</div>
                        <div class="col-xs-6"> <?php echo "$row[dayofbirth] - $row[monthofbirth] - $row[yearofbirth]</br>"; ?></div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>
                        
                        <div class="col-xs-6 tital ">Town</div>
                        <div class="col-xs-6"><?php echo "$row[town]'</br>"; ?></div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>
                        
                        <div class="col-xs-6 tital ">Gender</div>
                        <div class="col-xs-6"><?php echo "$row[Gender]</br>"; ?></div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>
                                                
                        <div class="col-xs-6 tital ">Email</div>
                        <div class="col-xs-6"><?php echo "$row[email]</br>"; ?></div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>
                        
                        <div class="col-xs-6 tital ">Username</div>
                        <div class="col-xs-6"><?php echo "$row[UserName]</br>"; ?></div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>
                                                                        
                                                                        
                        <div class="col-xs-6 tital ">Country</div>
                        <div class="col-xs-6"><?php echo "$row[country]</br>"; ?></div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>
          <?php
            $user_id = $_SESSION['user_id'];
    $conn = new PDO ("mysql:host=localhost;dbname=sabbaght;", "sabbaght", "thailiek");
            $result1 = $conn->query("SELECT * FROM requests where request=2 and userrequest=$user_id");
            $result2 = $conn->query("SELECT * FROM requests where request=1 and userrequest=$user_id");
            $row1 = $result1->fetch();
            $row2 = $result2->fetch();
            if ($row1==true){
            ?>
                        <div class="col-xs-6 tital ">Number</div>
                        <div class="col-xs-6"><?php echo "$row[number]</br>"; ?></div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>
                        
                        
             <?php
            }
              elseif($row2==true){
                  ?>
                         <div class="col-xs-6 tital ">Number</div>
                        <div class="col-xs-6"><?php echo "Awaiting for user approval"; ?></div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>  
                    <?php
              }
              else{
                  ?>
                         <div class="col-xs-6 tital ">Number</div>
                        <div class="col-xs-6"><?php echo "Request number from user?<form id='myform' method='post'><input type='hidden' value='$user_id' name='userrequest' id='userrequest'><input name='userrecieve' id='userrecieve'type='hidden' value='$ID'> <input name='submit' type='submit' value='Request'onclick='ajax()'> </form>"; ?></div>
                        <div class="clearfix"></div>
                        <div class="bot-border"></div>   
                      <?php
              }
              ?>
                    <script>
        function ajax(){
         $(function () {

        $('#myform').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'phone.php',
            data: $('#myform').serialize(),
            statusCode: {
            200: function() {
            alert('200 status code! You request was sent please wait for the user to approve  ');
                location.reload();
             }
            }

          });

        });

      });
                
            }</script>
                    </div>
                </div>    
    </div>

    </body>
</html>