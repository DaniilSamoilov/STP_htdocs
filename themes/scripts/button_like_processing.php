<?php
session_start();
require_once("../../scripts/connect_to_db.php");

if (!isset($_POST['user_id'])) {
    echo "FAIL";
    exit();
}
$user_id = $_POST['user_id'];
if ($_SESSION['user']['id'] != $user_id) {
    echo "FAIL";
    exit();
}
if (!isset($_POST['post_id'])) {
    echo "FAIL";
    exit();
}
$post_id = $_POST['post_id'];
if (!isset($_POST['action'])) {
    echo "FAIL";
    exit();
}
$action = $_POST['action'];



$sql = "SELECT COUNT(*) as count FROM `likes` WHERE `user` = $user_id AND `post` = $post_id";
if (!$res = $mysql->query($sql)) {
    echo "FAIL";
    exit();
}

if ($action == "check") {
    if ($res->fetch_assoc()['count'] == 0) {
        echo "SUCCESS: 0";
    } else {
        echo "SUCCESS: 1";
    }
}

if ($action == "toggle") {
    if ($res->fetch_assoc()['count'] == 0) {
        $sql = "INSERT INTO `likes`(`user`, `post`) VALUES ($user_id, $post_id)";
        $mysql->query($sql);
        echo "SUCCESS";
    } else {
        $sql = "DELETE FROM `likes` WHERE `user` = $user_id AND `post` = $post_id";
        $mysql->query($sql);
        echo "SUCCESS";
    }
}
//подсчёт количества лайков поста
$sql = "SELECT COUNT(*) as count FROM `likes` WHERE `post` = $post_id";
if($res = $mysql->query($sql)){
    $count = $res->fetch_assoc()['count'];
    $sql = "UPDATE `posts` SET `rating`='$count' WHERE `post_id` = '$post_id'";
    $mysql ->query($sql);
}
