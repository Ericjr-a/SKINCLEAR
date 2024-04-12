<?php
include '../SETTINGS/connection.php'; 
function getAllRoutines($userID) {
    global $connection;
    $query = "SELECT skinRegime.RegimeID, skinRegime.Title, skinRegime.RoutineDescription, skinRegime.Steps
    FROM skinRegime
    JOIN Users ON skinRegime.ForSkinType = Users.SkinTypeID
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
