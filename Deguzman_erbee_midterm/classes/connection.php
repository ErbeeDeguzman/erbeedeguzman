<?php
$host = 'localhost';
$dbname = 'online_ordering_system';
$user = 'root';
$pass = '';

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname;charset=UTF8",$user,$pass);
   
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable exceptions for errors
} catch (PDOException $e) {
    
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>