<?php
include ('../settings/connection.php'); 

function skintype(){
    global $connection;
    $query = "SELECT fSid, typeName FROM SkinType";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        error_log(print_r($data, true)); 
        return $data;
    } else {
        return [];
    }
}

?>