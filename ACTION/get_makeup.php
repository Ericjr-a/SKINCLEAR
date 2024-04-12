<?php
include '../SETTINGS/connection.php'; 
function getAllMakeup($userID) { 
    global $connection;
    $userID=$_SESSION['id'];
    $query = "SELECT MakeupRoutine.MakeupRoutineID, MakeupRoutine.Title, MakeupRoutine.Details, MakeupRoutine.Steps
    FROM MakeupRoutine
    JOIN Users ON MakeupRoutine.ForSkinType = Users.SkinTypeID
    WHERE Users.UserID = ?;"; 

    $stmt = $connection->prepare($query); 
    $stmt->bind_param("i", $userID); 

    if ($stmt->execute()) { 
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $routine = $result->fetch_all(MYSQLI_ASSOC);
            return $routine;
        } else {
            return []; 
        }
    } else {
        echo "Error: " . $connection->error;
        return false; 
    }
}
?>


?>
