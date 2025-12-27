<?php
    session_start();



    require '../blocs/header.php';

?>

<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="/cms/style/registration_page_style.css">
</head>
<body>
    <div class="registration-container">
        <h2>Register</h2>
        <form action="signup_action.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>          
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
        </form> 
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>  
</body>
</html>