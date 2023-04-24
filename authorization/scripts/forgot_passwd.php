<?php
session_start();
require_once "../../scripts/connect_to_db.php";

$email = $_POST['email'];

$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
$res = $mysql->query($sql);
if ($res->num_rows == 1) {
    $res = $res->fetch_assoc();
    if($send_mail = mail($email,"Забытый пароль",$res['password'],"From: tochka.obshcheniya@yandex.ru"))
    {
        header('Location: ../forgot_passwd.php');
    }
    else {
        $_SESSION['message'] = "Не удалось отправить сообщение";
        header('Location: ../forgot_passwd.php');
    }
    
}
else {
    $_SESSION['message'] = "Неверная почта";
    header('Location: ../forgot_passwd.php');
}