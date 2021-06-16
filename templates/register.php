<div id = "main">
    <div class = "post_title"><h2>Регистрация нового пользователя</h2></div>
     <form action = "/register/" method = "post">
        <?=$registerStatus?><br>
        <input type='text' name='newUserLogin' placeholder='Логин'><br>
        <input type='password' name='newUserPass' placeholder='Пароль'><br>
        <input type='submit' name='register' value="Зарегистрироваться">
    </form>
</div>