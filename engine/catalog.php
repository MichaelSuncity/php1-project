<?php

function getItems () {
    $sql = "SELECT * FROM gallery ORDER BY views DESC";
    $items = getAssocResult ($sql);
    return $items;
}

function getMessage($message)
{
    if (isset($message)) {
        switch ($message) {
            case "ok":
                return "Товар добавлен в корзину!";
                break;
            case "added":
                return "Товар уже лежит в корзине!";
                break;
            default:
                return "";
        }
    }
}