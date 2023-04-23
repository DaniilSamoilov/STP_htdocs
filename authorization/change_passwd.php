<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /authorization');
    exit();
}
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
    <div>
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
    </div>
</body>

</html>