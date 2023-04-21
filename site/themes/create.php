<?php
session_start();
require_once("../scripts/connect_to_db.php");

if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = "Создавать темы могут только авторизованные пользователи";
    header('Location: ../authorization');
    exit();
}

$sql = "SELECT * FROM `chapters` WHERE 1";
if (!$chapters = $mysql->query($sql)) {
    echo "Ошибка на сервере";
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
    <link rel="stylesheet" href="/css/header.css">
    <title>«Точка общения» | Создать тему</title>
</head>
<?php include("../html_components/header.php"); ?>

<body>

    <form action="./scripts/create.php" method="post" enctype="multipart/form-data"><br>
        Название темы:
        <input type="text" name="post_name" required><br>
        Выберите раздел:
        <select name="chapter">
            <?php
            while ($chapter = $chapters->fetch_assoc()) {
                echo '<option value="' . $chapter["id"] . '">' . $chapter["name"] . '</option>';
            }
            ?><br>
        </select><br>
        Текст:
        <textarea name="post_text" required></textarea><br>
        <input type="file" name="f[]" multiple><br>
        <input type="submit" value="Опубликовать">
    </form>

    <?php
    if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);
    }
    ?>

</body>

</html>