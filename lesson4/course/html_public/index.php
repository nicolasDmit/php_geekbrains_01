<?php
require '../config/config.php';
if ($dir = opendir(UPLOAD_DIR)) {
    while ($file = readdir($dir)) {
        if (!is_dir($file)) {
            $path = explode('/', UPLOAD_DIR . $file);
            $path = implode("\ ", $path);
            $path = explode(" ", $path);
            $path = implode("", $path);
            echo "$path";
            echo "<img src=\"$path\"><br>";
        }
    }

    closedir($dir);
}
if ($_FILES) {
    if (($_FILES['upload_file']['size'] < 100000))
        move_uploaded_file($_FILES["upload_file"]["tmp_name"], UPLOAD_DIR . $_FILES['upload_file']['name']);

    if (($_FILES['upload_file']['type'] == 'image/jpeg' ) || ($_FILES['upload_file']['type'] == 'image/png'))
        move_uploaded_file($_FILES["upload_file"]["tmp_name"], UPLOAD_DIR . $_FILES['upload_file']['name']);
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
    </body>
</html>
