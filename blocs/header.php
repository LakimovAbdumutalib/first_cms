<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="/cms/style/header_style.css">
    
</head>
<body>

<nav class="main_text">
    <div class="text">
        <a href="/cms/index.php">Home</a> |
        <a href="/cms/log_reg/login.php">login</a> |
        <a href="/cms/log_reg/registration.php">registration</a> 

        <?php
        if (isset($_SESSION['user_id'])) {
            echo '| <a href="/cms/log_reg/logout.php">logout</a>';
        }
        
        ?>

        
    </div>
   
</nav>

<?php





?>


</body>
</html>
