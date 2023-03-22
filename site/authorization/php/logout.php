<?php
session_start();
unset($_SESSION['user']);
$_SESSION['login']=false;
header('Location: ../../');
exit();
?>