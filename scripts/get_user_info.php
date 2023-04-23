<?php
session_start();
function get_user_by_id($mysql, $id)
{
    $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
    $user = $mysql->query($sql);
    if (!$user = $user->fetch_assoc()) {
        $_SESSION['message'] = "Пользователя с данным id не существует";
    } else {
        $user = [
            "id" => $user['id'],
            "nick_name" => $user['nick_name'],
            "email" => $user['email'],
            "avatar" => $user['avatar'],
            "score" => $user['score'],
        ];
        return $user;
    }
}
