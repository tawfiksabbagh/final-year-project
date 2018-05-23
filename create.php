<?php
session_start();

if ( isset ($_SESSION["user"])){

$header =  $_POST["header"];
$type =  $_POST["type"];
$postcode =  $_POST["postcode"];
$longitude =  $_POST["longitude"];
$latitude =  $_POST["latitude"];
$town =  $_POST["town"];
$userid =  $_POST["userid"];
$username=  $_POST["username"];
$date = date('Y-m-d H:i:s');
$description = $_POST["description"];
$enddate =  $_POST["enddate"];
$conn = new PDO("mysql:host=localhost;dbname=makemates", "root");
$statement= $conn->prepare("INSERT INTO `locations`(`userid`, `header`, `Type`, `postcode`, `latitude`, `longitude`, `description`, `username`, `location`, `date`, `expirydate`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $statement->bindParam(1,$userid);
$statement->bindParam(2,$header);
$statement->bindParam(3,$type);
        $statement->bindParam(4, $postcode);
$statement->bindParam(5,$latitude);
$statement->bindParam(6,$longitude);
        $statement->bindParam(7,$description);
$statement->bindParam(8,$username);
$statement->bindParam(9,$town);
        $statement->bindParam(10,$date);
$statement->bindParam(11,$enddate);
    $statement->execute();
header("HTTP/1.1 200 success"); 
}
else{
        header("location: login.php");;
}
?>