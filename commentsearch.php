<?php
session_start();

if ( isset ($_SESSION["user"])){

$a = $_GET["placeID"];
$conn = new PDO("mysql:host=localhost;dbname=makemates", "root");
$results = $conn->query("select * from comments where placeID='$a'");
$row = $results->fetch();
if($row==false){
    echo "<p style='color:red;'>No comments were added by users yet.</p>";

}
    else{
        $results = $conn->query("select * from comments,users where comments.placeID='$a' AND users.ID=comments.userid");
while($row=$results->fetch()){
echo "&nbsp;<img style='height:35px';width:20px; src='$row[image]'><span style='font-weight: 700; font-size: 2.0rem;'> <a href='users.php?ID=$row[userid]' target='_blank'>$row[username]</a></span>";

echo "&nbsp;<div style='color:#808080;'>$row[date]</div>";
           echo "<div style='color:navy;'> &nbsp;$row[comment]</div>";
echo "</br>";
                             } 
    }
}
else{
     header("location: login.php");
}
?>
