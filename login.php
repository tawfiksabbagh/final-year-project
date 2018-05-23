<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css"  href="login.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Make Mates</title>
<meta name="login" content="">
    </head>
    <body>
<div class="container">
	<div class="card card-container">

            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="login_result.php">
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