<?php
session_start();
require_once "../../scripts/connect_to_db.php";

$avatar = $_FILES['f'];
const path_to_avatar = "../../user_files/users/";
$passwd = htmlspecialchars(trim($_POST['passwd']));
if (!isset($_SESSION['user'])) {
    header('Location: ../authorization');
    exit();
}
$user_id = $_SESSION['user']['id'];

if ($avatar['type'] != "image/png" && $avatar['type'] != "image/jpeg" && $avatar['type'] != "image/jpg" && $avatar['type'] != "image/gif") {
    $_SESSION['message'] = "Не допустимый тип файла";
    header('Location: ../change_avatar.php');
    exit();
}

$avatar_name = $avatar['name'];
$avatar_tmp = $avatar['tmp_name'];
$avatar_name = $user_id . time() . $avatar_name;
move_uploaded_file($avatar_tmp, path_to_avatar . $avatar_name);

$sql = "SELECT * FROM `users` WHERE `id` = '$user_id'";
$user = $mysql->query($sql)->fetch_assoc();
if ($user['password'] == $passwd) {
    $sql = "UPDATE `users` SET `avatar` = '$avatar_name' WHERE `users`.`id` = $user_id";
    $mysql->query($sql);
    $_SESSION['message'] = "Аватар успешно изменен";
    header('Location: /profile/');
    exit();
} else {
    $_SESSION['message'] = "Неверный пароль";
    header('Location: ../change_avatar.php');
    exit();
}
