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
  <title>Студенческий форум КФУ «Точка общения»</title>
</head>
<?php include("../html_components/header.php"); ?>

<body>
  <div class="author_body">
      <h1 class="logo_text text_center">Авторизация</h1>
      <div class="div_form text_center">
          <form action="scripts/check_authorization.php"  method="post">
              <div>
                  <input class="form login" type="text" placeholder="Введите имя" name="login">
              </div>
              <div>
                  <input class="form pass" type="password" placeholder="Введите пароль" name="passwd">
              </div>
              <div>
                  <input class="form submit" name="button" value="Войти" type="submit">
              </div>
          </form>
          <button class="half_button form" onclick="window.location.href = 'register.php';">Зарегистрироваться</button>
          <button class="half_button form" onclick="window.location.href = 'forgot_passwd.php';">Забыли пароль</button>
      </div>
      <p class="logo_login text_center">
          Если нет аккаунта
          <a class="logo_login_href" href="#">Зарегистрироваться</a>
      </p>
  </div>
    <?php
    //cообщение берется из файла php/register.php в случае совпадения данных, с уже имеющимися в БД
    if (isset($_SESSION['message'])) {
      echo "<p>" . $_SESSION['message'] . "</p>";
      unset($_SESSION['message']);
    }
    ?>

</body>
<style>
      @import url("../css/registration_form.css");
  </style>

</html>