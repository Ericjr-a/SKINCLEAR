<?php

session_start();

include('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) { 
    $username = $_POST["username"]; 
    $email = $_POST["email"];
    $password = $_POST["password"];
    $skintype= $_POST["skintype"];

    
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);


    $query = $connection->prepare("INSERT INTO Users ( Username, Email, Passwd, SkinTypeID) VALUES (?, ?, ?, ?, ?)");
    $query->bind_param('isss',$username, $email, $passwordHash, $skintype);

    if ($query->execute()) {
        header("Location: ../LOGIN/login.php");
        exit;
    } else {
        echo "Error: " . $query->error;
    }

    $query->close();
    $connection->close();
} else {
    echo "Please fill in the registration form to continue.";
}
?>
