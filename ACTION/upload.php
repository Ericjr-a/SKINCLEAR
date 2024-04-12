<?php
session_start();
include('../SETTINGS/connection.php');

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
    } else {
        echo "File is not an image.";
    }
}
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
}
if ($_FILES["image"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    if(
        $imageFileType !="jpg" && $imageFileType !="png" && $imageFileType !="jpeg"
        ){
            echo "Sorry, only JPG, JPEG and PNG files are allowed.";
        }

} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";

        $stmt = $conn->prepare("INSERT INTO ProgressPictures (UserID, ImagePath, PostDate) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $userID, $target_file, $postDate);
        $userID=$_SESSION['id'];
        $postDate = date('Y-m-d');
        $stmt->execute();
        $stmt->close();
        $connection->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
