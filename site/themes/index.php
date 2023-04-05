<?php
session_start();
require_once("../scripts/connect_to_db.php");
require_once("../scripts/get_user_info.php");

$chapterid = isset($_GET['chapterid']) ? $_GET['chapterid'] : 0;
// данные для пагинации
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit_on_page = isset($_GET['limit_on_page']) ? $_GET['limit_on_page'] : 5;
echo "$limit_on_page <br>";
$offset = $limit_on_page * ($page - 1);
//$count_pages количество страниц вычисляется ниже

// данные фильтрации и сортировки
// сначала устанавливаются из POST, а затем из COOKIE, чтобы при перелистывании страницы, настройки не сбивались
$filter1 = isset($_GET['filter1']) ? $_GET['filter1'] : "all_time";
$filter2 = isset($_GET['filter2']) ? $_GET['filter2'] : "creation-date";
$filter3 = isset($_GET['filter3']) ? $_GET['filter3'] : "ascending";

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>«Точка общения»|Поиск</title>
</head>
<?php include("../html_components/header.php"); ?>

<body>
    <main>
        <div class="head-container">Поиск</div>
        <div class="forum-top-block">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Найти</button>
            </form>
            <a data-bs-toggle="collapse" href="#search-settings" role="button" aria-expanded="false" aria-controls="search-settings">
                Настройки поиска
            </a>
            <div class="collapse" id="search-settings">
                <form class="d-flex search-filter-container" action="./?chapterid=1&page=2" method="GET">
                    <ul>
                        <li>Сортировать по:</li>
                        <li>
                            <input name="filter2" type="radio" id="relevance" value="relevance" <?php if ($filter2 == "relevance") echo "checked" ?>>
                            <label for="relevance">Релевантности</label>
                        </li>
                        <li>
                            <input name="filter2" type="radio" id="popularity" value="popularity" <?php if ($filter2 == "popularity") echo "checked" ?>>
                            <label for="popularity">Популярности</label>
                        </li>
                        <li>
                            <input name="filter2" type="radio" id="creation-date" value="creation-date" <?php if ($filter2 == "creation-date") echo "checked" ?>>
                            <label for="creation-date">Дате создания</label>
                        </li>
                    </ul>
                    <ul>
                        <br>
                        <li>
                            <input name="filter3" type="radio" id="descending" value="descending" <?php if ($filter3 == "descending") echo "checked" ?>>
                            <label for="descending">По убыванию</label>
                        </li>
                        <li>
                            <input name="filter3" type="radio" id="ascending" value="ascending" <?php if ($filter3 == "ascending") echo "checked" ?>>
                            <label for="ascending">По возростанию</label>
                        </li>
                    </ul>
                    <ul>
                        <br>
                        За:
                        <li>
                            <input name="filter1" type="radio" id="today" value="today" <?php if ($filter1 == "today") echo "checked" ?>>
                            <label for="today">Сегодня</label>
                        </li>
                        <li>
                            <input name="filter1" type="radio" id="week" value="week" <?php if ($filter1 == "week") echo "checked" ?>>
                            <label for="week">Неделю</label>
                        </li>
                        <li>
                            <input name="filter1" type="radio" id="month" value="month" <?php if ($filter1 == "month") echo "checked" ?>>
                            <label for="month">Месяц</label>
                        </li>
                        <li>
                            <input name="filter1" type="radio" id="year" value="year" <?php if ($filter1 == "year") echo "checked" ?>>
                            <label for="year">Год</label>
                        </li>
                        <li>
                            <input name="filter1" type="radio" id="all_time" value="all_time" <?php if ($filter1 == "all_time") echo "checked" ?>>
                            <label for="all_time">Всё время</label>
                        </li>
                    </ul>
                    <ul>
                        <br>
                        Количество тем на странице:
                        <li>
                            <input name="limit_on_page" type="radio" id="5" value="5" <?php if ($limit_on_page == "5") echo "checked" ?>>
                            <label for="5">5</label>
                        </li>
                        <li>
                            <input name="limit_on_page" type="radio" id="10" value="10" <?php if ($limit_on_page == "10") echo "checked" ?>>
                            <label for="10">10</label>
                        </li>
                        <li>
                            <input name="limit_on_page" type="radio" id="25" value="25" <?php if ($limit_on_page == "25") echo "checked" ?>>
                            <label for="25">25</label>
                        </li>
                        <li>
                            <input name="limit_on_page" type="radio" id="50" value="50" <?php if ($limit_on_page == "50") echo "checked" ?>>
                            <label for="50">50</label>
                        </li>
                    </ul>
                    <input type="hidden" name="chapterid" value="<?= $chapterid ?>">
                    <input type="hidden" name="page" value="<?= $page ?>">
                    <button type="submit">Подтвердить сортировку</button>

                </form>
            </div>
        </div>

        <?php

        ?>


        <div class="head-container">Результаты поиска</div>
        <div class="forum-top-block">
            <ul class="forum-section_list">
                <?php
                if (!isset($_GET['chapterid'])) {
                    echo "Id раздела не указан";
                } else {
                    $chapterid = $_GET['chapterid'];
                    $sql = "SELECT * FROM `chapters` WHERE `id` = '$chapterid'";
                    if (!$mysql->query($sql)->num_rows) {
                        echo "Раздела не существует";
                    } else {
                        $sql = "SELECT * FROM `posts` WHERE `chapter_id` = '$chapterid'";
                        $posts = $mysql->query($sql);
                        $count_posts = $posts->num_rows;

                        $count_pages = round($count_posts / $limit_on_page, 0);

                        if ($count_posts == 0) {
                            echo "<p>Темы для данного раздела не найдены</p>";
                        } else {
                            //выбор какой sql-запрос задать в зависимости от сортировки
                            $sort = "";
                            switch ($filter1) {
                                case 'today':
                                    $sort .= "AND `date` >= NOW() - INTERVAL 1 DAY";
                                    break;
                                case 'week':
                                    $sort .= "AND `date` >= NOW() - INTERVAL 1 WEEK";
                                    break;
                                case 'month':
                                    $sort .= "AND `date` >= NOW() - INTERVAL 1 MONTH";
                                    break;
                                case 'year':
                                    $sort .= "AND `date` >= NOW() - INTERVAL 1 YEAR";
                                    break;
                                case 'all_time':
                                    $sort = "";
                                    break;
                            }
                            $sort .= " ORDER BY ";
                            switch ($filter2) {
                                case 'relevance':
                                    $sort .= "`visitors` / `rating`";
                                    break;
                                case 'popularity':
                                    $sort .= "`visitors`";
                                    break;
                                case 'creation-date':
                                    $sort .= "`date`";
                                    break;
                            }
                            switch ($filter3) {
                                case 'descending':
                                    $sort .= " DESC";
                                    break;
                                case 'ascending':
                                    break;
                            }

                            //
                            $sql = "SELECT * FROM `posts` WHERE `chapter_id` = '$chapterid' " . $sort . " LIMIT $limit_on_page OFFSET $offset";
                            if (!$posts = $mysql->query($sql)) {
                                echo "Ошибка запроса БД";
                                exit();
                            }
                ?>
                            <ul class="forum-section_list">
                                <?php
                                while ($post = $posts->fetch_assoc()) {
                                    $user = get_user_by_id($mysql, $post['autor_id']);
                                ?>

                                    <ul class="forum-section_item">
                                        <div class="forum-section_col-1">
                                            <a href="#">
                                                <img src="<?= $user['avatar'] ?>" alt="<?= $user['avatar'] ?>">
                                            </a>
                                        </div>
                                        <div class="forum-section_col-2">
                                            <div class="forum-section_title">
                                                <a href="./this_post.php?post_id=<?= $post['post_id'] ?>" title="Название темы"><?= $post['post_name']; ?></a>
                                            </div>
                                            <div class="forum-section_name">
                                                <a href="#" title="Автор темы"><?= $user['nick_name']; ?></a>
                                                <span title="Дата создания темы"><?= $post['date']; ?></span>
                                            </div>
                                            <!--Далее будет реализовано после добавления комментариев-->
                                            <div class="forum-section_mes--mobile">
                                                <span>Сообщений: 15</span>
                                                <span>5 часов назад</span>
                                            </div>
                                        </div>
                                        <div class="forum-section_col-3">
                                            <p>Сообщений:
                                                <span>15</span>
                                            </p>
                                            <p>Просмотров:
                                                <span>356</span>
                                            </p>
                                        </div>
                                    </ul>
                                <?php
                                }
                                ?>
                            </ul>
                            <ul class="pagination">
                                <li class="pagination_item">
                                    <a class="pagination_link" href="?filter2=<?= $filter2 ?>&filter3=<?= $filter3 ?>&filter1=<?= $filter1 ?>&limit_on_page=<?= $limit_on_page ?>&chapterid=<?= $chapterid ?>&page=1">
                                        << </a>
                                </li>

                                <?php
                                if ($page == 1) {
                                ?>
                                    <li class="pagination_item">
                                        <a class="pagination_link pagination_link--active" href="#">1</a>
                                    </li>
                                    <li class="pagination_item">
                                        <a class="pagination_link" href="?filter2=<?= $filter2 ?>&filter3=<?= $filter3 ?>&filter1=<?= $filter1 ?>&limit_on_page=<?= $limit_on_page ?>&chapterid=<?= $chapterid ?>&page=2">
                                            2</a>
                                    </li>
                                <?php
                                } elseif ($page == $count_pages) {
                                ?>
                                    <li class="pagination_item">
                                        <a class="pagination_link" href="?filter2=<?= $filter2 ?>&filter3=<?= $filter3 ?>&filter1=<?= $filter1 ?>&limit_on_page=<?= $limit_on_page ?>&chapterid=<?= $chapterid ?>&page=<?= $page - 1; ?>">
                                            <?= $page - 1; ?></a>
                                    </li>
                                    <li class="pagination_item">
                                        <a class="pagination_link pagination_link--active" href="#">
                                            <?= $page; ?></a>
                                    </li>
                                <?php
                                } else {
                                ?>
                                    <li class="pagination_item">
                                        <a class="pagination_link" href="?filter2=<?= $filter2 ?>&filter3=<?= $filter3 ?>&filter1=<?= $filter1 ?>&limit_on_page=<?= $limit_on_page ?> &chapterid=<?= $chapterid ?>&page=<?= $page - 1; ?>">
                                            <?= $page - 1; ?></a>
                                    </li>
                                    <li class="pagination_item">
                                        <a class="pagination_link pagination_link--active" href="#">
                                            <?= $page; ?></a>
                                    </li>
                                    <li class="pagination_item">
                                        <a class="pagination_link" href="?filter2=<?= $filter2 ?>&filter3=<?= $filter3 ?>&filter1=<?= $filter1 ?>&limit_on_page=<?= $limit_on_page ?>&chapterid=<?= $chapterid ?>&page=<?= $page + 1; ?>">
                                            <?= $page + 1; ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                                <li class="pagination_item">
                                    <a class="pagination_link" href="?filter2=<?= $filter2 ?>&filter3=<?= $filter3 ?>&filter1=<?= $filter1 ?>&limit_on_page=<?= $limit_on_page ?>&chapterid=<?= $chapterid ?>&page=<?= $count_pages ?>">
                                        >></a>
                                </li>
                            </ul>
                <?php
                        }
                    }
                }
                ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>