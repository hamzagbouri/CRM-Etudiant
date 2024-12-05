<?php 
include('db.php');
session_start();
$id = $_POST['id-edit'];
$name = trim($con->real_escape_string($_POST['name-input-edit']));
$dateNaissance = $_POST['date-input-edit'];
$ville = trim($con->real_escape_string($_POST['ville-input-edit']));
$phone = trim($con->real_escape_string($_POST['phone-input-edit']));
$apprenant = trim($con->real_escape_string($_POST['apprenant-input-edit']));
if(empty($name) || empty($dateNaissance) || empty($ville) || empty($phone) || empty($apprenant)){
    $_SESSION['error'] = "Fill All inputs";
    header('Location: index.php');

} else {
$statment = $con->prepare("UPDATE `etudiant` SET `nom`=?,`date_naissance`=?,`ville`=?,`telephone`=?,`apprenant`=? WHERE `id` = ?");
$statment->bind_param("ssssss", $name, $dateNaissance, $ville, $phone, $apprenant, $id);

if ($statment->execute()) {
    echo 'Student updated Seccusfully';
} else {
    echo  "Error: " . $statment->error;
}

$statment->close();
header('Location: apprenant.php');}
?>