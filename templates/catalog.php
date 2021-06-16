<? if ($message != ""): ?>
    <div style="background: gainsboro;"><?= $message ?></div>
<? endif;?>
<div id = "main">
    <div class="post_title"><h2>Каталог товаров</h2></div>
        <div class="gallery">
        <?php foreach ($items as $key => $item):?>
            <div class="product">
                <a rel="gallery" class="photo" href="/itempage/<?=$item['id']?>"><img src="<?= SMALLIMG_DIR . $item['name']?>" /></a><br>
                <i class="far fa-eye"></i><?=" " . $item['views']?><br>
                <span>Товар: №<?=$item['id']?></span><br>
                <span>Цена: <?=$item['itemPrice']?> $</span>
            </div>
        <?php endforeach; ?>
       </div>
</div>