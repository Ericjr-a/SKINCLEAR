<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinClear </title>
    <link rel="stylesheet" href="../CSS/homestyle.css">
    <style>
        body{
            background-image: url("../VIEW/images/images.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="../css/homestyle.css"><img src="../VIEW/images/SKIN.jpg" class="logo" width="70px" height="70px"></a> 
        </div>
        <nav>
            <ul>
                <li><a href="routines.html">Skin Care Routines</a></li>
                <li><a href="dermatologists.html">Dermatologists</a></li>
                <li><a href="makeup.html">Makeup Routines</a></li>
                <li><a href="user.html">User Profile</a></li>
            </ul>
        </nav>

    </header>
    <div class = 'main_content'>
    <p> KINDLY SHARE YOUR FEEDBACK AND ANY COMMENTS TO HELP US IMPROVE</p>
    </div>
    <div>
        <form action="get_feedback.php" method="POST" name="feedback" id="feedback" >
            <div class="input_box">
                <input type="text" placeholder="Email">
            </div>
            <div class="input_box">
                <textarea name="" id="message" cols="50" rows="10"></textarea>
            </div>
            <button type="submit" id="button" name="submit" class="btn">Done</button> 
        </form>   
    </div>
 


</body>
</html>
