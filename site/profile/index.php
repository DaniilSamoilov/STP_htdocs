<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: /authorization');
  exit();
}
require_once("../scripts/get_user_info.php");
require_once("../scripts/connect_to_db.php");

$user = get_user_by_id($mysql,  $_SESSION['user']['id']);
?>

<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <title>Форум| Личный профиль</title>
</head>

<body align="center">
  <h2>Профиль<h2>

      <h2><?= $user['nick_name'] ?></h2>
      <button onclick="window.location.href = '/authorization/change_nick_name.php';">Смена ника</button>

      <img src="<?= $user['avatar'] ?>" width="100" alt="">
      <h2>Репутация: <?= $user['score'] ?></h2>

      <h2>Почта: <?= $user['email'] ?>(В разработке)</h2><!--Почта врятли когда-либо будет реализована-->


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