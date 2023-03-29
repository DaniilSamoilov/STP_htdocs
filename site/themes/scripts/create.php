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

$sql = "INSERT INTO `posts` (`post_id`, `autor_id`, `chapter_id`, `date`, `post_name`) VALUES (NULL, '$user_id', '$chapter_id', CURRENT_TIMESTAMP, '$post_name')";
if(!$mysql->query($sql))
{
    $_SESSION['message'] = "Ошибка при добавлении данных в БД";
    header('Location: ../create.php');
    exit();
}
$post_id = $mysql->insert_id;

$sql = "INSERT INTO `post_content` (`link_to_content`, `post_text`, `original_post`) VALUES (NULL, '$post_text', '$post_id')";
if(!$mysql->query($sql))
{
    $_SESSION['message'] = "Ошибка при добавлении данных в БД";
    header('Location: ../create.php');
    exit();
}