<?php
session_start();
require_once "../../scripts/connect_to_db.php";

$login = htmlspecialchars(trim($_POST['login']));
$passwd = htmlspecialchars(trim($_POST['passwd']));

$sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$passwd'";

$check_user = $mysql->query($sql);
if ($user = $check_user->fetch_assoc()) {
    $_SESSION['user'] = [
        "id" => $user['id'],
        "nick_name" => $user['nick_name'],
        "avatar" => $user['avatar'],
        "email" => $user['email'],
        "score" => $user['score'],
    ];
    header('Location: /');
    exit();
} else {
    $_SESSION['message'] = "Неверный пароль либо данной учётной записи не сущетсвует";
    header('Location: ../');
    exit();
}
