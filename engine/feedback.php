<?php
function doFeedbackAction($page, $action, $id)
{
    $params['textButton'] = "Добавить"; //название кнопки по умолчанию
    $params['action'] = "add"; //действие по умолчанию

    switch($page){
        case 'feedback':
            $table = 'feedback';
            if ($action == "add" && isset($_POST['ok'])) {
                addFeedback();
                header("Location: /feedback/?messageStatus=add");    
            }
            
            if ($action == "delete") {
                deleteFeedback($id, $table);
                header("Location: /feedback/?messageStatus=delete");
            }
        
            if ($action == "edit") {
                if (isset($_POST['ok'])) {
                    saveFeedback($table);
                    header("Location: /feedback/?messageStatus=edit");
                } else {
                    $params['textButton'] = "Править";
                    $params['action'] = "edit";
                    $message = editFeedback($id, $table);
                    $params['author'] = $message['author'];
                    $params['message'] = $message['message'];
                    $params['id'] = $message['id'];
                }
            }
            $params['feedback'] = getAllFeedback();
            $params['messageStatus'] = getMessageStatus();
            return $params;
            break;

        case 'itempage':
            $table = 'feedback_goods';
            if ($action == "add" && isset($_POST['ok'])) {
                addFeedbackGood((int)$_GET['backid']);
                $backid = $_GET['backid'];
                header("Location: /itempage/{$backid}/?messageStatus=add");    
            }

            if ($action == "delete") {
                deleteFeedback($id, $table);
                $backid = $_GET['backid'];
                header("Location: /itempage/{$backid}/?messageStatus=delete");
            }

            if ($action == "edit") {
                if (isset($_POST['ok'])) {
                    saveFeedback($table);
                    $backid = $_GET['backid'];
                    header("Location: /itempage/{$backid}/?messageStatus=edit");
                } else {
                    $params['textButton'] = "Править";
                    $params['action'] = "edit";
                    $message = editFeedback($id, $table);
                    $params['author'] = $message['author'];
                    $params['message'] = $message['message'];
                    $params['id'] = $message['id'];
                }
        
            }

            if ($action == "edit") {
                $params['feedback'] =  getAllFeedbackGood((int)$_GET['backid']);
            } else {
                $params['feedback'] =  getAllFeedbackGood($id);
            }

            $params['messageStatus'] = getMessageStatus();
            return $params;
            break;
        }
}

function getMessageStatus()
{
    if(isset($_GET['messageStatus'])){
        switch($_GET['messageStatus']){
        case 'add':
            return "Отзыв добавлен!";
            break;
        case 'delete':
            return "Отзыв удален!";
            break;
        case 'edit':
            return "Отзыв отредактирован!";
            break;
        default:
            return "Оставьте отзыв";
        }
    }
}

function getAllFeedback()
{
    $sql = "SELECT * FROM `feedback` ORDER BY id DESC";
    return getAssocResult($sql);
}


function getAllFeedbackGood($id)
{
    $sql = "SELECT * FROM feedback_goods WHERE id_good = {$id} ORDER BY id DESC ";
    return getAssocResult($sql);
}

function addFeedback() 
{
    $db = getDb();
    $author = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['author'])));
    $message = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['message'])));
    $sql = "INSERT INTO `feedback`(`author`, `message`) VALUES ('{$author}','{$message}')";
    executeQuery($sql);
}

function addFeedbackGood($id)
{
    $db = getDb();
    $author = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['author'])));
    $message = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['message'])));
    $sql = "INSERT INTO `feedback_goods` (`author`, `message` , `id_good`) VALUES ('{$author}', '{$message}' , '{$id}');";
    return executeQuery($sql);
}

function deleteFeedback($id, $table)
{
    $id = (int)$id;
    $sql = "DELETE FROM `{$table}` WHERE `id`={$id}";
    return executeQuery($sql);
}

function editFeedback($id, $table)
{
    $id = (int)$id;
    $sql = "SELECT * FROM `{$table}` WHERE id = {$id}";
    $news = getAssocResult($sql);
    $result = [];
    if (isset($news[0]))
        $result = $news[0];

    return $result;
}  

function saveFeedback($table)
{
    $db = getDb();
    $id = (int)$_POST['id'];
    $author = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['author'])));
    $message = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['message'])));
    $sql = "UPDATE `{$table}` SET `author` = '{$author}', `message` = '{$message}'  WHERE `id`= {$id}";
    return executeQuery($sql);
}