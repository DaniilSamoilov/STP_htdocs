<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /authorization');
    exit();
}
?>

<form action="scripts\change_passwd.php" method="POST">
    Смена пароля<br>
    <input type="text" placeholder="старый пароль" name="previous_passwd"><br>
    <input type="password" name="new_passwd" placeholder="новый пароль" required pattern=".{6,20}">6-20 символов<br>
    <input type="password" name="conf_passwd" placeholder="Подтвердите новый пароль" required><br>

    <?php
    if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    ?>

    <button type="submit" name="button">Подтвердить</button><br>
</form>