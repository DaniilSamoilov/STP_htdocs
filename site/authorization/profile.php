<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Форум| Личный профиль</title>
 </head>
<body align = "center">
  <h2>Профиль<h2>

  <h2><?=$_SESSION['user']['nick_name']?></h2>
  тут будет смена ника

  <img src = "<?= $_SESSION['user']['avatar']?>" width = "100" alt = "">
  <h2><?=$_SESSION['user']['score']?></h2>

  <h2><?=$_SESSION['user']['email']?></h2>
    Почта врятли когда-либо будет реализована

  <?php
    //cообщение берется из файла php/register.php в случае совпадения данных, с уже имеющимися в БД
        if(isset($_SESSION['message'])){
          echo "<p>".$_SESSION['message']."</p>";
          unset($_SESSION['message']);
        }
    ?>
  
  <br><button onclick="window.location.href = 'php/logout.php';">Выйти</button>
</body>
</html>