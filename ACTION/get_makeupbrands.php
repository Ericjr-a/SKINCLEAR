<?php
include('../SETTINGS/connection.php');
function getAllMakeupBrands() {
    global $connection;
    $query = "SELECT BrandID, BrandName, ProductType, ProductURL FROM MakeupBrands";
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
