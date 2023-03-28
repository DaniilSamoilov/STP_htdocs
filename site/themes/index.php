<?php
session_start();
require_once("../scripts/connect_to_db.php")
?>


<head>

</head>
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