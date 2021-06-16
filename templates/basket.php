<div id = "main">
    <div class = "post_title"><h2>Ваша корзина</h2></div>
    <div class="gallery">
        <?php foreach ($basket as $item):?>
        <div id="item_<?=$item['basket_id']?>">
            <div class="product">
                <a rel="gallery" class = "photo" href="/itempage/<?=$item['gallery_id']?>"><img src= <?=SMALLIMG_DIR .$item['name']?> /></a><br>
                <span><?=$item['itemName']?></span><br>
                <span>Цена: <?=$item['itemPrice']?> $</span>
                <button class="delete" id="<?=$item['basket_id']?>">Удалить</button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div>
        <p><span>Общая стоимость: </span><span id = "total"><?= $summ?> $</span></p>
    </div>

       <form action="/basket/<?=$action?>" method = "POST">
            <br>
            <input required type required = "text" name = "clientName" placeholder = "Введите Ваше имя" value = "<?=$clientName?>"><br>
            <input required type = "number" name = "phone" placeholder = "Введите номер телефона" value = "<?=$phone?>"><br>
            <input type ="submit" name = "sendOrder" value = "Оформить заказ">
            <br><?=$orderStatus?>
        </form>
</div>

<script>

    $(document).ready(function(){

        $(".delete").on('click', function(e){
            let id = e.target.id;
            (async () => {
                const response = await fetch('/api/deleteFromBasket/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                $('#item_'+answer.id).remove();
                $('#counter').html(answer.count);
                $('#total').html(answer.summ);
                console.log(answer);
            })();
        });

    });

</script>