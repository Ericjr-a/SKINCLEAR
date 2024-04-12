<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinClear </title>
    <link rel="stylesheet" href="../CSS/homestyle.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="../css/homestyle.css"><img src="../CSS/images/SKIN.jpg" class="logo" width="70px" height="70px"></a> 
        </div>
        <nav>
            <ul>
                <li><a href="routines.php">Skin Care Routines</a></li>
                <li><a href="resource.php">Resources</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <li><a href="makeup.php">Makeup Routines</a></li>
                <li><a href="user.php">User Profile</a></li>
            </ul>
        </nav>


    </header>
    <div class ="home">
    <div class="main">
        <div class="box" id="leftbox"> 
            <a href="../ADMIN/morning.php">
            </a>
        </div> 
        <div class="box" id="rightbox"> 
            <a href="../ADMIN/night.php">
            </a>
        </div> 
        </div> 
    


        <div class='main_pictures'>
            <p>SEEING PROGRESS?! POST YOUR PICTURES HERE</p>
        </div>

   
        <div class="upload-container">
            <h2>Upload Your Picture</h2>
            <form action="../ACTION/upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" accept ="image/jpg, image/jpeg, image/png"required>
            <button type="submit" name="submit">Upload Image</button>
            </form>
        </div>
        <div class="routines-container">
        <?php
        session_start();
        include('../SETTINGS/connection.php');
        $userID=$_SESSION['id'];
        $query = "SELECT ImagePath FROM ProgressPictures WHERE UserID = $userID";  
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<img src='" . $row["ImagePath"] . "' alt='Progress Picture'>";
            }
        } else {
            echo "No images found.";
        }
        $connection->close();
        ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 SkinClear. All rights reserved.</p>
    </footer>

</body>
</html>
