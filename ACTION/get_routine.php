<?php
include('../settings/connection.php');
function getAllRoutines() {
    global $connection;
    $query = "SELECT * FROM skinRegime";
    $result = $connection->query($query);

    if ($result) {
        if ($result->num_rows > 0) {
            $chores = $result->fetch_all(MYSQLI_ASSOC);
            return $chores;
        } else {
            return []; 
        }
    } else {
        echo "Error: " . $connection->error;
        return false; 
    }
}

?>