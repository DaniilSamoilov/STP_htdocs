<?php
session_start();
require_once("./scripts/connect_to_db.php");
require_once("./scripts/get_user_info.php");
require_once("./scripts/operations_with_files.php");

$search = isset($_GET['search']) ? $_GET['search'] : null;
$search = trim($search);
// данные для пагинации
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$limit_on_page = isset($_GET['limit_on_page']) && is_numeric($_GET['limit_on_page']) ? $_GET['limit_on_page'] : 5;
$offset = $limit_on_page * ($page - 1);
//$count_pages количество страниц вычисляется ниже

//допустимые значения в переменных filter, так как они будут вставляться в запрос БД
$filter1_accept = ["abc", "point"];
$filter2_accept = ["ascending", "descending"];
// данные фильтрации и сортировки
$filter1 = isset($_GET['filter1']) && in_array($_GET['filter1'], $filter1_accept) ? $_GET['filter1'] : "abc";
$filter2 = isset($_GET['filter2']) && in_array($_GET['filter2'], $filter2_accept) ? $_GET['filter2'] : "descending";


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
                        <ul>
                            <li>Сортировка по:</li>
                            <li>
                                <input name="filter1" type="radio" id="abc" value="abc" checked>
                                <label for="abc">Алфавиту</label>
                            </li>
                            <li>
                                <input name="filter1" type="radio" id="point" value="point">
                                <label for="point">Очкам</label>
                            </li>
                        </ul>
                        <ul>
                            <br>
                            <li>
                                <input name="filter2" type="radio" id="descending" value="descending" <?php if ($filter2 == "descending") echo "checked" ?>>
                                <label for="descending">По убыванию</label>
                            </li>
                            <li>
                                <input name="filter2" type="radio" id="ascending" value="ascending" <?php if ($filter2 == "ascending") echo "checked" ?>>
                                <label for="ascending">По возростанию</label>
                            </li>
                        </ul>
                        <ul>
                            <br>
                            Количество запросов на странице:
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
                        <input type="hidden" name="page" value="<?= $page ?>">
                        <input type="hidden" name="search" value="<?= $search ?>">
                        <button type="submit">Подтвердить сортировку</button>
                    </ul>
                </form>
            </div>
        </div>

        <div class="head-container">Результаты поиска</div>
        <div class="forum-top-block">
            <ul class="forum-section_list">
                <?php
                $sql = "SELECT * FROM `users` WHERE ";
                //выбор какой sql-запрос задать в зависимости от поиска
                if ($search != null) {
                    $search_temp = preg_replace('/[\s]{2,}/', ' ', $search);
                    $search_temp = explode(' ', $search_temp);
                    $count = count($search_temp);
                    $i = 0;
                    foreach ($search_temp as $word) {
                        $i++;
                        if ($i < $count)
                            $sql .= "`nick_name` LIKE'%" . $word . "%' OR ";
                        else
                            $sql .= "`nick_name` LIKE'%" . $word . "%'";
                    }
                } else $sql .= 1;
                //Подсчёт количества страниц
                if (!$users = $mysql->query($sql)) {
                    echo $sql;
                    echo "Ошибка запроса БДasd";
                    exit();
                }
                $count_users = $users->num_rows;
                $count_pages = ceil($count_users / $limit_on_page);
                $count_pages = $count_pages == 0 ? 1 : $count_pages;

                //выбор какой sql-запрос задать в зависимости от сортировки
                $sort = " ORDER BY ";
                switch ($filter1) {
                    case 'abc':
                        $sort .= "`nick_name`";
                        break;
                    case 'point':
                        $sort .= "`score`";
                        break;
                }
                switch ($filter2) {
                    case 'descending':
                        $sort .= " DESC";
                        break;
                    case 'ascending':
                        break;
                }
                //

                $sql .= $sort . " LIMIT $limit_on_page OFFSET $offset";
                if (!$users = $mysql->query($sql)) {
                    echo "Ошибка запроса БД";
                    exit();
                }


                ?>
                <ul class="forum-section_list">
                    <?php
                    if (!$users->num_rows) {
                        echo "Пользователи не найдены";
                    }
                    while ($user = $users->fetch_assoc()) {
                    ?>

                        <ul class="forum-section_item">
                            <div class="forum-section_col-1">
                                <a href="/profile/index.php?user_id=<?= $user['id'] ?>">
                                    <img src="<?= path_to_avatar . $user['avatar'] ?>" alt="<?= get_name_without_digits($user['avatar']) ?>">
                                </a>
                            </div>
                            <div class="forum-section_title">
                                <div class="forum-section_name">
                                    <a href="/profile/index.php?user_id=<?= $user['id'] ?>" title="Пользователь"><?= htmlspecialchars($user['nick_name'], ENT_QUOTES, 'UTF-8'); ?></a>
                                    Очки:
                                    <span title="Очки"><?= $user['score']; ?></span>
                                </div>
                            </div>
                        </ul>


                    <?php
                    }
                    $url = "?";
                    $url .= $filter1 != "all_time" ? "filter1=" . $filter1 : "";
                    $url .= $filter2 != "creation-date" ? "&filter2" . $filter2 : "";
                    $url .= $limit_on_page != 5 ? "&limit_on_page=" . $limit_on_page : "";
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