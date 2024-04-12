<?php
session_start();
include('../SETTINGS/connection.php');

$target_dir = "/home/final-skin/SKINCLEAR/images/";
$target_file = $target_dir . time() . '-' . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
        } elseif (!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            echo "Sorry, only JPG, JPEG, and PNG files are allowed.";
        } elseif (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $userID = $_SESSION['id'] ?? null;
                $postDate = date('Y-m-d');

                if (!$userID) {
                    echo "User session is not set.";
                } else {
                    $stmt = $connection->prepare("INSERT INTO ProgressPictures (UserID, ImagePath, PostDate) VALUES (?, ?, ?)");
                    if ($stmt) {
                        $stmt->bind_param("iss", $userID, $target_file, $postDate);
                        if ($stmt->execute()) {
                            header("Location: ../ADMIN/home.php");
                            exit; 
                        } else {
                            echo "Error inserting into the database: " . $stmt->error;
                        }
                        $stmt->close();
                    } else {
                        echo "Error preparing statement: " . $connection->error;
                    }
                    $connection->close();
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "File is not an image.";
    }
}
?>
