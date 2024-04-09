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
            <a href="../css/homestyle.css"><img src="../VIEW/images/SKIN.jpg" class="logo" width="70px" height="70px"></a> 
        </div>
        <nav>
            <ul>
            <li><a href="routines.php">Skin Care Routines</a></li>
                <li><a href="resource.html">Resources</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <li><a href="makeup.html">Makeup Routines</a></li>
                <li><a href="user.html">User Profile</a></li>
            </ul>
        </nav>

    </header>

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

    <footer>
        <p>&copy; 2024 SkinClear. All rights reserved.</p>
</footer>

</body>

<script>
    const myDiv = document.getElementById('myDiv');
    myDiv.addEventListener('click', function() {
    window.location.href = '../ADMIN/morning.php'; 
    });

</script>
</html>
