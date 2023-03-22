<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Форум| Регистрация</title>
 </head>
<body align = "center">
  <h2>Регистрация<h2>
  <form action = "php/register.php" method = "post">
    <input type="text" name = "login" placeholder="Введите логин" required pattern=".{4,22}">4-22 символа<br>
    <input type="text" name = "nick_name" placeholder="Введите nick name" required><br>
    <input type="password" name = "passwd" placeholder="Введите пароль" required pattern=".{6,20}">6-20 символов<br>
    <input type="password" name = "conf_passwd" placeholder="Подтвердите пароль"><br>

    <?php
    //cообщение берется из файла php/register.php в случае совпадения данных, с уже имеющимися в БД
        if(isset($_SESSION['message'])){
          echo "<p>".$_SESSION['message']."</p>";
          unset($_SESSION['message']);
        }
    ?>

    <button type="submit" name="button">Подтвердить регистрацию</button><br>
  </form>
</body>
</html>