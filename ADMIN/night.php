<?php
include('../SETTINGS/connection.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Skin Care Routine</title>
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
                <li><a href="home.php">Home</a></li>
            </ul>
        </nav>
</header>
<div class='main_content'>
<p>Night Routine</p>
</div>

<?php 
    include '../FUNCTIONS/even_fxn.php'; 
    if(!empty($var_data)): ?>
    <div class="routines-container">
    <?php foreach ($var_data as $routine): ?>
    <div class="routine-box">
    <div class="routine-title"><?php echo htmlspecialchars($routine['Title']); ?></div>
    <br/>
    <div class="routine-desc"><?php echo nl2br(htmlspecialchars($routine['RoutineDescription'])); ?></div>
    <br/>
    <div class="routine-steps"><?php echo nl2br(htmlspecialchars($routine['Steps'])); ?></div>
    <br/>
    <a href="../action/delete_night_routine.php?id=<?php echo $routine['EveningID']; ?>" class="a_button">Delete Routine</a>
    </div>
    <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>No routines found.</p>
<?php endif; ?>
</body>
</html>
