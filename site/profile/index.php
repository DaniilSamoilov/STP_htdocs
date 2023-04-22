<?php
session_start();
if (!isset($_SESSION['user'])) {
  $_SESSION['user'] = null;
}

require_once("../scripts/get_user_info.php");
require_once("../scripts/connect_to_db.php");
require_once("../scripts/operations_with_files.php");

$searched_id = isset($_GET['user_id']) && is_numeric($_GET['user_id']) ? $_GET['user_id'] : null;

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
  <?php
  if ($searched_id === null || !isset($_SESSION['user']) || $searched_id == $_SESSION['user']['id']) {
    if (!isset($_SESSION['user'])) {
      header('Location: /authorization');
      exit();
    }

    $user = get_user_by_id($mysql,  $_SESSION['user']['id']);
  ?>
    <div>
      <a>Профиль пользователя</a>
      <a href="../themes/?userid=<?= $user['id'] ?>">Мои посты</a>
    </div>
    <div align="center">
      Профиль
      <div>
        <img src="<?= path_to_avatar . $user['avatar'] ?>" alt="<?= get_name_without_digits($user['avatar']) ?>" width="189" height="255">
        <br>
        <button onclick="window.location.href = '/authorization/change_avatar.php';">Сменить аватар</button>
      </div>


      <div>
        <h2><?= htmlspecialchars($user['nick_name'], ENT_QUOTES, 'UTF-8') ?></h2>
        <button onclick="window.location.href = '/authorization/change_nick_name.php';">Смена ника</button>
      </div>
      <div>
        <h2>Репутация: <?= htmlspecialchars($user['score'], ENT_QUOTES, 'UTF-8') ?></h2>
      </div>
      <div>
        <h2>Почта: <?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>(В разработке)</h2><!--Почта врятли когда-либо будет реализована-->
      </div>

      <button onclick="window.location.href = '/authorization/change_passwd.php';">Смена пароля</button>

      <div>
        <a href="chat.php?user_id=<?= $user['id'] ?>">Заметки</a>
      </div>

      <br><button onclick="window.location.href = '/authorization/scripts/logout.php';">Выйти из аккаунта</button>

    </div>
  <?php
  } else {
    $user = get_user_by_id($mysql, $searched_id);
  ?>
    <div>
      <a>Профиль пользователя</a>
      <a href="../themes/?userid=<?= $user['id'] ?>">Посты пользователя</a>
    </div>
    <div align="center">
      Профиль
      <div>
        <img src="<?= path_to_avatar . $user['avatar'] ?>" alt="<?= get_name_without_digits($user['avatar']) ?>" width="189" height="255">
        <br>
        <button onclick="window.location.href = '/authorization/change_avatar.php';">Сменить аватар</button>
      </div>

      <div>
        <h2><?= htmlspecialchars($user['nick_name'], ENT_QUOTES, 'UTF-8') ?></h2>
      </div>

      <div>
        <h2>Почта: <?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>(В разработке)</h2><!--Почта врятли когда-либо будет реализована-->
      </div>

      <div>
        <a href="chat.php?user_id=<?= $user['id'] ?>">Написать сообщение</a>
      </div>
    <?php
  }
  if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
  }
    ?>
</body>

</html>