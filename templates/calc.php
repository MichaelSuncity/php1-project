<div id="main">
    <div class = "post_title"><h2>Калькулятор</h2></div>
        <form method = "POST">
            <input placeholder = "Первое число" id = "firstVariable" name = "firstVariable" type = "number" value = "<?=$firstVariable?>">
            <select name = "operation">
                <option value = "">Выберите операцию</option>
                <option value = "+"> + </option>
                <option value = "-"> - </option>
                <option value = "*"> * </option>
                <option value = "/"> / </option>
            </select>
            <input placeholder = "Второе число" id = "secondVariable" name = "secondVariable" type = "number" value = "<?=$secondVariable?>">
            <input type = "submit" value = " = ">

            <div>
                <input type = "submit" class = "operation" name = "operation" value = "+"></input>
                <input type = "submit" class = "operation" name = "operation" value = "-"></input>
                <input type = "submit" class = "operation" name = "operation" value = "*"></input>
                <input type = "submit" class = "operation" name = "operation" value = "/"></input>
            </div>
        </form>
        <p>Результат: <?=$total?></p>
</div>