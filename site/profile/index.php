<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: /authorization');
  exit();
}
require_once("../scripts/get_user_info.php");
require_once("../scripts/connect_to_db.php");
require_once("../scripts/operations_with_files.php");

$user = get_user_by_id($mysql,  $_SESSION['user']['id']);
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

  <body >
    <div align="center">
    Профиль
      <div>
        <img src="<?= path_to_avatar . $user['avatar'] ?>" alt="<?= get_name_without_digits($user['avatar']) ?>" width="189" height="255">
        <br>
        <button onclick="window.location.href = '/authorization/change_avatar.php';">Сменить аватар</button>
      </div>


      <h2><?= htmlspecialchars($user['nick_name'], ENT_QUOTES, 'UTF-8') ?></h2>
      <button onclick="window.location.href = '/authorization/change_nick_name.php';">Смена ника</button>

      <h2>Репутация: <?= htmlspecialchars($user['score'], ENT_QUOTES, 'UTF-8') ?></h2>

      <h2>Почта: <?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>(В разработке)</h2><!--Почта врятли когда-либо будет реализована-->


      <?php
      if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
      }
      ?>


      <button onclick="window.location.href = '/authorization/change_passwd.php';">Смена пароля</button>


      <br><button onclick="window.location.href = '/authorization/scripts/logout.php';">Выйти из аккаунта</button>
    </div>
  </body>

</html>