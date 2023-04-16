<?php
session_start();
require_once("../scripts/connect_to_db.php");
require_once("../scripts/get_user_info.php");
require_once("../scripts/operations_with_files.php");

$chapterid = isset($_GET['chapterid']) ? $_GET['chapterid'] : null;
$search = isset($_GET['search']) ? $_GET['search'] : null;
$search = trim($search);
// данные для пагинации
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit_on_page = isset($_GET['limit_on_page']) ? $_GET['limit_on_page'] : 5;
$offset = $limit_on_page * ($page - 1);
//$count_pages количество страниц вычисляется ниже

// данные фильтрации и сортировки
$filter1 = isset($_GET['filter1']) ? $_GET['filter1'] : "all_time";
$filter2 = isset($_GET['filter2']) ? $_GET['filter2'] : "creation-date";
$filter3 = isset($_GET['filter3']) ? $_GET['filter3'] : "descending";

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
            <form class="d-flex" role="search" method="GET">
                <input type="hidden" name="filter2" value="<?= $filter2 ?>">
                <input type="hidden" name="filter3" value="<?= $filter3 ?>">
                <input type="hidden" name="filter1" value="<?= $filter1 ?>">
                <input type="hidden" name="limit_on_page" value="<?= $limit_on_page ?>">
                <input type="hidden" name="chapterid" value="<?= $chapterid ?>">
                <input type="hidden" name="page" value="<?= $page ?>">
                <input class="form-control me-2" type="search" name="search" placeholder="Поиск" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Найти</button>
            </form>
            <a data-bs-toggle="collapse" href="#search-settings" role="button" aria-expanded="false" aria-controls="search-settings">
                Настройки поиска
            </a>
            <div class="collapse" id="search-settings">
                <form class="d-flex search-filter-container" method="GET">
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
                    <input type="hidden" name="search" value="<?= $search ?>">
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
                $sql = "SELECT * FROM `posts` `p` JOIN `post_content` `c` ON `p`.`post_id` = `c`.`original_post`  WHERE ";
                //выбор какой sql-запрос задать в зависимости от поиска
                if ($chapterid != null) {
                    $sql2 = "SELECT * FROM `chapters` WHERE `id` = '$chapterid'";
                    if (!$mysql->query($sql2)->num_rows) {
                        echo "Раздела не существует";
                        exit();
                    } else {
                        $sql .= "`p`.`chapter_id` = '$chapterid' ";
                    }
                } else {
                    $sql .= "1 ";
                }
                if ($search != null) {
                    $sql .= "AND (";
                    $search_temp = preg_replace('/[\s]{2,}/', ' ', $search);
                    $search_temp = explode(' ', $search_temp);
                    $count = count($search_temp);
                    $i = 0;
                    foreach ($search_temp as $word) {
                        $i++;
                        if ($i < $count)
                            $sql .= "`p`.`post_name` LIKE'%" . $word . "%' OR `c`.`post_text` LIKE'%" . $word . "%' OR ";
                        else
                            $sql .= "`p`.`post_name` LIKE'%" . $word . "%' OR `c`.`post_text` LIKE'%" . $word . "%'";
                    }
                    $sql .= ") ";
                }
                //Подсчёт количества страниц
                if (!$posts = $mysql->query($sql)) {
                    echo "Ошибка запроса БД";
                    exit();
                }
                $count_posts = $posts->num_rows;
                $count_pages = ceil($count_posts / $limit_on_page);
                $count_pages = $count_pages == 0 ? 1 : $count_pages;

                //выбор какой sql-запрос задать в зависимости от сортировки
                $sort = "";
                switch ($filter1) {
                    case 'today':
                        $sort .= "AND `p`.`date` >= NOW() - INTERVAL 1 DAY";
                        break;
                    case 'week':
                        $sort .= "AND `p`.`date` >= NOW() - INTERVAL 1 WEEK";
                        break;
                    case 'month':
                        $sort .= "AND `p`.`date` >= NOW() - INTERVAL 1 MONTH";
                        break;
                    case 'year':
                        $sort .= "AND `p`.`date` >= NOW() - INTERVAL 1 YEAR";
                        break;
                    case 'all_time':
                        $sort = "";
                        break;
                }
                $sort .= " ORDER BY ";
                switch ($filter2) {
                    case 'relevance':
                        $sort .= "`p`.`visitors` / `rating`";
                        break;
                    case 'popularity':
                        $sort .= "`p`.`visitors`";
                        break;
                    case 'creation-date':
                        $sort .= "`p`.`date`";
                        break;
                }
                switch ($filter3) {
                    case 'descending':
                        $sort .= " DESC";
                        break;
                    case 'ascending':
                        break;
                }

                //запрос БД по постам
                $sql .= $sort . " LIMIT $limit_on_page OFFSET $offset";
                if (!$posts = $mysql->query($sql)) {
                    echo "Ошибка запроса БД";
                    exit();
                }
                //запрос БД по количеству комментариев
                $sql = "SELECT COUNT(*) as count FROM `post_comments` WHERE `original_post` = ";

                ?>
                <ul class="forum-section_list">
                    <?php
                    if (!$posts->num_rows) {
                        echo "Темы не найдены";
                    }
                    while ($post = $posts->fetch_assoc()) {
                        $count_coms = $mysql->query($sql . $post['post_id'])->fetch_assoc()['count'];
                        $user = get_user_by_id($mysql, $post['autor_id']);
                    ?>

                        <ul class="forum-section_item">
                            <div class="forum-section_col-1">
                                <a href="/profile/index.php?user_id=<?= $user['id'] ?>">
                                    <img src="<?= path_to_avatar . $user['avatar'] ?>" alt="<?= get_name_without_digits($user['avatar']) ?>">
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
                                    <span><?= $count_coms ?></span>
                                </p>
                                <p>Просмотров:
                                    <span><?= $post['visitors'] ?></span>
                                </p>
                            </div>
                        </ul>


                        <!-- Пагинация -->
                    <?php
                    }
                    $url = "?";
                    $url .= $filter1 != "all_time" ? "filter1=" . $filter1 : "";
                    $url .= $filter2 != "creation-date" ? "&filter2" . $filter2 : "";
                    $url .= $filter3 != "descending" ? "&filter3" . $filter3 : "";
                    $url .= $limit_on_page != 5 ? "&limit_on_page=" . $limit_on_page : "";
                    $url .= $chapterid != null ? "&chapterid=" . $chapterid : "";
                    $url .= $search != null ? "&search=" . $search : "";
                    ?>
                </ul>
                <ul class="pagination">
                    <li class="pagination_item">
                        <a class="pagination_link" href="<?= $url ?>&page=1">
                            << </a>
                    </li>
                    <?php
                    if ($page == 1 and $count_pages != 1) {
                    ?>
                        <li class="pagination_item">
                            <a class="pagination_link pagination_link--active" href="#">1</a>
                        </li>
                        <li class="pagination_item">
                            <a class="pagination_link" href="<?= $url ?>&page=2">
                                2</a>
                        </li>
                    <?php
                    } elseif ($page == 1 and $count_pages == 1) {
                    ?>
                        <li class="pagination_item">
                            <a class="pagination_link pagination_link--active" href="#">1</a>
                        </li>
                    <?php
                    } elseif ($page >= $count_pages) {
                    ?>
                        <li class="pagination_item">
                            <a class="pagination_link" href="<?= $url ?>&page=<?= $page - 1; ?>">
                                <?= $count_pages - 1; ?></a>
                        </li>
                        <li class="pagination_item">
                            <a class="pagination_link pagination_link--active" href="#">
                                <?= $count_pages; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="pagination_item">
                            <a class="pagination_link" href="<?= $url ?>&page=<?= $page - 1; ?>">
                                <?= $page - 1; ?></a>
                        </li>
                        <li class="pagination_item">
                            <a class="pagination_link pagination_link--active" href="#">
                                <?= $page; ?></a>
                        </li>
                        <li class="pagination_item">
                            <a class="pagination_link" href="<?= $url ?>&page=<?= $page + 1; ?>">
                                <?= $page + 1; ?></a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="pagination_item">
                        <a class="pagination_link" href="<?= $url ?>&page=<?= $count_pages ?>">
                            >></a>
                    </li>
                </ul>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>