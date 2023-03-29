<?php
session_start();
require_once("../scripts/connect_to_db.php")
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <title>«Точка общения»|Список тем</title>
</head>
<?php include("../html_components/header.php"); ?>
<html>

<body>
    Темы

    <?php
    if (!isset($_GET['chapterid'])) {
        echo "Id раздела не указан";
    } else {
        $chapterid = $_GET['chapterid'];
        $sql = "SELECT * FROM `chapters` WHERE `id` = '$chapterid'";
        if (!$mysql->query($sql)->num_rows) {
            echo "Раздела не существует";
        } else {
            $sql = "SELECT * FROM `posts` WHERE `chapterid` = '$chapterid'";
            $posts = $mysql->query($sql);
            if (!$posts = $mysql->query($sql)) {
                echo "<p>Темы для данного раздела не найдены</p>";
            } else {
                echo "<li>";
                foreach ($posts as $post) {
                    print_r($post); //пока здесь заглушка
                }
                echo "</li>";
            }
        }
    }
    ?>
</body>

</html>