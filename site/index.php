<?php
session_start();
?>

Главная

<?php
// Отображение одной из кнопок в зафисимости от факта авторизации
if (isset($_SESSION['user']))
    echo '<button onclick="window.location.href = \'/profile\';">Личный кабинет</button>';
else
    echo '<button onclick="window.location.href = \'authorization\';">Вход в аккаунт</button>';
?>