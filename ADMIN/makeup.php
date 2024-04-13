<?php
include('../SETTINGS/connection.php'); 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Makeup Routines</title>
    <link rel="stylesheet" href="../CSS/homestyle.css">
</head>
<body>
<header>
    <div class="logo">
        <a href="home.php"><img src="../CSS/images/SKIN.jpg" class="logo" width="70px" height="70px"></a> 
    </div>
    <nav>
        <ul>
            <li><a href="routines.php">Skin Care Routines</a></li>
            <li><a href="resource.php">Resources</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="makeup.php">Makeup Routines</a></li>
            <li><a href="user.php">User Profile</a></li>
            <li><a href="home.php">Home</a></li>
        </ul>
    </nav>
</header>
<div class='main_content'>
    <p>Browse through our diverse makeup routines</p>
</div>

<?php 
    include '../FUNCTIONS/makeup_fxn.php';
    if (isset($_SESSION['id'])) {
    $userID = $_SESSION['id']; 
    $var_data = getAllMakeup($userID); 

    if (!empty($var_data)): 
    ?>
    <div class="makeup-routines">
    <?php foreach ($var_data as $routine): ?>
    <div class="routine-box">
        <div class="routine-title"><?php echo htmlspecialchars($routine['Title']); ?></div>
        <br/>
        <div class="routine-desc"><?php echo nl2br(htmlspecialchars($routine['Details'])); ?></div>
        <br/>
        <div class="routine-steps"><?php echo nl2br(htmlspecialchars($routine['Steps'])); ?></div>
        <br/>
    </div>
    <?php endforeach; ?>
    </div>
    <?php else: ?>
    <p>No routines found.</p>
    <?php endif;
} else {
    echo '<p>Please login to see routines.</p>'; 
}
?>
</body>
</html>
