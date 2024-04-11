<?php

include('../SETTINGS/connection.php');

if (isset($_GET['id'])) {
    $routineId = $_GET['id'];

    $query = $connection->prepare("DELETE FROM MornRegime WHERE MornID = ?");
    $query->bind_param('i', $routineId);

    if ($query->execute()) {
        header("Location: ../ADMIN/morning.php");
        exit();
    } else {
        echo "Error: " . $query->error;
    }
    $query->close();
    $connection->close();
} else {
    header("Location: ../ADMIN/morning.php");
    exit();
}
?>
