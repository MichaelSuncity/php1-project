<?php
//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, array $params = [])
{
    $params['count'] = getBasketCount(); //для вывода счетчика товаров у "Ваша корзина"
    $content = renderTemlate(LAYOUTS_DIR . 'main', [
        'content' => renderTemlate($page, $params),
        'menu' => renderTemlate('menu', $params),
        'user'=> $params['user'],
        'allow'=> $params['allow'],
    ]);
    return $content;
}

//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTemlate($page, array $param = [])
{
    ob_start();

    if (!is_null($param)) {
        extract($param);
    }


    $fileName = TEMPLATES_DIR . $page . ".php";


    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Страницы {$fileName} не существует.");
    }

    return ob_get_clean();
}