<?php
require_once("../scripts/connect_to_db.php");
require_once("../scripts/get_user_info.php");

// максимальное количество записей в таблице БД с сообщениями
$limit_count_messages= 100;


if (!isset($_POST['action'])) {
    echo "FAIL";
    exit();
}
$action = $_POST['action'];

if ($action == "get") {
    $sql = "SELECT * FROM `live_chat` WHERE 1";
    if (!$result = $mysql->query($sql)) {
        echo "FAIL";
        exit();
    }
    while ($mesage = $result->fetch_assoc()) {

        //защита от пользовательского ввода
        $mesage['message'] = htmlspecialchars($mesage['message'], ENT_QUOTES, 'UTF-8');
        //замена эллемента массива с id на поле с всеми данными пользователя
        $mesage = array_replace($mesage, array('message_sender_id' => get_user_by_id($mysql, $mesage['message_sender_id'])));

        $mesages[] = $mesage;
    }
    $response = json_encode($mesages, JSON_UNESCAPED_UNICODE);
    echo $response;
}

if ($action == "send") {
    if (!isset($_SESSION['user']['id'])) {
        echo "NOT LOGIN";
        exit();
    }
    $user_id = $_SESSION['user']['id'];
    if (!isset($_POST['text'])) {
        echo "FAIL";
        exit();
    }
    $text = $_POST['text'];

    if (empty($text)) {
        echo "EMPTY TEXT";
        exit();
    }

    $sql = "INSERT INTO `live_chat`(`message_sender_id`, `message`) VALUES ($user_id, '$text')";
    $sql2 = "DELETE FROM `live_chat` WHERE `message_time` < (SELECT * FROM (SELECT`message_time` FROM `live_chat` ORDER BY `message_time` DESC LIMIT $limit_count_messages) as T ORDER BY `message_time` LIMIT 1)";
    if ($mysql->query($sql) && $mysql->query($sql2))
        echo "SUCCESS";
    else
        echo "FAIL";
}