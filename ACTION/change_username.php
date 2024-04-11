<?php
session_start();
include('../SETTINGS/connection.php');

if (isset($_POST['username'])) {
    $newUsername = $_POST['username'];
    $userId = $_SESSION['id'];

    $query = "UPDATE Users SET Username = ? WHERE UserID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('si', $newUsername, $userId);
    
    if ($stmt->execute()) {
        echo "Username updated successfully.";
    } else {
        echo "An error occurred: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
