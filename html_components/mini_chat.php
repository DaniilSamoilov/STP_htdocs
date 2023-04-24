<body>
    <div class="minichat-container">
        <div class="minichat-header">Общий чат</div>
        <div class="minichat-message-box">

        </div>
        <div class="minichat-input">
            <input type="text" name="text" placeholder="Напишите сообщение...">
            <button type="submit">Отправить</button>
        </div>
    </div>
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
                    url: "../scripts/mini_chat.php",
                    data: {
                        action: "get"
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
                            let user = element.message_sender_id;
                            let message_text = element.message;
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
                    url: "../scripts/mini_chat.php",
                    data: {
                        text: $('div.minichat-input > input[type=text]').val(),
                        action: "send"
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