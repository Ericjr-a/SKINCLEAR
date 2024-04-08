<?php
include( '../FUNCTIONS/skintype.php');

$skintypes = skintype(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Page</title>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
</head>
<body>
    <header>
        <h2>SKIN CLEAR</h2>
        <h2>Sign up page</h2>
    </header>
    <div class="container">
        <form action="../ACTION/register_action.php" method="POST" name="registerForm" id="registerForm">
            <div class="input-group">
                <label for=" email">Email :</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="input-group">
                <label for=" username">Username :</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <select name="skintype" id="skintype" required class="stuff">
                <?php foreach ($skintypes as $skintype): ?>
                <option value="<?php echo htmlspecialchars($skintype['Sid']); ?>"><?php echo htmlspecialchars($skintype['typeName']); ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="submit" id="button"><a href="../LOGIN/login.html" class ="content">Register</a></button>
        </form>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>