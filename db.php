<?php

$username = 'root';
$password = '';
$servername = 'localhost';
$dbname = 'gestion_etudiant';
$message ='';

try {
    $con = new mysqli($servername, $username, $password, $dbname);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    $qeury = "CREATE TABLE IF NOT EXISTS `admins` (
    id int NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL, 
    password VARCHAR (50) NOT NULL,
    PRIMARY KEY (id)
    
    )";
  
  $con->query($qeury);
 
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>