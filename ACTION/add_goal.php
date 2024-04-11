<?php
session_start();
include '../SETTINGS/connection.php'; 

if (isset($_POST['goal'])) {
    $goal = $_POST['goal'];
    $userId = $_SESSION['id'];

    $query = "INSERT INTO UserGoals (UserID, goal) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('is', $userId, $goal);
    
    if ($stmt->execute()) {
        echo "Goal added successfully.";
    } else {
        echo "An error occurred: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
