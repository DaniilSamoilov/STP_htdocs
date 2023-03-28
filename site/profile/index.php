<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: /authorization');
  exit();
}
?>

<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <title>Форум| Личный профиль</title>
</head>

<body align="center">
  <h2>Профиль<h2>

      <h2><?= $_SESSION['user']['nick_name'] ?></h2>
      <button onclick="window.location.href = '/authorization/change_nick_name.php';">Смена ника</button>

      <img src="<?= $_SESSION['user']['avatar'] ?>" width="100" alt="">
      <h2><?= $_SESSION['user']['score'] ?></h2>

      <h2><?= $_SESSION['user']['email'] ?>(В разработке)</h2><!--Почта врятли когда-либо будет реализована-->


      <?php
      if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
      }
      ?>


      <button onclick="window.location.href = '/authorization/change_passwd.php';">Смена пароля</button>


      <br><button onclick="window.location.href = '/authorization/scripts/logout.php';">Выйти из аккаунта</button>
</body>

</html>