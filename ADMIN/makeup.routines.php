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
            <a href="../css/homestyle.css"><img src="../VIEW/images/SKIN.jpg" class="logo" width="70px" height="70px"></a> 
        </div>
        <nav>
            <ul>
                <li><a href="routines.html">Skin Care Routines</a></li>
                <li><a href="resource.html">Resources</a></li>
                <li><a href="makeup.html">Makeup Routines</a></li>
                <li><a href="user.html">User Profile</a></li>
                <li><a href="home.php">Home</a></li>

            </ul>
        </nav>
</header>
<div class='main_content'>
<p>Select Your Skin Care Routine</p>
</div>

<?php 
    include '../FUNCTIONS/routine_fxn.php'; 
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
        <button onclick="addToRoutine(<?php echo $routine['RegimeID']; ?>)">Add to Routine</button>
    </div>
    <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>No routines found.</p>
<?php endif; ?>
<script>
function addToRoutine(regimeID) {
    console.log("Adding RegimeID " + regimeID + " to routine. Implement this functionality as needed.");
}
</script>

</body>
</html>
