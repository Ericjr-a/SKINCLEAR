<?php
include('../SETTINGS/connection.php');
session_start();  
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
<p>Select Your Skin Care Routine</p>
</div>

<?php 
    include '../FUNCTIONS/routine_fxn.php'; 
    if (isset($_SESSION['id'])) {
        $userID = $_SESSION['id']; 
        $var_data = getAllRoutines($userID);

        if(!empty($var_data)): ?>
        <div class="routines-container">
        <?php foreach ($var_data as $routine): ?>
        <div class="routine-box">
        <form method="POST" action="../ACTION/add_routine.php">
        <input type="hidden" name="regimeID" value="<?php echo $routine['RegimeID']; ?>">
        <input type="hidden" name="Title" value="<?php echo $routine['Title']; ?>">
        <input type="hidden" name="RoutineDescription" value="<?php echo $routine['RoutineDescription']; ?>">
        <input type="hidden" name="Steps" value="<?php echo $routine['Steps']; ?>">

        <div class="routine-title"><?php echo htmlspecialchars($routine['Title']); ?></div>
        <br/>
        <div class="routine-desc"><?php echo nl2br(htmlspecialchars($routine['RoutineDescription'])); ?></div>
        <br/>
        <div class="routine-steps"><?php echo nl2br(htmlspecialchars($routine['Steps'])); ?></div>
        <br/>
        <button type="submit" name="action" value="AddToMorning">Add to Morning routine</button>
        <button type="submit" name="action" value="AddToNight">Add to Night routine</button>
        </form>

    </div>
    
    <?php endforeach; ?>
    </div>
    <?php else: ?>
    <p>No routines found.</p>
    <?php endif;
    } else {
        echo '<p>Please login to see routines.</p>'; 
    } ?>

</body>
</html>

