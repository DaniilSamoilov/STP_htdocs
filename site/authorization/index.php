<?php
session_start();
if (isset($_SESSION['user'])) {
  header('Location: ../index.php');
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/header.css">
  <title>Студенческий форум КФУ «Точка общения»</title>
</head>
<?php include("../html_components/header.php"); ?>

<body align="center">
  Авторизация
  <div>
    <form action="scripts/check_authorization.php" method="post">
      <input type="text" name="login" placeholder="Введите логин"><br>
      <input type="password" name="passwd" placeholder="Введите пароль"><br>
      <button type="submit" name="button">Войти</button><br>
    </form>

    <?php
    //cообщение берется из файла php/register.php в случае совпадения данных, с уже имеющимися в БД
    if (isset($_SESSION['message'])) {
      echo "<p>" . $_SESSION['message'] . "</p>";
      unset($_SESSION['message']);
    }
    ?>

    <button onclick="window.location.href = 'register.php';">Зарегистрироваться</button>
    <button onclick="window.location.href = 'change_pwd.php';">Забыли пароль</button>
  </div>
</body>

</html>