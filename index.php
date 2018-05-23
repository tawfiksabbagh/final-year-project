<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Make Mates</title>
<meta name="description" content="">
  
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">

<link rel="stylesheet" type="text/css"  href="index.css">

<script type="text/javascript" src="js/modernizr.custom.js"></script>
</head>
<body>


<!-- Header -->
<div id="intro">
  <div class="intro-body">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h1>Make <span class="brand-heading">Mates</span></h1>
          <p class="intro-text">Make activities and meet new people.</p>
          <a href="login.php" class="button">Log in</a> 
          <a href="signup.php" class="button2">Sign up</a></div>
      </div>
    </div>
  </div>
</div>
<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>Contact us</h2>
      <hr>
      <p>Please fill in the form below if you would like to be in touch with us regarding an issue you are faceing or anything else. </p>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <div class="col-md-4">
        <div class="contact-item"> <i class="fa fa-map-marker fa-2x"></i>
          <p>Southampton solent university, E Park Terrace, <br>
            Southampton SO14 0YN,</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-item"> <i class="fa fa-envelope-o fa-2x"></i>
          <p>info@makemates.com</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-item"> <i class="fa fa-phone fa-2x"></i>
          <p> +1 321 456 1234</p>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <h3>Leave us a message</h3>
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-default">Send Message</button>
      </form>

    </div>
  </div>
</div>
    </br>
<div id="footer">
  <div class="container">
    <p style="text-align:center;">Copyright &copy; Make Mates. Designed by Tawfik Sabbagh</a></p>
  </div>
</div>

</body>
</html>