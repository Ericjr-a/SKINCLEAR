<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include('../SETTINGS/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = $_POST["email"];
    $comments = $_POST["comments"];

    $query = $connection->prepare("INSERT INTO UserFeedback (Email, Comments) VALUES (?, ?)");
    $query->bind_param('ss', $email, $comments);

    if ($query->execute()) {
        echo "Feedback submitted successfully.";
        header("Location: ../ADMIN/feedback.php");
    } else {
        echo "Error: " . $query->error;
    }

    $query->close();
    $connection->close();
} else {
    echo "Please submit the feedback form.";
}
?>
