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
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Точка общения</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Главная</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        // Отображение одной из кнопок в зафисимости от факта авторизации
                        if (isset($_SESSION['user']))
                            echo '<a class="nav-link" href="/profile">Кабинет</a>';
                        else
                            echo '<a class="nav-link" href="authorization\">Авторизация</a>';
                        ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Популярное</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Найти</button>
                </form>
            </div>
        </div>
    </nav>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

<div><!--Тут разелы тем-->
    <table>
        <caption>Темы</caption>
        <?php
        $sql = "SELECT * FROM `chapters`";
        $chapters = $mysql->query($sql);
        if (!$chapters->num_rows > 0) {
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
</div>