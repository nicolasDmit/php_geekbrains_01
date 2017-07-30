<?php
require '../config/config.php';

//если на входе обрабатываются какие либо запросы, то этот кусок кода помещаем в самое начало, чтобы после скрипт видел
//результаты
checkIncomeFiles();

function checkIncomeFiles() {
    if ($_FILES) {

        //условие лучше объединить в одно
        if ($_FILES['upload_file']['size'] < 100000
            && ($_FILES['upload_file']['type'] == 'image/jpeg') || ($_FILES['upload_file']['type'] == 'image/png')
        ) {

            //нормализуем имя, убираем возможные пробелы, чтобы небыло косяков
            $normalizedName = strtr($_FILES['upload_file']['name'], [' ' => '_']);

            //переносим файлы в дирректорию вне публичной папки
            $res = move_uploaded_file($_FILES["upload_file"]["tmp_name"], UPLOAD_DIR . $normalizedName);

            //Если файл нормально перенесся, то копируем его в публичную папку
            // т.к. из UPLOAD_DIR не будет виден файл для браузера. Он может быть виден только из публичной папки
            if ($res) {
                copy(UPLOAD_DIR . $_FILES['upload_file']['name'], DEFULT_IMG . $normalizedName);
            }
        }

    }
}

function buildImages() {
//поиск изображений ведем в публичной папке
    if ($dir = opendir(DEFULT_IMG)) {
        while ($file = readdir($dir)) {
            //Если это файл
            if (is_file(DEFULT_IMG . $file)) {

                //Получаем публичный путь к файлу картинки
                $path = HTML_IMG . $file;

                //для отладки выводим имя файла картинки
                echo HTML_IMG . $file;

                echo "<img src=\"{$path}\" alt='no_loaded_img'><br>";
            }
        }

        closedir($dir);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Галерея Каритинок</title>
</head>
<body>
<form action="" enctype="multipart/form-data" method="post">
    <input type="file" name="upload_file">
    <input type="submit" value="Отправить!">
</form>
<br><br>
<?php
//картинки нужно выводить внутри шаблона
buildImages();
?>

</body>
</html>
