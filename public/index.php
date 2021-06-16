<?php
session_start();
//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу

//Первым делом подключим файл с константами настроек
include "../config/config.php";

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
$url_array = explode("/", $_SERVER['REQUEST_URI']);

$page = "";
$action = "";
$id = "";
if ($url_array[1] == "") {
    $page = "index"; // по умолчанию это будет index
    $id = "";
} else {
    $page = $url_array[1];
    if (!$url_array[2] == "") { // если сторой пункт не пустой, то
        if (is_numeric($url_array[2])) { // если второй пункт числовой то это id
            $id = $url_array[2];
        } else {
            $action = $url_array[2]; // иначе это action
            if (is_numeric($url_array[3])) { // если третий пункт числовой то это id
                $id = $url_array[3];
            }
        }
    }
}

//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
$params = prepareVariables ($page, $action, $id);

//пример использования модуля для логирования данных
//можно использовать для отладки, смотреть результат
//в папке _log в public, она будет создана автоматически
//_log($params);
//Вызываем рендер, и передаем в него имя шаблона и массив подстановок
echo render($page, $params);
