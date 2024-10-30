<?php
$host="localhost";
$dbname="boostore";
$username="root";
$password="";

// Conection to the database
try{
    $conn = new PDO ("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
?>