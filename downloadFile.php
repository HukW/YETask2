
<html>
<head>
    <title>EY Task 2</title>
    <link href="styles/styles.css" rel="stylesheet">
</head>
<body>
<div class="formContainer loadForm">
    <form action="modules/download.php" method="POST"  >
        <?
        //Вывод списка всех файлов из папки с файлами
        $dir = "uploads";
        $files = scandir($dir);
        $filesCounter = 0;
        foreach ($files as $n_files)
        {
            if($n_files != "." && $n_files != ".."){
                ?>
                <input style="margin-bottom: 10px" name="file" type="radio" value="<?php echo $n_files; ?>">
                <?
                echo $n_files . '<br>';
                $filesCounter++;
            }
        }
        if ($filesCounter){
            ?><input name="download" type="submit" value="Сохранить"/><?;
        }
        else{
            echo "Файлы не найдены";
        }
        ?>
    </form>
    <a href="index.php">Вернуться назад</a>
</div>
</body>
</html>