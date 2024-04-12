<?php
session_start();
include '../SETTINGS/connection.php'; 

if (isset($_POST['goal'])) {
    $goal = $_POST['goal'];
    $userId = $_SESSION['id'];
    $date = $_POST['date'];


    $query = "INSERT INTO UserGoals (UserID, goal, date_added) VALUES (?, ?, ?)";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('ssi', $userId, $goal, $date);
    
    if ($stmt->execute()) {
        echo "Goal added successfully.";
        header("Location: ../ADMIN/user.php");
    } else {
        echo "An error occurred: " . $connection->error;
    }
    $stmt->close();
    $connection->close();
}
?>

