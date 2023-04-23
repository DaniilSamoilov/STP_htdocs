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
    <div class="author_body">
        <h1 class="logo_text text_center">Смена пароля</h1>
        <div class="div_form text_center">
            <form action="scripts\change_passwd.php" method="POST">
                <div>
                    <input class="form previous_passwd" type="text" placeholder="Старый пароль" name="previous_passwd">
                </div>
                <div>
                    <input class="form new_passwd" type="password" name="new_passwd" placeholder="Новый пароль (6-20 символов)" required pattern=".{6,20}">
                </div>
                <div>
                    <input class="form conf_passwd" type="password" name="conf_passwd" placeholder="Подтвердите новый пароль" required>
                </div>
                <div>
                    <input class="form submit" name="button" value="Подтвердить" type="submit">
                </div>
                
                <?php
                if (isset($_SESSION['message'])) {
                    echo "<p>" . $_SESSION['message'] . "</p>";
                    unset($_SESSION['message']);
                }
                ?>

            </form>
        </div>
    </div>
</body>

<style>
    @import url("../css/registration_form.css");
</style>

</html>