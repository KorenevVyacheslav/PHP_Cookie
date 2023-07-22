<?php
session_start();
session_destroy();
setcookie('login', '');
$_SESSION['auth'] = false;
header ('Location: http://project/index.php' );
?>