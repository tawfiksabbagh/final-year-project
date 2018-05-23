<?php
session_start();

// Test that the authentication session variable exists
if ( isset ($_SESSION["user"])&&$_SESSION["user_id"])
{
    $loggedin = $_SESSION["user"]
    ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css"  href="home.css">
<title>Make Mates home page</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<style>

/* The Modal (background) */
.modal2 {
    display: none; /* Hidden by default */
position: absolute; 
  z-index: 2;
    top:50px;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.0); /* Black w/ opacity */
}

/* Modal Content */
.modal-content2 {
    background-color: silver;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 100%;
}

.modal1 {
    display: none; /* Hidden by default */
position: absolute; 
  z-index: 2;
    top:50px;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.0); /* Black w/ opacity */
}

/* Modal Content */
.modal-content1 {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 100%;
    height: auto;

}
    @media screen and (max-width: 600px) {
        .modal-content1{
            width:200%;
        }
    }
/* The Close Button */
.close2 {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close2:hover,
.close2:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    
}
    /* The Close Button */
.close1 {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close1:hover,
.close1:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    
}
    #map {
       height: 1025px;
        width: 100%;
        position: relative;
        z-index: 1;
        
       }
    .popup{
    background: linear-gradient(#8e9eab, #eef2f3);
         font-family: "Times New Roman", Times, serif;
          border: 2px solid black;;
    border-radius: 12px;
 width: 100%;
        height: 100%;
      overflow: scroll;
        
    }
</style>
 <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"
   integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log=="
   crossorigin=""></script>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"
   integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ=="
   crossorigin=""/>
    <script>
//adding map layer
var map;
function init()
{
    map = L.map ("map");
    var attrib="Map data copyright OpenStreetMap contributors, Open Database Licence";
    L.tileLayer
        ("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            { attribution: attrib } ).addTo(map);
 var pos = [ 51, -1];
    map.setView(pos, 6);
        if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition (processPosition, handleError);
    }
    else
    {
        alert("Sorry, geolocation not supported in this browser");
    }
//getting location
function processPosition(gpspos)
{
    var pos = [gpspos.coords.latitude, gpspos.coords.longitude];
    map.setView(pos,19);
 	var home = L.circle([gpspos.coords.latitude, gpspos.coords.longitude], 25,
	{ fillColor:'green', color: 'red', opacity: 0.5 } ).addTo(map);
	home.bindPopup("Your current location");
    
}

function handleError(err)
{
    alert('An error occurred: ' + err.code);
}


}
//ajax request to read comments  
        function comments()
{
    // Create the XMLHttpRequest variable.
    // This variable represents the AJAX communication between client and
    // server.
    var xhr2 = new XMLHttpRequest();

    // Read the data from the form fields.
    var a = document.getElementById("placeID").value;

    // Specify the CALLBACK function. 
    // When we get a response from the server, the callback function will run
    xhr2.addEventListener ("load", responseReceived3);

    // Open the connection to the server
    // We are sending a request to "flights.php" and passing in the 
    // destination and date as a query string. 
    xhr2.open('GET',
		'/~sabbaght/make_mates3/commentsearch.php?placeID=' + a);

    // Send the request.
    xhr2.send();
}

function responseReceived3(e)
{
    document.getElementById('response').innerHTML = e.target.responseText;
}
//ajax request to connect to third party in order to get coordintees
    function ajaxrequest()
{

    var xhr2 = new XMLHttpRequest();


    var a = document.getElementById("postcode").value;

 
    xhr2.addEventListener ("load", responseReceived);

 
    xhr2.open('GET',
		'https://api.postcodes.io/postcodes/' + a);

    xhr2.send();
}
            function ajaxrequest1()
{
    var xhr2 = new XMLHttpRequest();
    
    xhr2.addEventListener ("load", responseReceived1);

    xhr2.open("GET" , "search.php" );
    xhr2.send();
}
//ajax request to create new activity
function responseReceived1(e) 
{

    var output = ""; // initialise output to blank text
    var data = JSON.parse(e.target.responseText);
	   for(var i=0; i<data.length; i++) 
    {
      	var pos = [data[i].latitude, data[i].longitude];
		   map.setView(pos, 9);
	var location = L.marker(pos).addTo(map);
    var $id = data[i].placeID;
        	location.bindPopup("<div class='popup'><h4 style='text-align:left;border: double;'>Header: " + data[i].header + "</br></h4><div style='border: double;'><strong>Type: </strong>" + data[i].Type + "</br></div></br><div style='border: double;'><strong>Description: </strong>" + data[i].description + "</br></div><p style='display: block;font-size: 80%;line-height: 1.42857143;#808080;'><strong>-- Posted by:</strong> '" + data[i].username + "' on:</strong> " + data[i].date + "</p><p style='display: block;font-size: 80%;line-height: 1.42857143;#808080;'><strong>-- Activity expiry date:</strong> " + data[i].expirydate+ "</p><p></p><input type='hidden' name='placeID' id='placeID' value="+data[i].ID+"><input type='submit' value='View comments'onclick='comments()'><div id='response'></div><form id='myform1'><input type='text' name='comment' id='comment' placeholder='comment'><input type='hidden' id='placeID' name='placeID' placeholder='placeID' value='"+data[i].ID+"'><input type='hidden' name='userid' id='userid' placeholder='userid' value='<?php echo "$_SESSION[user_id]";?>'> <input type='hidden' name='username' id='username' placeholder='username' value='<?php echo "$_SESSION[user]";?>'><input name='submit' type='submit' value='Send' onclick='ajax1()'> </br></form></div>");

    }
}
        //a function to set html fields to javascript variables
        function responseReceived(e)
{
    var data = JSON.parse(e.target.responseText);
    var result =  data.result.longitude;
    var result1 = data.result.latitude ;
    var result2 = data.result.admin_district;
  
    document.getElementById('longitude').value = result;
    document.getElementById('latitude').value = result1;
    document.getElementById('admin_district').value = result2;

}
//ajax request to add activities to database 
             function ajax(){
         $(function () {

        $('#myform').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'create.php',
            data: $('#myform').serialize(),
            statusCode: {
            200: function() {
            alert('200 status code! activity was successfully added ');
                location.reload();
             }
            }

          });

        });

      });
            }
    //ajax request to add comments to database
            function ajax1(){
         $(function () {

        $('#myform1').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'comment.php',
            data: $('#myform1').serialize(),
            statusCode: {
            200: function() {
            alert('200 status code! Your comment was successfully added ');
             },
            204: function(){
                alert('Please enter valid comment');
            },
            }

          });

        });

      });
                
            }
    </script>
