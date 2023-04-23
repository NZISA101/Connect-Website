<?php



if($_SESSION['connect_user_id'])
{
    $_SESSION['connect_user_id'] = null;
    unset($_SESSION['connect_user_id']);

}

header("Location: login.php");