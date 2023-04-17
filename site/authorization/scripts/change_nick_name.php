<?php
session_start();
require_once "../../scripts/connect_to_db.php";

$new_nick_name = htmlspecialchars(trim($_POST['new_nick_name']));
$passwd = htmlspecialchars(trim($_POST['passwd']));

if (!isset($_SESSION['user']) || $_SESSION['user'] === null) {
    header('Location: ../');
    exit();
}
$user_id = $_SESSION['user']['id'];
$sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";

$user = $mysql->query($sql)->fetch_assoc();


if ($user['password'] == $passwd) {
    $sql = "SELECT 1 FROM `users` WHERE `nick_name` = '$new_nick_name'";
    if ($mysql->query($sql)->num_rows) {
        $_SESSION['message'] = "Данное имя пользователя уже используется";
        header('Location: ../change_nick_name.php');
        exit();
    } else {
        $sql = "UPDATE `users` SET `nick_name` = '$new_nick_name' WHERE `users`.`id` = $user_id";
        $mysql->query($sql);
        $_SESSION['message'] = "Имя пользователя успешно изменено";
        header('Location: /profile/');
        exit();
    }
} else {
    $_SESSION['message'] = "Неверный пароль";
    header('Location: ../change_nick_name.php');
    exit();
}
