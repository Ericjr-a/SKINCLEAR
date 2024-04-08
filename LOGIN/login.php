<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css"> <title>Login Form</title>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="../ACTION/login_action.php" method="POST" name="loginForm" id="loginForm">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="loginButton" id="button">Login</button>
            <p><a href="../LOGIN/register.html">Register Here</a></p>
        </form>
    </div>
</body>
</html>
