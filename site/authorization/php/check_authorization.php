<?php
session_start();
require_once "../../scripts/connect_to_db.php";

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$passwd = filter_var(trim($_POST['passwd']), FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$passwd'";

if($check_user = $mysql->query($sql))
{
    foreach($check_user as $row){
        $_SESSION['login'] = true;
        $_SESSION['user'] = [
            "id"=>$row['id'],
            "nick_name" => $row['nick_name'],
            "avatar" => $row['avatar'],
            "email" => $row['email'],
            "score" => $row['score'],
        ];
    }
    header('Location: ../../');
    exit();
}
else
{
    $_SESSION['message'] = "Неверный пароль либо данной учётной забиси не сущетсвует";
    header('Location: ../');
    exit();
}
?>