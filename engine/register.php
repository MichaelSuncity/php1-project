<?php

function register(){
  if(isset($_POST['register'])){
    $db = getDb();
    $login = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['newUserLogin'])));
    if(existLogin($login)){ // проверка занят ли такой логин
        header("Location: ?registerStatus=loginExist");  
    } else {
    $pass = mysqli_real_escape_string($db, strip_tags(htmlspecialchars($_POST['newUserPass'])));
    $pass = password_hash($pass, PASSWORD_DEFAULT); //хеширование пароля
    $sql = "INSERT INTO `users`(`login`, `pass`, `hash`) VALUES ('{$login}','{$pass}', '')";
    executeQuery($sql);
    header("Location: ?registerStatus=create");  
    }
  }
}

function existLogin($login){ //проверка занят ли такой логин
    $db = getDb();
    $result = mysqli_query($db, "SELECT * FROM users WHERE login = '{$login}'");
    $row = mysqli_fetch_assoc($result);
    if(is_null($row['login'])){ //если  не занято
        return false;
    } else {
        return true; //если занято
    }
}

function registerStatus()
{
    if(isset($_GET['registerStatus'])){
        switch($_GET['registerStatus']){
        case 'create':
            return "Вы зарегистрировались, теперь ввойдите в систему";
            break;
        case 'loginExist':
                return "Такой логин уже занят, выберите другой логин";
                break;    
        default:
            return "";
        }
    } else {
        return "Зарегистрируйтесь:";
    }
}