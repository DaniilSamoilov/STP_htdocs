<?php
session_start();
require_once("../scripts/connect_to_db.php");
require_once("../scripts/get_user_info.php");

// данные для пагинации
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit_on_page = isset($_POST['$limit_on_page']) ? $_GET['$limit_on_page'] : 1;
$offset = $limit_on_page * ($page - 1);
//$count_pages количество страниц вычисляется ниже
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
            <form class="d-flex search-filter-container">
                <ul>
                    <li>Категория:</li>
                    <li>
                        <select id="category" name="category">
                            <option value="">Выберите категорию</option>
                            <option value="general">Общие вопросы</option>
                            <option value="dormitorys">Общежития</option>
                            <option value="events">Мероприятия</option>
                        </select>
                    </li>
                </ul>
                <ul>
                    <li>Сортировать по:</li>
                    <li>
                        <input name="filter2" type="radio" id="relevance" value="relevance" checked>
                        <label for="relevance">Релевантности</label>
                    </li>
                    <li>
                        <input name="filter2" type="radio" id="popularity" value="popularity">
                        <label for="popularity">Популярности</label>
                    </li>
                    <li>
                        <input name="filter2" type="radio" id="creation-date" value="creation-date">
                        <label for="creation-date">Дате создания темы</label>
                    </li>
                </ul>
                <ul>
                    <br>
                    <li>
                        <input name="filter3" type="radio" id="descending" value="descending" checked>
                        <label for="descending">По убыванию</label>
                    </li>
                    <li>
                        <input name="filter3" type="radio" id="ascending" value="ascending">
                        <label for="ascending">По возростанию</label>
                    </li>
                </ul>
            </form>
        </div>
        <div class="head-container">Результаты поиска</div>
        <div class="forum-top-block">
            <ul class="pagination">
                <li class="pagination_item">
                    <a class="pagination_link pagination_link--active" href="#">1</a>
                </li>
                <li class="pagination_item">
                    <a class="pagination_link" href="#">2</a>
                </li>
                <li class="pagination_item">
                    <a class="pagination_link" href="#">3</a>
                </li>
                <li class="pagination_item">
                    <a class="pagination_link" href="#">4</a>
                </li>
                <li class="pagination_item">
                    <input class="pagination_link pagination_link-choose-page" placeholder="...">
                </li>
                <li class="pagination_item">
                    <a class="pagination_link" href="#">13</a>
                </li>
                <li class="pagination_item">
                    <a class="pagination_link" href="#">></a>
                </li>
            </ul>
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
                            $sql = "SELECT * FROM `posts` WHERE `chapter_id` = '$chapterid' LIMIT $limit_on_page OFFSET $offset";
                            $posts = $mysql->query($sql);

                ?><ul class="forum-section_list"><?php
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
                            </ul><?php
                                    ?>
                            <ul class="pagination">
                                <li class="pagination_item">
                                    <a class="pagination_link" href="?chapterid=<?= $_GET['chapterid'] ?>&page=1">
                                        <<< /a>
                                </li>

                                <?php
                                if ($page == 1) {
                                ?>
                                    <li class="pagination_item">
                                        <a class="pagination_link pagination_link--active" href="*">1</a>
                                    </li>
                                    <li class="pagination_item">
                                        <a class="pagination_link" href="?chapterid=<?= $_GET['chapterid'] ?>&page=2">2</a>
                                    </li>
                                <?php
                                } elseif ($page == $count_pages) {
                                ?>
                                    <li class="pagination_item">
                                        <a class="pagination_link" href="?chapterid=<?= $_GET['chapterid'] ?>&page=<?= $page - 1; ?>"><?= $page - 1; ?></a>
                                    </li>
                                    <li class="pagination_item">
                                        <a class="pagination_link pagination_link--active" href="?chapterid=<?= $_GET['chapterid'] ?>&page=<?= $page; ?>"><?= $page; ?></a>
                                    </li>
                                <?php
                                } else {
                                ?>
                                    <li class="pagination_item">
                                        <a class="pagination_link" href="?chapterid=<?= $_GET['chapterid'] ?>&page=<?= $page - 1; ?>"><?= $page - 1; ?></a>
                                    </li>
                                    <li class="pagination_item">
                                        <a class="pagination_link pagination_link--active" href="?chapterid=<?= $_GET['chapterid'] ?>&page=<?= $page; ?>"><?= $page; ?></a>
                                    </li>
                                    <li class="pagination_item">
                                        <a class="pagination_link pagination_link--active" href="?chapterid=<?= $_GET['chapterid'] ?>&page=<?= $page + 1; ?>"><?= $page + 1; ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                                <li class="pagination_item">
                                    <a class="pagination_link" href="?chapterid=<?= $_GET['chapterid'] ?>&page=<?= $count_pages ?>">>></a>
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