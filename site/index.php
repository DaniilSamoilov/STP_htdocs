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
        темы<br>
        <table>
            <?php
            $sql = "SELECT * FROM `chapters`";
            $chapters = $mysql->query($sql);
            if (!$chapters = $mysql->query($sql)) {
                echo "Скорее всего ведется техническое обслуживание сайта, темы пока не доступны";
            } else {
                foreach ($chapters as $chapter) {
                    echo "<dev class = first_info><tr>"; //тут нужен большой отступ между элементами таблицы с классами first_info и second_info
                    echo "<td><a href='/themes?chapterid=$chapter[id]'>$chapter[name]</a></td>";
                    echo "</dev>";

                    echo "<dev class = second_info>";
                    echo "<td>Последняя тема: </td>";
                    echo "<td>Количество тем: </td>";
                    echo "</tr></dev>";
                }
            }
            ?>
        </table>
        
        <a href="/themes/create.php">Создать тему</a>
        <a href="">Мои темы</a>
        
    </div>
</body>

</html>