<?php
function loadFile()
{

    if (isset($_POST['ok'])) {
        $uploaddir = "." . BIGIMG_DIR;
        $uploadfile = $uploaddir . basename($_FILES['myfile']['name']);
//Проверка существует ли файл
        if (file_exists($uploadfile)) {
            echo "Файл $uploadfile существует, выберите другое имя файла!";
            exit;
        }

//Проверка на размер файла
        if ($_FILES["myfile"]["size"] > 1024 * 1 * 1024) {
            echo("Размер файла не больше 5 мб");
            exit;
        }
//Проверка расширения файла
        $blacklist = array(".php", ".phtml", ".php3", ".php4");
        foreach ($blacklist as $item) {
            if (preg_match("/$item\$/i", $_FILES['myfile']['name'])) {

                header("Location: ?page=gallery&message=php");
            exit;
            }
        }
//Проверка на тип файла
        $imageinfo = getimagesize($_FILES['myfile']['tmp_name']);
        if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/png') {
            echo "Можно загружать только jpg-файлы, неверное содержание файла, не изображение.";
            exit;
        }

        if ($_FILES['myfile']['type'] != "image/jpeg" && $_FILES['myfile']['type'] != "image/png") {
            echo "Можно загружать только jpg-файлы.";
            exit;
        }

        if (move_uploaded_file($_FILES['myfile']['tmp_name'], $uploadfile)) {

            $image = new SimpleImage();

            $image->load($uploaddir . $_FILES['myfile']['name']);
            $image->resizeToWidth(150);
            $image->save(".". SMALLIMG_DIR. $_FILES['myfile']['name']);
            $name = $_FILES['myfile']['name'];
            $size = $_FILES['myfile']['size'];
            $sql = "INSERT INTO `gallery`(`name`, `size`) VALUES ('$name', '$size')";
            $result = executeQuery ($sql);
            header("Location: ?page=gallery&message=ok");
            exit;
        } else {
            header("Location: ?page=gallery&message=error");
            exit;
        }
    }
}