<?php
//скрипт обрабатывает добавление комментария

require_once("/OSPanel/domains/site/scripts/connect_to_db.php");
session_start();

if (
    !isset($_POST['text']) || !isset($_POST['original_post']) || !isset($_POST['comment_author'])
) {
    $_SESSION['message'] = "Что-то пошло не так";
    header('Location: /themes/this_post.php?post_id=' . $_POST['original_post']);
    exit();
}

$text = $_POST['text'];
$original_post = $_POST['original_post'];
$reply_to = $_POST['reply_to'];
$comment_author = $_POST['comment_author'];

if ($reply_to != null) {
    $sql = "INSERT INTO `post_comments`(`original_post`, `reply_to`, `comment_body`, `comment_autor`)
VALUES ($original_post, $reply_to, '$text', $comment_author)";
} else {
    $sql = "INSERT INTO `post_comments`(`original_post`, `reply_to`, `comment_body`, `comment_autor`) VALUES ($original_post, NULL, '$text', $comment_author)";
}
$mysql->query($sql);
$mysql->close();
header('Location: /themes/this_post.php?post_id=' . $_POST['original_post']);
exit();
