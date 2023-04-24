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
  <title>Студенческий форум КФУ «Точка общения»</title>
</head>
<?php include("../html_components/header.php"); ?>

<body>
  <div class="container_body">
    <h1 class="logo_text text_center">Регистрация</h1>
    <div class="div_form text_center">
        <form action="scripts/register.php" method="post" enctype="multipart/form-data">
            <div>
                <input class="form login" type="text" placeholder="Введите имя" name="login" required pattern=".{4,22}">
            </div>
            <div>
                <input class="form pass" type="password" placeholder="Введите пароль (6-20 символов)" name="passwd" required pattern=".{6,20}">
            </div>
            <div>
                <input class="form pass" type="password" placeholder="Повторите пароль" name="conf_passwd" required>
            </div>
            <div>
                <input class="form nick_name" type="text" placeholder="Введите ник" name="nick_name" required>
            </div>
            <div>
                <input class="form email" type="email" placeholder="Введите e-mail" name="email">
            </div>
            <div>
                <input class="form avatar" id="avatar" type="file" accept="image/*" name="avatar" hidden>
                <label for="avatar">Выберите файл для аватара</label>
            </div>
            <div>
                <input class="form submit" type="submit" name="button" value="Подтвердить регистрацию">
            </div>
        </form>
    </div>
    <p class="logo_login text_center">
        Уже есть аккаунт?
        <a class="logo_login_href" href="index.php">Войти</a>
    </p>
    <?php
      //cообщение берется из файла php/register.php в случае совпадения данных, с уже имеющимися в БД
      if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
      }
      ?>
</div>

</body>
<style>
    @import url("../css/registration_form.css");
</style>
</html>