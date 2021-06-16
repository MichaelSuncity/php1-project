<?php
//контроллер
function prepareVariables ($page, $action, $id)
{
    $params = [];
    $allow = false;
    $allowAdmin = false;
    if (is_auth()) {
        $allow = true;
        $params['user'] = get_user();
    }
    if (is_admin()) {
        $allowAdmin = true;
    }
    $params['allow'] = $allow;
    $params['allowAdmin'] = $allowAdmin;
    switch ($page) {
        case 'index':
            break;

        case 'login':
            login();
            header("Location: /");
            break;
                
        case 'logout':
            session_destroy();
            setcookie("hash", null, time() - 1, '/');
            header("Location: /");
            break;    

        case 'register':
            register();
            $params['registerStatus'] = registerStatus();
            break;       
            
        case 'gallery':
            loadFile();
            $params['message'] = getErrorMessage($_GET['message']);
            $params['images'] = getImages();
            break;

        case 'imagepage':
            updateViews($id);
            $params['image'] = getBigImage($id);
            break;

        case 'calc':
            $params['firstVariable'] = $_POST['firstVariable'];
            $params['secondVariable'] = $_POST['secondVariable'];
            $params['total'] = calc();
            break;

        case 'catalog':
            $params['items'] = getItems();
            $params['message'] = getMessage($_GET['buyProduct']);
            break;

        case 'itempage':
            updateViews($id);
            if ($action != 'edit') {
                $params = doFeedbackAction($page, $action, $id);
            } else {
                $params = doFeedbackAction($page, $action, $id);
                $params['edit_id'] = $id;
                $id = (int)$_GET['backid'];
            }
            $params['item'] = getBigImage($id);
            break;
    
        case 'feedback':
            $params = doFeedbackAction($page, $action, $id);
            break;

        case 'basket':
        
            if(isset($_POST['sendOrder'])){
                makeOrder();
                header("Location: /basket/?orderStatus=send");
            }

            $params['orderStatus'] = orderStatus();
            $params['basket'] = getBasket(); // Фунцкия в engine/basket
            $params['summ'] = getBasketSum(); // Фунцкия в engine/basket 
            break;

        case 'orders':
            $params['orders'] = getOrders();
            break;
        
        case 'orderpage':
            $info = getInfoOrder($id);
            $params['order'] = $info['order'];
            $params['basket'] = $info['basket'];
            $params['summ'] = $info['summ'];
            break;    

        case 'api':
            if ($action == "addlike") {
                $data = json_decode(file_get_contents('php://input'));
                $id = (int)$data->id;
                updateViews($id);
                $image = getBigImage($id);
                $params['views'] = $image['views'];
                header("Content-type: application/json");
                echo json_encode($params);
                die();
            }

            if ($action == "buy") {
                $data = json_decode(file_get_contents('php://input'));
                $id = (int)$data->id;
                addToBasket($id);
                $params['count'] = getBasketCount(); // получаем кол-во товаров в корзине

                header("Content-type: application/json");
                echo json_encode($params);
                die();
            }
            
            if ($action == "deleteFromBasket") {
                $data = json_decode(file_get_contents('php://input'));
                $id = (int)$data->id;

                deleteFromBasket($id); //удаление 
                $params['summ'] = getBasketSum();
                $params['count'] = getBasketCount();//пересчет

                $params['id'] = $id;

                header("Content-type: application/json");
                echo json_encode($params);
                die();
            }

            break;
    
    }
    return $params;
}
