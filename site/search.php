<?php
session_start();
require_once("./scripts/connect_to_db.php");
require_once("./scripts/get_user_info.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <title>«Точка общения»|Поиск</title>
</head>
<?php include("./html_components/header.php"); ?>

<body>
    <main>
        <div class="head-container">Поиск</div>
        <div class="forum-top-block">
            <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Настройки поиска
            </a>
            <div class="collapse" id="collapseExample">
                <form class="d-flex search-filter-container" metod="POST">
                    <ul>
                        <li>Вы ищете:</li>
                        <li>
                            <input name="filter1" type="checkbox" id="relevance" value="relevance" checked>
                            <label for="relevance">Людей</label>
                        </li>
                        <li>
                            <input name="filter1" type="checkbox" id="popularity" value="popularity">
                            <label for="popularity">Темы</label>
                        </li>
                        <li>
                            <input name="filter1" type="checkbox" id="creation-date" value="creation-date">
                            <label for="creation-date">Комментарии</label>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
        <div class="head-container">Результаты поиска</div>
        <div class="forum-top-block">
            <ul class="forum-section_list">
        </div>
    
        </ul>