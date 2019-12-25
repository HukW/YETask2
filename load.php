<html>
<head>
    <title>EY Task 2</title>
    <link href="styles/styles.css" rel="stylesheet">
</head>
<body>
<div class="formContainer loadForm">
    <form action="actions/onLoad.php" method="post" enctype="multipart/form-data">
        <span>Выберите файл для загрузки</span>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Загрузить" name="submit">
    </form>
    <a href="index.php">Вернуться назад</a>
</div>
</body>
</html>