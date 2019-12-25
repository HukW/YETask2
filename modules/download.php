<?php
//Скрипт для скачивания файлов
$dir = "../uploads/";//Папка с файлами
if(isset($_POST['file']))
{

    $file = $_POST['file'];
}
function file_force_download($file) {

    $dir = "../uploads/";
        // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
        // если этого не сделать файл будет читаться в память полностью!
        if (ob_get_level()) {
            ob_end_clean();
        }
        // заставляем браузер показать окно сохранения файла
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($dir.$file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($dir.$file));
        // читаем файл и отправляем его пользователю
        readfile($dir.$file);
        exit;

}

file_force_download($file);

?>