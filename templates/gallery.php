<? if ($message != ""): ?>
    <div style="background: gainsboro;"><?= $message ?></div>
<? endif;?>

<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
        <div class="gallery">
            <?php foreach ($images as $key => $image):?>
                <div class="image">
                    <a rel="gallery" class="photo" href="/imagepage/<?=$image['id']?>"><img src="<?= SMALLIMG_DIR . $image['name']?>" width="150" height="100" /></a><br>
                    <i class="far fa-eye"></i><?=" " . $image['views']?>
                </div>
            <?php endforeach; ?>
       </div>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="myfile">
        <input type="submit" name="ok" value="Загрузить">
    </form>
</div>