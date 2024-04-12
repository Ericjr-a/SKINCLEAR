<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SkinClear</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-image: url('../../SKINCLEAR/VIEW/images/SKIN.jpg'); 
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }
    
   
    .container {
        display: center;
        align-items: center;
        text-align: center;
        margin-bottom: 50px; 
    }


    button {
        padding: 10px 20px;
        margin: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        background-color:black;
        color: white;
    }

    button:hover {
        background-color: black;
    }
</style>
</head>
<body>
<div class="container">
    <button onclick="location.href='../../SKINCLEAR/LOGIN/login.php'">Login</button>
    <button onclick="location.href='../../SKINCLEAR/LOGIN/register.php'">Register</button>
</div>
</body>
</html>
