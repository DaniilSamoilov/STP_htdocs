<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Форум| Авторизация</title>
 </head>
<body align = "center">
  <h2>Авторизация<h2>

  <form action = "php/check_authorization.php" method = "post">
    <input type="text" name = "login" placeholder="Введите логин"><br>
    <input type="password" name = "passwd" placeholder="Введите пароль"><br>
    <button type="submit" name = "button">Войти</button><br>
  </form>

  <?php
    //cообщение берется из файла php/register.php в случае совпадения данных, с уже имеющимися в БД
        if(isset($_SESSION['message'])){
          echo "<p>".$_SESSION['message']."</p>";
          unset($_SESSION['message']);
        }
    ?>
  
  <button onclick="window.location.href = 'register.php';">Зарегистрироваться</button>
  <button onclick="window.location.href = 'change_pwd.php';">Забыли пароль</button>
</body>
</html>