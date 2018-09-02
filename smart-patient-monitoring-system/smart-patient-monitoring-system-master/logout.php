<?php
Session_start();
Session_destroy();
$_SESSION = array();

header("Location: login.php");

?>