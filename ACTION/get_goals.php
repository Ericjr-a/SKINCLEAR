<?php
include '../SETTINGS/connection.php';
session_start(); 

function getAllGoals() {
    global $connection;
    $userId = $_SESSION['id'];
    $query = "SELECT GoalID, goal, date_added FROM UserGoals WHERE UserID = $userId";

    $result = $connection->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            $goals = $result->fetch_all(MYSQLI_ASSOC);
            return $goals;
        } else {
            return []; 
        }
    } else {
        echo "Error: " . $connection->error;
        return false; 
    }
}
?>
