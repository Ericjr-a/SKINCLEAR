<?php
include '../SETTINGS/connection.php'; 
function getMornRoutines() {
    global $connection;
    $query = "SELECT MornID, RegimeID, Title, RoutineDescription, Steps FROM MornRegime";
    $result = $connection->query($query);

    if ($result) {
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
