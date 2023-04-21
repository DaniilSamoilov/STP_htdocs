<?php
session_start();
require_once("./scripts/connect_to_db.php")


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/header.css">
    <title>Студенческий форум КФУ «Точка общения»</title>
</head>
<?php include("./html_components/header.php"); ?>

<body>
    <div><!--Тут разелы тем-->
        Темы<br>
        <table>
            <?php
            $sql = "SELECT * FROM `chapters`";
            $chapters = $mysql->query($sql);
            if (!$chapters = $mysql->query($sql)) {
                echo "Скорее всего ведется техническое обслуживание сайта, темы пока не доступны";
            } else {
                foreach ($chapters as $chapter) {
                    //запрос БД для получения количества тем  и последней темы в разделе(chapter)
                    $sql = "SELECT * FROM `posts` WHERE `chapter_id` = $chapter[id] ORDER BY date DESC";
                    $posts = $mysql->query($sql);
                    $last_post = $posts->fetch_assoc();
                    //костыль, чтобы если тем нет, переменные не были пустыми
                    if (!$count_posts = $posts->num_rows) {
                        $last_post['post_id'] = 0;
                        $last_post['post_name'] = "Нет тем";
                    }
            ?>
                    <dev class=first_info>
                        <tr> <!-- тут нужен большой отступ между элементами таблицы с классами first_info и second_info -->
                            <td><a href='/themes?chapterid=<?= $chapter['id'] ?>'><?= $chapter['name'] ?></a></td>
                    </dev>

                    <dev class=second_info>
                        <td>Последняя тема: <a href="./themes/this_post.php?post_id=<?= $last_post['post_id'] ?>"><?= htmlspecialchars($last_post['post_name'], ENT_QUOTES, 'UTF-8') ?> </a> </td>
                        <td>Количество тем: <?= $posts->num_rows ?> </td>
                        </tr>
                    </dev>
            <?php
                }
            }
            ?>
            <td><a href="themes/?filter2=popularity&filter3=descending&filter1=week">Популярное</a></td>
        </table>

        <a href="/themes/create.php">Создать тему</a>

    </div>
</body>

</html>