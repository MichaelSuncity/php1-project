<div class = "menu">
<form method="post" action="/login/">
    <a href="/">Главная</a>
    <a href="/gallery/">Галерея</a>
    <a href="/catalog/">Каталог</a>
    <a href="/basket/">Ваша корзина <span id = "counter"><?=$count?></span></a>
    <a href="/feedback/">Отзывы</a>
    <a href="/calc/">Калькулятор</a><br>
<?if (!$allow):?>
    <a href="/register/">Регистрация</a><br>
<?endif;?>
<?if ($allowAdmin):?>
    <a href="/orders/">Заказы</a><br>
<?endif;?>

<?if (!$allow):?>

     <input type='text' name='login' placeholder='Логин'>
     <input type='password' name='pass' placeholder='Пароль'>
     Save? <input type='checkbox' name='save'>
     <input type='submit' name='send' value="Войти">
</form>
<?else:?>
    <span>Добро пожаловать, <?=$user?>   <a href='/logout/'>выход</a></span>
<?endif;?>
</div>