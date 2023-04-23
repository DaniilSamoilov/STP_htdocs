<?php
session_start();

// получение id собеседника
if (!(isset($_GET['user_id']) && is_numeric($_GET['user_id']))) {
    $to_who_user_id = null;
} else {
    $to_who_user_id = $_GET['user_id'];
}

if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = "Чат не доступен не авторизированным пользователям";
    header('Location: ./?user_id=' . $to_who_user_id);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Студенческий форум КФУ «Точка общения»</title>
</head>
<?php include("../html_components/header.php"); ?>

<body>
    <div class="minichat-container">
        <div class="minichat-header">Личный чат</div>
        <div class="minichat-message-box">

        </div>
        <div class="minichat-input">
            <input type="text" name="text" placeholder="Напишите сообщение...">
            <button type="submit">Отправить</button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(get_messages);
        setInterval(get_messages, 5000);

        function printMessages(user, text, time) {

            let message = '<div class="minichat-message">';
            message += '<img src="../user_files/users/' + user.avatar + '" alt="Avatar">';
            message += '<a class="username" href=" ' + '../profile/index.php?user_id=' + user.id + '">' + user.nick_name + ':</a>';
            message += '<span class="minichat-message-text">' + text + ' </span>';
            message += '<span class="time">' + time + '</span>';
            $(".minichat-message-box").append(message);

        }

        function get_messages() {
            $.ajax({
                    method: "POST",
                    url: "./scripts/chat.php",
                    data: {
                        action: "get",
                        to_who: <?= $to_who_user_id ?>
                    },
                })
                .done(function(data) {
                    $(".minichat-message-box .minichat-message").remove();
                    if (data == "FAIL") {
                        $(".minichat-message-box").append('<span class="minichat-message-text">Ошибка сервера</span><b>');
                    } else if (data == "EMPTY DB") {
                        $(".minichat-message-box").html('<span class="minichat-message-text">Сообщений нет</span>');
                    } else {
                        messages = JSON.parse(data);
                        messages.forEach(element => {
                            let user = element.from_who;
                            let message_text = element.text_message;
                            let time = element.message_time;

                            time = new Date(Date.parse(time.replace(/-/g, '/')));
                            var tHour = time.getHours();
                            var tMin = time.getMinutes();
                            time = tHour + ":" + tMin;

                            printMessages(user, message_text, time);

                        });
                    }
                })
        }

        $("div.minichat-input > button").on("click", function() {
            $.ajax({
                    method: "POST",
                    url: "./scripts/chat.php",
                    data: {
                        text: $('div.minichat-input > input[type=text]').val(),
                        action: "send",
                        to_who: <?= $to_who_user_id ?>,
                    },
                })
                .done(function(data) {
                    if (data == "NOT LOGIN") {
                        $('div.minichat-input > input[type=text]').attr('placeholder', 'Авторизируйтесь');
                        $('div.minichat-input > input[type=text]').val('');
                        setTimeout(() => {
                            $('div.minichat-input > input[type=text]').attr('placeholder', 'Напишите сообщение...');
                        }, 3000);
                    }
                    if (data == "EMPTY TEXT") {} else if (data == "FAIL") {
                        $('div.minichat-input > input[type=text]').attr('placeholder', 'Ошибка сервера');
                        setTimeout(() => {
                            $('div.minichat-input > input[type=text]').attr('placeholder', 'Напишите сообщение...');
                        }, 3000);
                    } else if (data == "SUCCESS") {
                        $('div.minichat-input > input[type=text]').val('');
                        get_messages();
                    }
                })
        });
    </script>
</body>

</html>