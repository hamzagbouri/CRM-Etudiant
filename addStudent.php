<?php 
include('db.php');
session_start();

$name = trim($con->real_escape_string($_POST['name-input']));
$dateNaissance = $_POST['date-input'];
$ville = trim($con->real_escape_string($_POST['ville-input']));
$phone = trim($con->real_escape_string($_POST['phone-input']));
$apprenant = trim($con->real_escape_string($_POST['apprenant-input']));
if(empty($name) || empty($dateNaissance) || empty($ville) || empty($phone) || empty($apprenant)){
    $_SESSION['error'] = "Fill All inputs";
    header('Location: index.php');

} else {
$statment = $con->prepare("INSERT INTO `etudiant`(`nom`, `date_naissance`, `ville`, `telephone`, `apprenant`) VALUES (?, ?, ?, ?, ?)");
$statment->bind_param("sssss", $name, $dateNaissance, $ville, $phone, $apprenant);

if ($statment->execute()) {
    echo 'Student Added Seccusfully';
} else {
    echo  "Error: " . $statment->error;
}

$statment->close();
header('Location: apprenant.php');}
?>