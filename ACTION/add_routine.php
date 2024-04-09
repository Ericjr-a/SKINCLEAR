<?php
include '../settings/connection.php'; 

if(isset($_POST['action'])) {
    $regimeID = $_POST['regimeID'];
    $title = $_POST['Title'];
    $description = $_POST['RoutineDescription'];
    $steps = $_POST['Steps'];


    if ($_POST['action'] == 'AddToMorning') {
        $table = "MornRegime";
    } elseif ($_POST['action'] == 'AddToNight') {
        $table = "EveningRegime";
    } else {
        die('Invalid action.');
    } 
    
    $checkSql = "SELECT * FROM $table WHERE RegimeID = ?";
    $checkStmt = $connection->prepare($checkSql);
    $checkStmt->bind_param("i", $regimeID);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    $checkStmt->close();

    if ($result->num_rows > 0) {
        echo "This routine has already been added.";
        header("Location: ../ADMIN/routines.php?error=alreadyExists"); 
        exit;
    }


    elseif($_POST['action'] == 'AddToMorning') {
        $sql = "INSERT INTO MornRegime (RegimeID, Title, RoutineDescription, Steps) VALUES (?, ?, ?, ?)";
    } elseif ($_POST['action'] == 'AddToNight') {
        $sql = "INSERT INTO EveningRegime (RegimeID, Title, RoutineDescription, Steps) VALUES (?, ?, ?, ?)";
    } else {
        die('Invalid action.');
    }

    $stmt = $connection->prepare($sql);
    if($stmt === false) {
        die("Prepare failed: " . $connection->error);
    }

    $stmt->bind_param("isss", $regimeID, $title, $description, $steps);
    if($stmt->execute()) {
        echo "Routine added successfully.";
        header("Location:../ADMIN/routines.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
} else {
    die('No action specified.');
}
?>
