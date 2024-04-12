<?php
session_start();
include('../SETTINGS/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $skintype = $_POST["skintype"];

    $checkSql = "SELECT Username, Email FROM Users WHERE Username = ? OR Email = ?";
    $checkStmt = $connection->prepare($checkSql);
    $checkStmt->bind_param("ss", $username, $email);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    $checkStmt->close();

    if ($result->num_rows > 0) {
        echo "This username or email already exists.";
        header("Location: ../LOGIN/register.php?error=alreadyExists");
        exit;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $query = $connection->prepare("INSERT INTO Users (Username, Email, Passwd, SkinTypeID) VALUES (?, ?, ?, ?)");
    $query->bind_param('sssi', $username, $email, $passwordHash, $skintype);

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
