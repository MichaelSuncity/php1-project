<?php
function calc () 
{

    if ($_POST['firstVariable'] === '' || $_POST['secondVariable'] === ''){
       return  $total = "введите данные во все поля";
    }

    
    if (empty($_POST['operation'])){
       return $total = "не передана операция";
    }

    $firstVariable = (int)$_POST['firstVariable'];
    $secondVariable = (int)$_POST['secondVariable'];
    $operation = $_POST['operation'];

    
    switch ($operation){
        case '+':
            $total = $firstVariable + $secondVariable;
            break;
        case '-':
            $total = $firstVariable - $secondVariable;
            break;
        case '*':
            $total = $firstVariable * $secondVariable;
            break;
        case '/':
            $total = $secondVariable != 0  ? $firstVariable / $secondVariable : "Ошибка. Знаменатель не можем быть равен нулю.";
            break;
        default:
            $total = "Операция не поддерживается"; 
        }

    return $total;
    
}
