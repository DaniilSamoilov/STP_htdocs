<?php
session_start();
if (!isset($_SESSION['user']['id'])){
    $_SESSION['user']['id'] = null;
}
if(!isset($_SESSION['visited_posts'])){
    $_SESSION['visited_posts'] = array();
}

require_once("../scripts/connect_to_db.php");
require_once("../scripts/get_user_info.php");
require_once("../scripts/operations_with_files.php");
require_once("../scripts/comments_under_post.php");

if (isset($_GET['post_id']) and is_numeric($_GET['post_id']) and !empty($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
} else {
    echo "Id поста не указан";
    exit();
}

//запрос к БД с контентом
$sql = "SELECT * FROM `post_content` `c` JOIN `posts` `p` ON `c`.`original_post` = `p`.`post_id` WHERE `original_post` = $post_id";
if (!$post = $mysql->query($sql)) {
    echo "Ошибка запроса БД";
    exit();
}
if (!$post = $post->fetch_assoc()) {
    echo "Пост с данным ID не найден";
    exit();
}
$post_name = $post['post_name'];
//Учет посетителей поста
if ($_SESSION['user'] != $post['autor_id']) {
    //переменная сессии, с почещенными постами
    if (!in_array($post_id, $_SESSION['visited_posts'])) {
        $_SESSION['visited_posts'][] = $post_id;
        $sql = "UPDATE `posts` SET `visitors`= $post[visitors] + 1 WHERE `post_id` = $post_id";
        $mysql->query($sql);
    }
}
// замена символов /n на <br> в тексте поста и подготовка к выводу на страницу
$post['post_text'] = str_replace("\n", "<br>", $post['post_text']);

//ссылка на имя прикреплённых файлов
$link_to_content = $post['link_to_content'];
$link_to_content = explode("|", $link_to_content);

//получение инфо об авторе
$author = get_user_by_id($mysql, $post['autor_id']);
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
    <title>«Точка общения»|<?= htmlspecialchars($post_name, ENT_QUOTES, 'UTF-8') ?></title>
</head>
<?php
require_once("../html_components/header.php");
?>

<body>

    <div class="MainPost_info head-container">
        <h3><?= htmlspecialchars($post_name, ENT_QUOTES, 'UTF-8') ?></h3>
        <span>
            Дата публикации <?= $post['date'] ?>
            Количество посетителей <?= $post['visitors'] ?>
            Рейтинг <?= $post['rating'] ?>
        </span>
    </div>

    <div class="forum-top-block">
        <div class="Post">
            <div class="Post_LeftCol">
                <a class="username" href="/profile/index.php?user_id=<?= $author['id'] ?>"><?= htmlspecialchars($author['nick_name'], ENT_QUOTES, 'UTF-8') ?></a>
                <a href="/profile/index.php?user_id=<?= $author['id'] ?>">
                    <img src="<?= path_to_avatar . $author['avatar'] ?>" alt="<?= get_name_without_digits($author['avatar']) ?>">
                </a>
                <p class="author_info">Рейтинг:<?= $author['score'] ?></p>
            </div>
            <div class="Post_RightCol">
                <div class="Post_info"><?= $post['date'] ?></div>
                <text><?= $post['post_text'] ?></text>
                <div class="Post_File img">
                    <?php
                    //проверка, содержатся ли в $link_to_content элементы
                    if ($link_to_content[0] != null) {
                        //вывод изображений
                        foreach ($link_to_content as $file) {
                            $file_name = $file;
                            $file = path_to_file . $file;
                            if (is_image($file)) { ?>
                                <img src="<?= $file ?>" alt="<?= get_name_without_digits($file_name) ?>">

                        <?php }
                        }
                        ?>
                </div>
                <div class="Post_File">
                    <?php
                        //вывод других файлов
                        foreach ($link_to_content as $file) {
                            $file_name = $file;
                            $file = path_to_file . $file;
                            if (!is_image($file)) { ?>
                            <a href="<?= $file ?>" download=""><?= get_name_without_digits($file_name); ?></a>

                <?php }
                        }
                    }
                ?>

                </div>
            </div>
        </div>

        <div class=like-dislike>
            <button>нравится</button>
            <button>не нравится</button>
        </div>


        <!-- ниже блок комментариев -->
        <?php
        show_comments($mysql, 'post_comments', $post_id);
        ?>
        <br>
        <?php
        if (isset($_SESSION['user'])) {
            write_comment($post_id, $_SESSION['user']['id']);
        } else {
        ?>
            <form>
                <input type="text" required name="text"><br>
                <button type="button">Отправить</button><br>
            </form>
            Чтобы отправить сообщение, авторизируйтесь
        <?php
        }
        ?>
    </div>
</body>

</html>