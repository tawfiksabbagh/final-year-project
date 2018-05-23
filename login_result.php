<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=makemates", "root");
$un = $_POST["uname"];
$pw = $_POST["password"];
$result= $conn->query("Select * from users where UserName='$un'");
$row=$result->fetch();
$password = $row['password'];
$verify=password_verify($pw, $password);
if($verify==true){
       $_SESSION['user'] = $un;
        $_SESSION['user_id'] = $row[ID];
    header("location: home.php");
}

else{
     ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css"  href="login.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Make Mates</title>
<meta name="login" content="">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
<div class="container">
	<div class="card card-container">

            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
         <div class="alert alert-danger">
    <strong>Login Failed!</strong> Please check username and password.
  </div>
    <form class="form-signin" method="post" action="">
                <span id="reauth-email" class="reauth-email"></span>
                <input name="uname" type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus></br>
        <input name="password"type="password" id="inputPassword" class="form-control" placeholder="Password" required></br>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
    </br>
                <button class="btn btn-lg btn-success btn-block btn-signin" type="submit">Login</button>
            </form>
    </br>
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
</div>

    </body>
</html>
<?php
}

?>