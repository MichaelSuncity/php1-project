<div id = "main">
    <div class = "post_title"><h2>Отзывы</h2></div>
    <form action = "/feedback/<?=$action?>" method = "post">
        <?=$messageStatus?>
        <input hidden type = "text" name = "id" value = "<?=$id?>"><br>
        <input type = "text" name = "author" placeholder = "Ваше имя" value = "<?=$author?>"><br>
        <input type = "text" name = "message" placeholder = "Ваш отзыв"  value = "<?=$message?>"><br>
        <input type = "submit" name = "ok" value = "<?=$textButton?>">
    </form>

    <?foreach ($feedback as $item): ?>
    <p>
        <?=$item['time']?><br><b><?=$item['author']?>: </b><?=$item['message']?> 
        <a href = "/feedback/edit/<?=$item['id']?>">[править]</a>  
        <a href = "/feedback/delete/<?=$item['id']?>">[x]</a><br>
    </p>
    <?endforeach;?>
</div>