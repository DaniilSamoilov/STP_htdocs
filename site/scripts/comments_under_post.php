<?php
session_start();

//показывает комментарии, к посту(которые никому не отвечают)
function show_comments($mysql, $table_name, $post_id)
{


    $sql = "SELECT * FROM `$table_name` WHERE `original_post` = '$post_id' AND `reply_to` IS NULL ORDER BY date DESC";
    if (!$coms = $mysql->query($sql)) {
        echo "Ошибка обращения к БД";
        exit();
    }
    if (!$coms->num_rows) {
        echo "Комментариев ещё нет, будь первым";
    } else {
        while ($com = $coms->fetch_assoc()) {
            // замена символов /n на <br>
            $com['comment_body'] = str_replace("\n", "<br>", $com['comment_body']);
            // получение информации об авторе комментария
            $user = get_user_by_id($mysql, $com['comment_autor']);
            show_comment_html($com, $post_id, $user);
            show_reply_to_comment($mysql, $table_name, $post_id, $com['comment_id']);
        }
    }
}

// html код для вывода комментов
function show_comment_html($com, $post_id, $user)
{
?>
    <div class="Post">
        <div class="Post_LeftCol">
            <a class="username" href="/profile/index.php?user_id=<?= $user['id'] ?>"><?= htmlspecialchars($user['nick_name'], ENT_QUOTES, 'UTF-8') ?></a>
            <a href="/profile/index.php?user_id=<?= $user['id'] ?>">
                <img src="<?= path_to_avatar . $user['avatar'] ?>" alt="Avatar">
            </a>
            <p class="author_info">Рейтинг:<?= $user['score'] ?></p>
        </div>
        <div class="Post_RightCol">
            <div class="Post_info"><?= $com['date'] ?></div>
            <text><?= htmlspecialchars($com['comment_body'], ENT_QUOTES, 'UTF-8') ?></text>
        </div>
    </div>
    <div class=Answer-to-comment>
        <?php
        if (isset($_SESSION['user'])) {
            write_comment($post_id, $_SESSION['user']['id'], $com['comment_id']);
        } else {
        ?>
            <form>
                <input type="text" required name="text" placeholder="Ответить"><br>
                <button type="button">Отправить</button><br>
            </form>
            Чтобы отправить сообщение, авторизируйтесь
        <?php
        }
        ?>
        <?php
    }


    //выводит комментарии, которые отвечают на другие комментарии
    function show_reply_to_comment($mysql, $table_name, $post_id, $com_id)
    {
        $sql = "SELECT * FROM `$table_name` WHERE `reply_to` = $com_id ORDER BY date DESC";
        if (!$coms = $mysql->query($sql)) {
            echo "Ошибка обращения к БД";
            exit();
        }
        if ($coms->num_rows) {
        ?>
            <ul class="reply-to-comment">
                <?php
                while ($com = $coms->fetch_assoc()) {
                    // замена символов /n на <br>
                    $com['comment_body'] = str_replace("\n", "<br>", $com['comment_body']);
                    // получение информации об авторе комментария
                    $user = get_user_by_id($mysql, $com['comment_autor']);
                ?>
                    <li>
                        <?php
                        show_comment_html($com, $post_id, $user)
                        ?>
                    </li>
                    <?php
                    show_reply_to_comment($mysql, $table_name, $post_id, $com['comment_id']);
                    ?>
            </ul>
<?php
                }
            }
        }
?>



<?php
// html код с формой для отправки комментария
function write_comment($original_post, $comment_author, $reply_to = null)
{
?>
    <form action="../scripts/comment_processing.php" method="POST">
        <input type="text" required name="text"><br>
        <input type="hidden" name="original_post" value="<?= $original_post ?>">
        <input type="hidden" name="reply_to" value="<?= $reply_to ?>">
        <input type="hidden" name="comment_author" value="<?= $comment_author ?>">
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <button type="submit">Отправить</button><br>
    </form>
<?php
}
