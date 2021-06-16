<?php

function makeOrder()
{
    $db = getDb();
    $clientName = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['clientName'])));
    $phone = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['phone'])));
    $session_id = session_id();// сессия для того пользователя, который открывает корзину
    $sql = "INSERT INTO `orders` (`session_id`, `clientName`, `phone`) VALUES ('{$session_id}', '{$clientName}','{$phone}')";
    return executeQuery($sql);
}


function orderStatus()
{
    if(isset($_GET['orderStatus'])){
        switch($_GET['orderStatus']){
        case 'send':
            $session_id = session_regenerate_id();
            return "Заказ оформлен! <br>Вы можете оформить новый заказ. <br>Для этого перейдите в каталог и сформируйте новую корзину.";
            break;
        default:
            return "";
        }
    }
}

function getOrders()
{
    $sql = "SELECT id, clientName, phone FROM orders ORDER by id DESC";
    $orders = getAssocResult ($sql);
    return $orders;
}

function getOrder($id)
{
    $sql = "SELECT id, clientName, phone FROM orders WHERE `id`='$id'";
    $order = getAssocResult($sql)[0];
    return $order;
}

function getInfoOrder($id){
    $info = [];
    $id = (int)$id;
    $session_id = getSessionOrder($id)['session_id'];
    $info['order'] = getOrder($id);
    $info['basket'] = getBasket($session_id);
    $info['summ'] = getBasketSum($session_id);
    return $info;
}

function getSessionOrder($id){
    $sql = "SELECT * FROM `orders` WHERE id = {$id}";
    $result = executeQuery($sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}