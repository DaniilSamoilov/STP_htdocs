<?php
session_start();
require_once '../../scripts/connect_to_db.php';

$login = htmlspecialchars(trim($_POST['login']));
$passwd = htmlspecialchars(trim($_POST['passwd']));
$conf_passwd = htmlspecialchars(trim($_POST['conf_passwd']));
$nick_name = htmlspecialchars(trim($_POST['nick_name']));
$email = htmlspecialchars(trim($_POST['email']));
if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
    $avatar= $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'], '../../user_files/users/'.$_FILES['avatar']['name']);
}
else{
    $avatar = "default.png";
}

if ($passwd !== $conf_passwd) {
    $_SESSION['message'] = "Пароли не совпадают";
    header('Location: ../register.php');
    exit();
}

$sql = "SELECT * FROM `users` WHERE `login` = '$login'";
if ($mysql->query($sql)->num_rows) {
    $_SESSION['message'] = "Данный логин уже используется";
    header('Location: ../register.php');
    exit();
}

$sql = "SELECT 1 FROM `users` WHERE `nick_name` = '$nick_name'";
if ($mysql->query($sql)->num_rows) {
    $_SESSION['message'] = "Данное имя пользователя уже используется";
    header('Location: ../register.php');
    exit();
}

$sql = "SELECT 1 FROM `users` WHERE `email` = '$email'";
if ($mysql->query($sql)->num_rows) {
    $_SESSION['message'] = "Данная почта уже используется";
    header('Location: ../register.php');
    exit();
}

$sql = "INSERT INTO `users` (`id`, `login`, `password`, `nick_name`, `email`, `avatar`, `score`)
VALUES (NULL, '$login', '$passwd', '$nick_name', '$email', '$avatar', '0')";
//echo $sql;
$mysql->query($sql);
$mysql->close();
header('Location: ../');
