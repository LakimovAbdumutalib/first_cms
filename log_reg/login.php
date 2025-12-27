<?php
    session_start();




    require '../blocs/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/cms/style/login_page_style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="process_login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>          
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form> 
        <p>Don't have an account? <a href="/cms/log_reg/registration.php">Register here</a></p>
    </div>  
</body>
</html>