<?php
session_start();
include('../SETTINGS/connection.php');

if (isset($_POST['username'])) {
    $newUsername = $_POST['username'];
    $userId = $_SESSION['id'];
    $currentUsername = $_SESSION['username']; 

    $checkSql = "SELECT * FROM Users WHERE UserID = ?";
    $checkStmt = $connection->prepare($checkSql);
    $checkStmt->bind_param("i", $UserID);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    $checkStmt->close();

    if ($result->num_rows > 0) {
        echo "This username already exists.";
        header("Location: ../ADMIN/user.php?error=alreadyExists"); 
        exit;
    }

    elseif(isset($_POST['username'])){
    $query = "UPDATE Users SET Username = ? WHERE UserID = ?";
    }
    $stmt = $connection->prepare($query);
    $stmt->bind_param('si', $newUsername, $userId);
    
    if ($stmt->execute()) {
        $_SESSION['username'] = $newUsername;
        echo "Username updated successfully.";
        header("Location: ../ADMIN/user.php");
    } else {
        echo "An error occurred: " . $connection->error;
    }
    $stmt->close();
    $connection->close();
}
?>