<?php
include('../settings/connection.php');
function getAllRoutines() {
    global $connection;
    $query = "SELECT RegimeID, Title, RoutineDescription, Steps FROM skinRegime";
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
