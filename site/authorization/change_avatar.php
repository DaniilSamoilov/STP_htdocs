<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: /authorization');
  exit();
}
?>

<form action="scripts\change_avatar.php" method="POST" enctype="multipart/form-data">
  Смена аватара<br>
  <input type="file" name="f"><br>
  <input type="password" name="passwd" placeholder="пароль" required pattern=".{6,20}"><br>

  <?php
  if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']);
  }
  ?>

  <button type="submit" name="button">Подтвердить</button><br>
</form>