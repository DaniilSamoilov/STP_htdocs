<?php
session_start();
require_once "../../scripts/connect_to_db.php";

$prev_passwd = htmlspecialchars(trim($_POST['previous_passwd']));
$new_passwd = htmlspecialchars(trim($_POST['new_passwd']));
$conf_passwd = htmlspecialchars(trim($_POST['conf_passwd']));

if (!isset($_SESSION['user'])) {
    header('Location: ../authorization');
    exit();
}
$user_id = $_SESSION['user']['id'];
$sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";

$user = $mysql->query($sql)->fetch_assoc();

if ($new_passwd != $conf_passwd) {
    $_SESSION['message'] = "Пароли не совпадают";
    header('Location: ../change_passwd.php');
    exit();
}

if ($user['password'] == $prev_passwd) {
    $sql = "UPDATE `users` SET `password` = '$new_passwd' WHERE `users`.`id` = $user_id";
    $mysql->query($sql);
    $_SESSION['message'] = "Пароль успешно изменен";
    header('Location: /profile/');
    exit();
} else {
    $_SESSION['message'] = "Неверный пароль";
    header('Location: ../change_passwd.php');
    exit();
}
