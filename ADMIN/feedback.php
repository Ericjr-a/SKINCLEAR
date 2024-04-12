<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinClear </title>
    <link rel="stylesheet" href="../CSS/homestyle.css">
    <style>
        body{
            background-image: url("../CSS/images/images.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
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
                <li><a href="home.php">Home</a></li>
            </ul>
        </nav>

    </header>
    <div class = 'main_content'>
    <p> KINDLY SHARE YOUR FEEDBACK AND ANY COMMENTS TO HELP US IMPROVE</p>
    </div>
    <div>
        <form action="../ACTION/get_feedback.php" method="POST" name="feedback" id="feedback" class="form_class" >
            <div class="input_box">
                <input type="text" placeholder="Email" name="email"> </div>
            <div class="input_box">
                <textarea name="comments" id="message" cols="50" rows="10"></textarea> </div>
            <button type="submit" id="button" name="submit" class="btn">Done</button> 
        </form> 
    </div>
 


</body>
</html>
