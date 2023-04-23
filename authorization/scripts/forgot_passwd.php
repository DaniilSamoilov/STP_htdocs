<?php
session_start();
require_once "../../scripts/connect_to_db.php";

$email = htmlspecialchars(trim($_POST['email']));
$login = htmlspecialchars(trim($_POST['login']));


$sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `login` = '$login'";
$res = $mysql->query($sql);
if ($res->num_rows == 1) {
    if($send = mail($email,"Забытый пароль",$res['password']))
    {

    }
}