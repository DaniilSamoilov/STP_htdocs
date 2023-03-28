<?php
session_start();
require_once "../../scripts/connect_to_db.php";

$new_nick_name = htmlspecialchars(trim($_POST['new_nick_name']));
$passwd = htmlspecialchars(trim($_POST['passwd']));

$user_id = $_SESSION['user']['id'];
$sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";

$user = $mysql->query($sql)->fetch_assoc();


if ($user['password'] == $passwd) {
    $sql = "UPDATE `users` SET `nick_name` = '$new_nick_name' WHERE `users`.`id` = $user_id";
    $mysql->query($sql);
    $_SESSION['message'] = "Имя пользователя успешно изменено";
    header('Location: /profile/');
    exit();
} else {
    $_SESSION['message'] = "Неверный пароль";
    header('Location: ../change_nick_name.php');
    exit();
}
