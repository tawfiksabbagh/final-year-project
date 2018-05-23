<?php
session_start();

if ( isset ($_SESSION["user"])){
$conn = new PDO ("mysql:host=localhost;dbname=sabbaght;", "sabbaght", "thailiek");
$result = $conn->query("SELECT * FROM locations where expirydate>CURRENT_TIMESTAMP");
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($rows);
    
}
else{
      header("location: login.php");;
}
?>