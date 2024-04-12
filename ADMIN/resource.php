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
<p>A special curated list of essential resources</p>
</div>
<div class="content-container">
<div class="dermatologists">
<?php 
    include '../FUNCTIONS/derm_fxn.php'; 
    if(!empty($var_data)): ?>
    <div class="derm-container"> 
    <?php foreach ($var_data as $derm): ?>
    <div class="derm-box">
        <div class="derm-title"><?php echo htmlspecialchars($derm['DName']); ?></div>
        <br/>
        <div class="derm-desc"><?php echo nl2br(htmlspecialchars($derm['HospitalAffiliation'])); ?></div>
        <br/>
        <div class="derm-steps"><?php echo nl2br(htmlspecialchars($derm['ContactInfo'])); ?></div>
        <br/>
    </div>
    <?php endforeach; ?>
    </div>
    <?php else: ?>
    <p>No information found.</p>
    <?php endif;
  ?>
</div>
<div class="makeup-brands">
    <?php 
    include '../FUNCTIONS/brand_fxn.php'; 
    if(!empty($var_data)): ?>
    <div class="brand-container">
    <?php foreach ($var_data as $brand): ?>
    <div class="brand-box">
        <div class="brand-title"><?php echo htmlspecialchars($brand['BrandName']); ?></div>
        <br/>
        <div class="brand-desc"><?php echo nl2br(htmlspecialchars($brand['ProductType'])); ?></div>
        <br/>
        <div class="brand-steps"><?php echo nl2br(htmlspecialchars($brand['ProductURL'])); ?></div>
        <br/>
    </div>
    <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>No information found.</p>
<?php endif; ?>
</div>
</div>

</body>
</html>
