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
      <h1 class="logo_text text_center">Востановление пароля</h1>
      <div class="div_form text_center">
          <form action="scripts/forgot_passwd.php"  method="post">
              <div >
              <input class="form email" type="email" name="email" placeholder="Почта"><br>
              </div>
              <div>
                <input class="form submit" type="submit" name="button" value="Отправить пароль на почту">
            </div>
          </form>
          <?php
            if (isset($_SESSION['message'])) {
                echo "<p>" . $_SESSION['message'] . "</p>";
                unset($_SESSION['message']);
            }
            ?>
      </div>
  </div>
</body>
<style>
    @import url("../css/registration_form.css");
</style>
</html>