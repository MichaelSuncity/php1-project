<div id = "main">
    <?if ($allowAdmin):?>
    <div class = "post_title"><h2>Информация о заказе № <?=$order['id']?></h2></div>
        <div>
            <span>Заказчик: <?=$order['clientName']?></span><br>
            <span>Телефон: <?=$order['phone']?></span>
        </div>
        <div class="gallery">
            <?php foreach ($basket as $item):?>
            <div id="item_<?=$item['basket_id']?>">
                <div class="product">
                    <a rel="gallery" class = "photo" href="/itempage/<?=$item['gallery_id']?>"><img src= <?=SMALLIMG_DIR .$item['name']?> /></a><br>
                    <span><?=$item['itemName']?></span><br>
                    <span>Цена: <?=$item['itemPrice']?> $</span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <div>
        <p><span>Общая стоимость: </span><span id = "total"><?= $summ?> $</span></p>
    </div>
    <?else:?>
        <div>Доступ к странице заблокирован!</div>
    <?endif;?>
</div>