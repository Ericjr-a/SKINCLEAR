<?php
include('../SETTINGS/connection.php');

session_start(); 

if (isset($_GET['id'])) {
    $goalId = $_GET['id'];

    if ($stmt = $connection->prepare("DELETE FROM UserGoals WHERE GoalID = ?")) {
        $stmt->bind_param('i', $goalId);
        if ($stmt->execute()) {
            header("Location: ../ADMIN/user.php");
            exit();
        } else {
            echo "Error executing query: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Prepare failed: " . $connection->error;
    }
    $connection->close();
} else {
    header("Location: ../ADMIN/user.php");
    exit();
}
?>
