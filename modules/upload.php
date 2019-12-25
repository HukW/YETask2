<?php
//Скрипт загрузки файла на сервер
$targetDirectory = "../uploads/";
$targetFile = $targetDirectory.$_FILES["fileToUpload"]["name"];
if (file_exists($targetFile)){
    $_SESSION["noUploadFlag"] == true;
    echo "Файл с таким именем уже загружен";
}
else{
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    if($fileType == "xls" || $fileType == "xlsx"){
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile);
        $_SESSION["targetFile"] = $targetFile;
        $_SESSION["noUploadFlag"] = false;
    }
    else echo "Неправильное расширение у файла";
}

