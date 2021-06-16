<?php

function getImages () {
    $sql = "SELECT * FROM gallery ORDER BY views DESC";
    $images = getAssocResult ($sql);
    return $images;
}

function getErrorMessage($message) {
    if (isset($message)) {
        switch ($message) {
            case "ok":
                return "Изображение успешно загружено";
                break;
            case "php":
                return "Загрузка php-файлов запрещена!";
                break;
            case "error":
                return "Загрузка не получилась.";
                break;
            default:
                return "";
        }
    }
}

function getBigImage($id)
{
    $id = (int)$id;
    $sql = "SELECT * FROM gallery WHERE id = {$id}";
    $images = getAssocResult ($sql);
    $result = [];
    if(isset($images[0]))
        $result = $images[0];
    return $result;
}

function updateViews($id)
{
    $id = (int)$id;
    $sql = "UPDATE gallery SET views = views +1  WHERE id = {$id}";
    $result = executeQuery ($sql);
    return $result;
}