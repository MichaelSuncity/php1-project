<div id="main">
    <img class="bigimage" src="<?=BIGIMG_DIR . $item['name']?>" alt="">
    <i class="far fa-eye"></i> <span id='like'><?=$item['views']?></span><br>
    <button class="action" id="likeButton" data-id="<?=$item['id']?>">Like</button><br>
    <span>Название товара: <?=$item['itemName']?></span><br>
    <span>Описание товара: <?=$item['description']?></span><br>
    <span>Цена: <?=$item['itemPrice']?> $</span><br><br>
    <button class="buy" id="<?=$item['id']?>" data-id="<?=$item['id']?>">Купить</button><br><br>

    <form action="/itempage/<?=$action?>/?backid=<?=$item['id']?>" method="post">
        <?=$messageStatus?>
        <input hidden type="text" name="id" value="<?=$edit_id?>"><br>
        <input type="text" name="author" placeholder="Ваше имя" value="<?=$author?>"><br>
        <input type="text" name="message" placeholder="Ваш отзыв" value="<?=$message?>"><br>
        <input type="submit" name="ok" value="<?=$textButton?>">
    </form>

    <? foreach ($feedback as $message): ?>
        <p><b><?= $message['author'] ?></b>: <?= $message['message'] ?>
            <a href="/itempage/edit/<?=$message['id']?>/?backid=<?=$item['id']?>">[Править]</a>
            <a href="/itempage/delete/<?=$message['id']?>/?backid=<?=$item['id']?>">[X]</a>
        </p>
    <? endforeach; ?>
</div>

<script>

    $(document).ready(function(){
        $(".action").on('click', function(){
            let id = $("#likeButton").attr("data-id");
            (async () => {
                const response = await fetch('/api/addlike/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                $('#like').html(answer.views);
                console.log(answer);
            })();
        });

        $(".buy").on('click', function(e){
            let id = e.target.id;
            (async () => {
                const response = await fetch('/api/buy/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                $('#counter').html(answer.count);
                console.log(answer);
            })();
        });


    });
</script>