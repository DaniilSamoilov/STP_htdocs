<?php
session_start();
require_once("../scripts/connect_to_db.php");
require_once("../scripts/get_user_info.php");
require_once("../scripts/operations_with_files.php");

if (isset($_GET['post_id']) and is_numeric($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
} else {
    echo "Id поста не указан";
}

$sql = "SELECT * FROM `post_content` `c` JOIN `posts` `p` ON `c`.`original_post` = `p`.`post_id` WHERE `original_post` = $post_id";

if (!$post = $mysql->query($sql)) {
    echo "Ошибка запроса БД";
    exit();
}

$post = $post->fetch_assoc();

$link_to_content = $post['link_to_content'];
$link_to_content = explode("|", $link_to_content);
const path_to_file = "../user_files/themes/";
?>

<div class="Инфо об посте">
    Имя поста <?= $post['post_name'] ?>
    Дата публикации <?= $post['date'] ?>
    Количество посетителей <?= $post['visitors'] ?>
    Рейтинг <?= $post['rating'] ?>
</div>

<div class="текст поста">
    <?= $post['post_text'] ?>
</div>

<br>

<div class="различные фотографии и другие файлы, которые можно скачать">
    <?php
    foreach ($link_to_content as $file) {
        $file_name = $file;
        $file = path_to_file . $file;
        if (is_image($file)) { ?>
            <img src="<?= $file ?>" alt="<?= get_name_without_digits($file_name) ?>" width="189" height="255">

    <?php }
    }
    ?>
</div>
<div class="файлы, которые нельзя посмотреть, но можно скачать">
    <?php
    foreach ($link_to_content as $file) {
        $file_name = $file;
        $file = path_to_file . $file;
        echo (!is_image($file));
        if (!is_image($file)) { ?>
            <a href="<?= $file ?>" download=""><?= get_name_without_digits($file_name); ?></a>
    <?php }
    }
    ?>

</div>








<div class="Комментарии, пока не трогай будет переделано">
    <?php
    if (!$coms->num_rows) {
        echo "Комментариев ещё нет, будь первым";
    }
    while ($com = $coms->fetch_assoc()) {
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
</div>