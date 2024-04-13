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

<div class="dermatologists">
<?php 
    include '../FUNCTIONS/derm_fxn.php'; 
    if(!empty($var_data)): ?>
    <div class="derm-container"> 
    <?php foreach ($var_data as $derm): ?>
    <div class="derm-box">
        <div class="title"><p>Dermatologist info</p></div>
        <div class="routine-title"><?php echo htmlspecialchars($derm['DName']); ?></div>
        <br/>
        <div class="routine-desc"><?php echo nl2br(htmlspecialchars($derm['HospitalAffiliation'])); ?></div>
        <br/>
        <div class="routine-steps"><?php echo nl2br(htmlspecialchars($derm['ContactInfo'])); ?></div>
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
        <div class="title"><p>Makeup Brands</p></div>
        <div class="routine-title"><?php echo htmlspecialchars($brand['BrandName']); ?></div>
        <br/>
        <div class="routine-desc"><?php echo nl2br(htmlspecialchars($brand['ProductType'])); ?></div>
        <br/>
        <div class="routine-steps"><a href="<?php echo htmlspecialchars($brand['ProductURL']); ?>" class="a_button">View Product</a></div>
        <br/>
    </div>
    <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>No information found.</p>
<?php endif; ?>
</div>


</body>
</html>