</head>
<body onload="init(); ajaxrequest1();">
    
<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Home</a>
    <a id="myBtn" style="color:white;">Add a new activity</a>
  <a id="myBtn1" style="color:white;">My activities</a>
  <a href ="profile.php" >Profile</a>
    <a href ="logout.php" > Hello <?php echo "$loggedin"; ?></php> / Logout</a>
      <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<!-- Trigger/Open The Modal -->
<div id="map"></div>

<!-- The Modal -->
<div id="myModal2" class="modal2">

  <!-- Modal content -->
  <div class="modal-content2">
    <span class="close2">&times;</span>
    <form id="myform">
        <h3>Add new activity</h3>
       Header of your activity: <input type="text" name="header" id="header" required></br></br>
    Type of activity: <input type="text" id="type" name="type" required> </br></br>
     Please enter required meeting location: <input class="field"  id="postcode" type="text" name="postcode" placeholder="postcode" required>
<input style="background-color:skyblue;"class= "btn" type="button" value="Search" onclick="ajaxrequest();" ></br></br>
<input type="hidden" id="longitude" name="longitude" required> 
<input type="hidden" id="latitude" name="latitude"required> 
town  <input type="text" id="admin_district" name="town" value="Postcode not valid yet" readonly> </br></br>
<input type="hidden" id="userid" value="<?php echo "$_SESSION[user_id]";?>" name="userid"> 
<input type="hidden" id="username" value="<?php echo "$_SESSION[user]";?>" name="username"> 
Description  <input type="text" id="description" name="description" required> </br></br>
End date  <input type="datetime-local" id="enddate" name="enddate"required> </br></br>
                                                      
         <input style="background-color:skyblue;" name="submit" type="submit" value="Create Activity" onclick='ajax()'> </br>
      </form>
  </div>

</div>
<!-- The Modal -->
<div id="myModal1" class="modal1">

  <!-- Modal content -->
  <div class="modal-content1">
    <span class="close1">&times;</span>
    <form id="myform">
<?php
  $conn = new PDO("mysql:host=localhost;dbname=makemates", "root");
         $statement= $conn->prepare("Select * from locations where userid=? AND expirydate>CURRENT_TIMESTAMP");
    $statement->bindParam(1,$_SESSION["user_id"]);
    $statement->execute();
    echo"<h3>A list of all your activities:</h3>";
     while($row=$statement->fetch()){
         ?>
        
        <table class="table table-hover table-dark">
  <thead>
      
    <tr>
      <th scope="col">#</th>
      <th scope="col">Activity header</th>
      <th scope="col">Type</th>
      <th scope="col">Location</th>
     <th scope="col">Description</th>
    <th scope="col">Date</th>
    <th scope="col">Expiry date</th>
    <th scope="col">Actions</th>
        
    </tr>
  </thead>
  <tbody>
    <tr>

      <th scope="row">*</th>
      <td><?php echo "$row[header]"; ?></td>
      <td><?php echo "$row[Type]"; ?></td>
      <td><?php echo "$row[location]"; ?></td>
      <td><?php echo "$row[description]"; ?></td>
      <td><?php echo "$row[date]"; ?></td>
      <td><?php echo "$row[expirydate]"; ?></td>
       <td><a href='deleteactivity.php?row=<?php echo "$row[ID]";?>'>Delete activity</a></td>
    </tr>
  </tbody>
</table>
        
<?php
    }
    ?>
      </form>
  </div>

</div>
<script>
// Get the modal
var modal2 = document.getElementById('myModal2');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close2")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}
 
</script>

<script>
// Get the modal
var modal1 = document.getElementById('myModal1');

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks the button, open the modal 
btn1.onclick = function() {
    modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
    modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
}
 
</script>

  </body>
</html>
<?php
    }
 else{
        header("location: login.php");
    
}
?>