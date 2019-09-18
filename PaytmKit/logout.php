<?php
session_start();

unset($_SESSION['userid']);
header('LOCATION: index.php');
?>