<?php

include('../SETTINGS/connection.php');

if (isset($_GET['id'])) {
    $routineId = $_GET['id'];

    $query = $connection->prepare("DELETE FROM EveningRegime WHERE EveningID = ?");
    $query->bind_param('i', $routineId);

    if ($query->execute()) {
        header("Location: ../ADMIN/night.php");
        exit();
    } else {
        echo "Error: " . $query->error;
    }
    $query->close();
    $connection->close();
} else {
    header("Location: ../ADMIN/night.php");
    exit();
}
?>
