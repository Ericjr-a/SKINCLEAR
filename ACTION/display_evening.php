<?php
include('../settings/connection.php');
function getNightRoutines() {
    global $connection;
    $query = "SELECT EveningID, RegimeID, Title, RoutineDescription, Steps FROM EveningRegime";
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
