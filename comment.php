<?php
session_start();

if ( isset ($_SESSION["user"])){
$placeID= $_POST["placeID"];
$userid =  $_POST["userid"];
$username =  $_POST["username"];
$comment = $_POST["comment"];
$date = date('Y-m-d H:i:s');
if($comment != ""){
$conn = new PDO("mysql:host=localhost;dbname=makemates", "root");
$statement=$conn->prepare("INSERT INTO `comments`(`placeID`, `userid`, `comment`, `username`, `date`) VALUES (?,?, ?,?,?)");
            $statement->bindParam(1,$placeID);
$statement->bindParam(2,$userid);
$statement->bindParam(3,$comment);
        $statement->bindParam(4,$username);
$statement->bindParam(5,$date);
     $statement->execute();
header("HTTP/1.1 200 successss"); 
}
else{
   header("HTTP/1.1 204 no content");  
}
}
else{
        header("location: login.php");
}
?>