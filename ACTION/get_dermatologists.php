<?php
include '../SETTINGS/connection.php'; 
function getAllDermatologists() {
    global $connection;
    $query = "SELECT DermatologistID, DName, HospitalAffiliation, ContactInfo FROM Dermatologists";
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
