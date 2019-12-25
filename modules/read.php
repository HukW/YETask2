<?php
//Обработка Excel при помощи библиотеки PHPSpreedsheet
require '../../../vendor/autoload.php';
include "dbConnection.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function isNumber($str){
    for ($i = 0; $i < 10; $i++){
        if ($str[0] == $i){
            return true;
        }
    }
    return false;
}
if(!$_SESSION["noUploadFlag"]){
    $inputFileName = $_SESSION["targetFile"];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($_SESSION["targetFile"]);
    $worksheet = $spreadsheet->getActiveSheet();
    foreach ($worksheet->getRowIterator() as $row){
        $cellIterator = $row->getCellIterator();

        $cells = array();
        foreach ($cellIterator as $cell){
            array_push($cells,$cell->getValue());
        }
        if (isNumber($cells[0]) && strlen($cells[0]) == 4){$classID = (intval(substr($cells[0],0,1)));
            $groupID = intval(substr($cells[0],0,2));
            $query = "INSERT INTO billstable(ClassID, GroupID, Number, IncomingSaldoActive, IncomingSaldoPassive, DebetReturns, CreditReturns) VALUES('$classID','$groupID','$cells[0]','$cells[1]','$cells[2]','$cells[3]','$cells[4]')";
            $result = mysqli_query($Link, $query) or die("Query error" . mysqli_error($Link));
        }
    }
    echo "Данные из файла добавлены в базу данных";
}
?>