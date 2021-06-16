<div id = "main">
    <?if ($allowAdmin):?>
        <div class = "post_title"><h2>Заказы</h2></div>
        <?php foreach ($orders as $item):?>
            <div>Заказ № <?=$item['id']?> <?=$item['clientName']?> <?=$item['phone']?><br>
                <button><a href="/orderpage/<?=$item['id']?>">Информация о заказе</a></button><br><br>
            </div>
        <?php endforeach; ?>
    <?else:?>
        <div>Доступ к странице заблокирован!</div>
    <?endif;?>
</div>
