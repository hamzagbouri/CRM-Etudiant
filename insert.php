<?php 
$username = 'root';
$password = '';
$servername = 'localhost';
$dbname = 'gestion_etudiant';
try {
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    echo 'connected';
   
        $name =  $con->real_escape_string($_REQUEST['name-input']);
        $dateNaissance = $_REQUEST['date-input'];
        $ville = $con->real_escape_string($_REQUEST['ville-input']);
        $phone = $con->real_escape_string($_REQUEST['phone-input']);
        $apprenant = $con->real_escape_string($_REQUEST['apprenant-input']);
        echo $name," ",$ville," ",$dateNaissance;
    
        $query = "INSERT INTO `etudiant`( `nom`, `date_naissance`, `ville`, `telephone`, `apprenant`) VALUES ('$name','$dateNaissance','$ville','$phone','$apprenant')";
        $result = $con -> query($query);
        if ($result === TRUE)
        {
            echo 'addded';
        } else 
        {
            echo $con -> error;
        }
        $con -> close();
      





} catch(Exception $e) {
    echo 'error => '+$e;
    
}
?>