<?php
require_once("../../scripts/connect_to_db.php");
require_once("../../scripts/get_user_info.php");

if (!isset($_POST['action'])) {
    echo "FAIL";
    exit();
}
$action = $_POST['action'];

if (!isset($_POST['to_who'])) {
    echo "FAIL";
    exit();
}
$to_who = $_POST['to_who'];

if (!isset($_SESSION['user']['id'])) {
    echo "NOT LOGIN";
    exit();
}
$from_who = $_SESSION['user']['id'];

if ($action == "get") {
    $sql = "SELECT * FROM `personal messages` WHERE `to_who` = $to_who AND `from_who` = $from_who OR `to_who` = $from_who AND `from_who` = $to_who ORDER BY `message_time`";
    if (!$result = $mysql->query($sql)) {
        echo "FAIL";
        exit();
    }
    if($result->num_rows == 0){
        echo "EMPTY DB";
        exit();
    }
    while ($mesage = $result->fetch_assoc()) {

        //защита от пользовательского ввода
        $mesage['text_message'] = htmlspecialchars($mesage['text_message'], ENT_QUOTES, 'UTF-8');
        //замена эллемента массива с id на поле с всеми данными пользователя
        $mesage = array_replace($mesage, array('to_who' => get_user_by_id($mysql, $mesage['to_who'])));
        $mesage = array_replace($mesage, array('from_who' => get_user_by_id($mysql, $mesage['from_who'])));

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

    $sql = "INSERT INTO `personal messages`(`to_who`, `from_who`, `text_message`) VALUES ($to_who, $from_who, '$text')";
    if ($mysql->query($sql))
        echo "SUCCESS";
    else
        echo "FAIL";
}