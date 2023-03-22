<?php
    session_start();
?>

Главная

<?php
// Отображение одной из кнопок в зафисимости от факта авторизации
if($_SESSION['login']===true)
echo '<button onclick="window.location.href = \'authorization/profile.php\';">Личный кабинет</button>';
else
echo '<button onclick="window.location.href = \'authorization\';">Вход в аккаунт</button>';
?>
