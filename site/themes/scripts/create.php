<?php
session_start();
require_once("../../scripts/connect_to_db.php");

if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = "Создавать темы могут только авторизованные пользователи";
    header('Location: ../../authorization');
    exit();
}

$user_id = $_SESSION['user']['id'];
$post_name = htmlspecialchars(trim($_POST['post_name']));
$chapter_id = htmlspecialchars(trim($_POST['chapter']));
$post_text = htmlspecialchars(trim($_POST['post_text']));


$files = $_FILES['f'];
$path_to_file = "../../user_files/themes/";
$link_to_content = "";
for ($i = 0; $i < count($files['name']); $i++) {
    $file_name = $files['name'][$i];
    $file_name = trim($file_name, ' ');
    echo $file_tmp = $files['tmp_name'][$i];
    $file_name = $user_id . time() . $file_name;
    $link_to_content .= $file_name . "|";
    move_uploaded_file($file_tmp, $path_to_file . $file_name);
}
$link_to_content = substr($link_to_content, 0, -1);

$sql = "INSERT INTO `posts` (`post_id`, `autor_id`, `chapter_id`, `date`, `post_name`) VALUES (NULL, '$user_id', '$chapter_id', CURRENT_TIMESTAMP, '$post_name')";
if (!$mysql->query($sql)) {
    $_SESSION['message'] = "Ошибка при добавлении данных в БД";
    header('Location: ../create.php');
    exit();
}
$post_id = $mysql->insert_id;

$sql = "INSERT INTO `post_content` (`link_to_content`, `post_text`, `original_post`) VALUES ('$link_to_content', '$post_text', '$post_id')";
if (!$mysql->query($sql)) {
    $_SESSION['message'] = "Ошибка при добавлении данных в БД";
    header('Location: ../create.php');
    exit();
} else {
    header('Location: ../this_post.php?post_id=' . $post_id);
    exit();
}
