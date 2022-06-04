<?php
    setcookie('token', '', time() - 7*24*60*60 - 1, '/');
    header('Location: main.php');
?>