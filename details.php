<?php

session_start();

if ( isset ($_SESSION["user"])){
$id= $_POST["id"];
$fname= $_POST["firstname"];
$lname= $_POST["lastname"];
$town= $_POST["town"];
$email= $_POST["email"];
$country= $_POST["country"];
$number= $_POST["number"];
$conn = new PDO("mysql:host=localhost;dbname=makemates", "root");
   $statement = $conn->prepare("UPDATE users SET FirstName=?, LastName=?, town=?, email=?, country=?, number=? WHERE ID=?");
            $statement->bindParam(1,$fname);
$statement->bindParam(2,$lname);
$statement->bindParam(3,$town);
        $statement->bindParam(4, $email);
$statement->bindParam(5,$country);
$statement->bindParam(6,$number);
    $statement->bindParam(7,$id);
        $statement->execute();
echo "Successfully updated </br>";
echo "please wait..";
header  ('Refresh: 2; url = profile.php');
}
else{
        header("location: login.php");;
}
?>