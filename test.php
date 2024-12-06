<?php
include('db.php');
session_start();
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $con->prepare("SELECT * FROM `admin` WHERE `username` = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Stored hash: " . $row['password'] . "<br>";
        echo "Input password: " . $password . "<br>";
        $isVerified = password_verify($password, $row['password']);
        var_dump($isVerified);
          if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            header('Location: index.php');
            exit();
        } else {
            $message = "INVALID PASSWORD";
        }
    } else {
        $message = "INVALID USERNAME";
    }

    $stmt->close();
}
?>