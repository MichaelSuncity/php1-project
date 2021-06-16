<?php

function getBasket($session_id = null)
{
    if(is_null($session_id)){
        $session_id = session_id();
    }
   
    $sql = "SELECT basket.id as basket_id, gallery.id as gallery_id, gallery.itemName as itemName, gallery.name as name, 
    basket.itemPrice as itemPrice FROM basket, gallery WHERE basket.goods_id=gallery.id AND `session_id`='{$session_id}'";
    $basket = getAssocResult ($sql);
    return $basket;
}

function deleteFromBasket($id)
{
    $id = (int)$id;
    $session_id = session_id();
    $sql = "DELETE FROM `basket` WHERE `basket`.`id` = {$id} AND `session_id`='$session_id'"; //для текущего пользователя
    return executeQuery($sql);
}

function addToBasket($id)
{
    $id = (int)$id;
    $itemPrice = getBigImage($id)['itemPrice'];
    $session_id = session_id();// сессия для того пользователя, который открывает корзину
    $sql = "INSERT INTO `basket` (`session_id`, `goods_id`, `itemPrice`) VALUES ('{$session_id}', '{$id}', '{$itemPrice}')";
    return executeQuery($sql);
}

function getBasketCount()
{
    $session_id = session_id();
    $sql = "SELECT COUNT(*) as count FROM `basket` WHERE `session_id`='$session_id'"; // только для текущего пользователя
    $result = getAssocResult($sql);

    //В случае если новости нет, вернем пустое значение
    $count = [];
    if (isset($result[0]))
        $count = $result[0];
    return $count['count'];
}

function getBasketSum($session_id = null)
{
    if(is_null($session_id)){
        $session_id = session_id();
    }

    $sql = "SELECT sum(itemPrice) as sum FROM basket WHERE `session_id`='{$session_id}'";
    $result = getAssocResult($sql);
    $summ = [];
    if (isset($result[0]))
        $summ = $result[0];   
    return $summ['sum'];
}
