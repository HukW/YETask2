<?php
//Данные для подключения к PHPMyAdmin
$host = '127.0.0.1';
$database = 'eytask2db';
$user = 'root';
$password = '';
$Link = mysqli_connect($host, $user, $password, $database) or die("Error" . mysqli_error($Link));