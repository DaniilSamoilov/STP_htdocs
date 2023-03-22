<?php
    session_start();
    require_once '../../scripts/connect_to_db.php';

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $passwd = filter_var(trim($_POST['passwd']), FILTER_SANITIZE_STRING);
    $conf_passwd = filter_var(trim($_POST['conf_passwd']), FILTER_SANITIZE_STRING);
    $nick_name = filter_var(trim($_POST['nick_name']), FILTER_SANITIZE_STRING);

    if ($passwd !== $conf_passwd){
        $_SESSION['message'] = "Пароли не совпадают";
        header('Location: ../register.php');
        exit();
    }

    $sql = "SELECT * FROM `users` WHERE `login` = '$login'";
    if ($mysql->query($sql)->num_rows){
        $_SESSION['message'] = "Данный логин уже используется";
        header('Location: ../register.php');
        exit();
    }

    $sql = "SELECT 1 FROM `users` WHERE `nick_name` = '$nick_name'";
    if ($mysql->query($sql)->num_rows){
        $_SESSION['message'] = "Данное имя пользователя уже используется";
        header('Location: ../register.php');
        exit();
    }

    $sql = "INSERT INTO `users` (`id`, `login`, `password`, `nick_name`, `email`, `avatar`, `score`) VALUES (NULL, '$login', '$passwd', '$nick_name', '', '', '0')";
    //echo $sql;
    $mysql->query($sql);
    $mysql->close();
    header('Location: ../');
?>