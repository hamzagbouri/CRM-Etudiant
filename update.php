<?php 
include('db.php');
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    echo $id;
    $query = "DELETE from `etudiant` where `id` = $id";
    try {
        $con -> query($query);
        echo "Deleted Succes";

    }catch (Exception $e) {
        echo "Eroro".$e;
    }
}



header('Location: index.php');
?>