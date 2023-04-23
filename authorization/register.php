<?php
session_start();
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

<body>
  <div align="center">
    Регистрация
    <form action="scripts/register.php" method="post">
      <input type="text" name="login" placeholder="Введите логин (4-22 символа)" required pattern=".{4,22}"><br>
      <input type="text" name="nick_name" placeholder="Введите nick name" required><br>
      <input type="password" name="passwd" placeholder="Введите пароль (6-20 символов)" required pattern=".{6,20}"><br>
      <input type="password" name="conf_passwd" placeholder="Подтвердите пароль"><br>

      <?php
      //cообщение берется из файла php/register.php в случае совпадения данных, с уже имеющимися в БД
      if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
      }
      ?>

      <button type="submit" name="button">Подтвердить регистрацию</button><br>
    </form>
  </div>
</body>

</html>