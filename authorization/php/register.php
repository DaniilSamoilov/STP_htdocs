<?php
    require_once '../../scripts/connect_to_db.php';
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $passwd = filter_var(trim($_POST['passwd']), FILTER_SANITIZE_STRING);
    echo $login;
    echo $passwd;
    $mysql = new mysqli("localhost", "root", "", "site");
    $sql = "INSERT INTO `users` (`id`, `login`, `password`, `score`) VALUES (NULL, '$login', '$passwd', '0')";
    //echo $sql;
    $mysql->query($sql);
    $mysql->close();
    header('Location: /');
?>