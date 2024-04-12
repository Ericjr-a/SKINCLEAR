<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinClear </title>
    <link rel="stylesheet" href="../CSS/homestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
    <div class="side_content">
    <?php 
    session_start(); 
    include ('../ACTION/login_action');
    if (isset($_SESSION['username'])) {
        echo "Hi, " . htmlspecialchars($_SESSION['username']) . "!";
    } else {
        echo "You are not logged in.";
    }
    ?>
    </div>

    <div class = "sidebar">
    <div class ="main_form">
    <form method="POST" action="../ACTION/change_username.php" class = "form_content">
        <label for="username">Change Username:</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Update Username</button>
    </form>

    <form method="POST" action="../ACTION/add_goal.php" class = "form_content">
        <label for="goal">Add New Goal:</label>
        <input type="text" id="goal" name="goal" required>
        <label for="dob">Date</label>
        <input type="date" placeholder="Date" name="date" id="date" required>
        <button type="submit">Add Goal</button>
    </form>
    <a href="../LOGIN/logout.php">Logout</a>
    </div>
    </div>
   

    <table>
        <thead>
            <tr>
                <th>Goal Number</th>
                <th>Goals</th>
                <th>Date Added</th>
                <th>Achieved</th>
            </tr>
        </thead>
        <tbody>
        <?php
        include '../FUNCTIONS/goal_fxn.php'; 
        if (!empty($var_data)) {
            foreach ($var_data as $goal) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($goal['GoalID']) . "</td>";
                echo "<td>" . htmlspecialchars($goal['goal']) . "</td>";
                echo "<td>" . htmlspecialchars($goal['date_added']) . "</td>";
                echo "<td>";
                echo "<a href='../ACTION/achieved.php?id=" . htmlspecialchars($goal['GoalID']) . "' class='achieve-icon'><i class='fas fa-check-square'></i></a>";
                echo "</td>";
                echo "</tr>";

            }
        } else {
            echo "<tr><td colspan='4'>No goals found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</body>
</html>
