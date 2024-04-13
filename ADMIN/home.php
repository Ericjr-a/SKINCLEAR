


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
            <a href="../CSS/homestyle.css"><img src="../CSS/images/SKIN.jpg" class="logo" width="70px" height="70px"></a> 
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
    <div class="home_content">
        <?php 
        session_start(); 
        include ('../ACTION/login_action');
        if (isset($_SESSION['username'])) {
            echo "Welcome, " . htmlspecialchars($_SESSION['username']) . " ! Ready to treat yourself?";
        } else {
            echo "You are not logged in.";
        }
        ?>
    </div>
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

    </div>
    <footer>
        <p>&copy; 2024 SkinClear. All rights reserved.</p>
    </footer>

</body>
</html>
