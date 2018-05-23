<?php
session_start();

if ( isset ($_SESSION["user"])){
$id = $_POST["id"];
$answer = $_POST["status"];  
if ($answer == "accept") {          
$conn = new PDO ("mysql:host=localhost;dbname=sabbaght;", "sabbaght", "thailiek");  
    $results = $conn->query("UPDATE requests SET request=2 where id = $id");
    header("HTTP/1.1 200 success");
}
elseif ($answer == "reject") {
  $conn = new PDO ("mysql:host=localhost;dbname=sabbaght;", "sabbaght", "thailiek"); 
    $results = $conn->query("UPDATE requests SET request=0 where id = $id");
    header("HTTP/1.1 202 error");
}   
}
else{
        header("location: login.php");;
}
?>