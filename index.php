<?php
session_start();


require_once("db/db.php");
if (!isset($_SESSION['user_id'])) {
    header('Location:log_reg/login.php');

    exit;

}

?>
<div>
    <?php
    require 'blocs/header.php';
    ?>
</div>

<div>
    <?php
    require 'content/content.php';

    ?>
</div>

<div>
    <?php
    require 'blocs/footer.php';

    ?>
</div>