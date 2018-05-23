<?php
session_start();

if ( isset ($_SESSION["user"])){
$row = $_GET["row"];
$conn = new PDO("mysql:host=localhost;dbname=makemates", "root");
    $statement = $conn->prepare("DELETE FROM locations WHERE ID=?");
$statement->bindParam(1,$row);
    $statement->execute();
echo "Successfully deleted </br>";
echo "please wait..";
header  ('Refresh: 2; url = home.php');
}
else{
        header("location: login.php");
}
?>