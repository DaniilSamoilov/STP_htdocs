<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: /authorization');
  exit();
}
?>

<form action="scripts\change_nick_name.php" method="POST">
  Смена ника<br>
  <input type="text" placeholder="Желаемое имя" name="new_nick_name"><br>
  <input type="password" name="passwd" placeholder="пароль" required pattern=".{6,20}"><br>

  <?php
  if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
  }
  ?>

  <button type="submit" name="button">Подтвердить</button><br>
</form>