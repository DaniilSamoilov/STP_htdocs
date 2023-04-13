<?php

// Является ли файл доступным для тега <ing>
function is_image($file)
{
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if ($ext == "png" || $ext == "jpeg" || $ext == "jpeg" || $ext == "gif") {
        return 1;
    }
    return 0;
}


// Возвращает имя файла, с которым пользователь загружал его на сервер
// (При добавлении на сервер к имени файла добавляются цифры)
function get_name_without_digits($file_name)
{
    while (is_numeric($file_name[0])) {
        $file_name = substr($file_name, 1,);
    }
    if ($file_name[0] == '.')
        $file_name = "default_name" . $file_name;
    return $file_name;
}
