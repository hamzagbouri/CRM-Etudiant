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
  
 
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>