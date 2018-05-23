<?php
session_start();

if ( isset ($_SESSION["user"])){
$userrequest = $_POST["userrequest"];
$userrecieve = $_POST["userrecieve"];
$number = 1;
$conn = new PDO("mysql:host=localhost;dbname=makemates", "root");
$statement=$conn->prepare("INSERT INTO `requests`(`userrecieve`, `userrequest`, `request`) VALUES (?,?,?)");
 $statement->bindParam(1,$userrecieve);
$statement->bindParam(2,$userrequest);
$statement->bindParam(3,$number);
            $statement->execute();
header("HTTP/1.1 200 success");
}
else{
     header("location: login.php");
}
?>