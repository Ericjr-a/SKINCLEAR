<?php
include '../SETTINGS/connection.php'; 

$userId = $_SESSION['id']; 

$query = "SELECT goal, date_added FROM UserGoals WHERE UserID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . htmlspecialchars($row['goal']) . "</td><td>" . $row['date_added'] . "</td></tr>";
}

$stmt->close();
$conn->close();
?>
