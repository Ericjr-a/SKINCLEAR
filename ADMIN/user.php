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
                <li><a href="routines.php">Skin Care Routines</a></li>
                <li><a href="resource.php">Resources</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <li><a href="makeup.php">Makeup Routines</a></li>
                <li><a href="user.php">User Profile</a></li>
                <li><a href="home.php">Home</a></li>
            </ul>
        </nav>

    </header>
    <form method="POST" action="../ACTION/change_username.php">
        <label for="username">Change Username:</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Update Username</button>
    </form>

    <form method="POST" action="../ACTION/add_goal.php">
        <label for="goal">Add New Goal:</label>
        <input type="text" id="goal" name="goal" required>
        <button type="submit">Add Goal</button>
    </form>

    <h3>Your Goals</h3>
    <table>
        <thead>
            <tr>
                <th>Goal</th>
                <th>Date Added</th>
            </tr>
        </thead>
        <tbody>
            <?php include '..ACTION/get_goals.php'; ?>
        </tbody>
    </table>

</body>
</html>
