<?php
    if ($_POST["Load"] == "Загрузить"){
        header("Location: load.php");
    }
    if ($_POST["Show"] == "Просмотреть данные"){
        header("Location: show.php");
    }
    if ($_POST["Download"] == "Скачать файлы"){
        header("Location: downloadFile.php");
    }
?>
<html>
<head>
    <title>EY Task 2</title>
    <link href="styles/styles.css" rel="stylesheet">
</head>
<body>
<div class="formContainer loadForm">
    <form method="post">
        <input type="submit" value="Загрузить" name="Load">
        <input type="submit" value="Просмотреть данные" name="Show">
        <input type="submit" value="Скачать файлы" name="Download">
    </form>
</div>
</body>
</html>