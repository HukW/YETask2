<html>
<head>
    <title>EY Task 2</title>
    <link href="styles/styles.css" rel="stylesheet">
</head>
<body>

<div class="formContainer loadForm">
    <a href="index.php">Вернуться назад</a>
</div>

<div class="tableContainer">
    <table>
        <caption>Оборотная ведомость по балансовым счетам</caption>
        <tbody>
        <tr>
            <td rowspan="2">Б/сч</td>
            <td colspan="2">Входящее сальдо</td>
            <td colspan="2">Обороты</td>
            <td colspan="2">Исходящее сальдо</td>
        </tr>
        <tr>
            <td>Актив</td>
            <td>Пассив</td>
            <td>Дебет</td>
            <td>Кредит</td>
            <td>Актив</td>
            <td>Пассив</td>
        </tr>
        <?php
        //Вывод данных из базы данных
        //Включает в себя логику расчета значений для суммирующих строк таблицы
        include "modules/dbConnection.php";
        $query = "SELECT ClassName FROM classestable";
        $classes = mysqli_query($Link, $query) or die("Query Error");

        $query = "SELECT * FROM billstable";
        $bills = mysqli_query($Link, $query) or die("Query Error");

        $groupISA = 0;
        $groupISP = 0;
        $groupDebet = 0;
        $groupCredit = 0;
        $groupOSA = 0;
        $groupOSP = 0;

        $classISA = 0;
        $classISP = 0;
        $classDebet = 0;
        $classCredit = 0;
        $classOSA = 0;
        $classOSP = 0;

        $allISA = 0;
        $allISP = 0;
        $allDebet = 0;
        $allCredit = 0;
        $allOSA = 0;
        $allOSP = 0;

        $currentClass = mysqli_fetch_row($classes);
        echo "<tr><td colspan='7'>".$currentClass[0]."</td></tr>";
        $currentClassPointer = 1;
        $currentGroup = 10;
        $billsCount = mysqli_num_rows($bills);
        for ($i = 0; $i < $billsCount; $i++){
            $row = mysqli_fetch_row($bills);
            if ($row[2] == $currentGroup){
                $groupISA += $row[4];
                $groupISP += $row[5];
                $groupDebet += $row[6];
                $groupCredit += $row[7];
                $groupOSA += $row[8];
                $groupOSP += $row[9];
            }
            else{
                echo "<tr>";
                echo "<td class='boldFont'>$currentGroup</td>";
                echo "<td class='boldFont'>$groupISA</td>";
                echo "<td class='boldFont'>$groupISP</td>";
                echo "<td class='boldFont'>$groupDebet</td>";
                echo "<td class='boldFont'>$groupCredit</td>";
                echo "<td class='boldFont'>$groupOSA</td>";
                echo "<td class='boldFont'>$groupOSP</td>";
                echo "</tr>";

                $groupISA = 0;
                $groupISP = 0;
                $groupDebet = 0;
                $groupCredit = 0;
                $groupOSA = 0;
                $groupOSP = 0;

                $currentGroup = $row[2];
            }

            if ($row[1] != $currentClassPointer){
                echo "<tr>";
                echo "<td class='boldFont'>По классу</td>";
                echo "<td class='boldFont'>$classISA</td>";
                echo "<td class='boldFont'>$classISP</td>";
                echo "<td class='boldFont'>$classDebet</td>";
                echo "<td class='boldFont'>$classCredit</td>";
                echo "<td class='boldFont'>$classOSA</td>";
                echo "<td class='boldFont'>$classOSP</td>";
                echo "</tr>";

                $currentClass = mysqli_fetch_row($classes);
                echo "<tr><td colspan='7'>".$currentClass[0]."</td></tr>";

                $classISA = 0;
                $classISP = 0;
                $classDebet = 0;
                $classCredit = 0;
                $classOSA = 0;
                $classOSP = 0;
            }
            else{
                $classISA += $row[4];
                $classISP += $row[5];
                $classDebet += $row[6];
                $classCredit += $row[7];
                $classOSA += $row[8];
                $classOSP += $row[9];
            }




            if (strlen($row[3]) == 4){
                echo "<tr>";
                echo "<td>$row[3]</td>";
                echo "<td>$row[4]</td>";
                echo "<td>$row[5]</td>";
                echo "<td>$row[6]</td>";
                echo "<td>$row[7]</td>";
                echo "<td>$row[8]</td>";
                echo "<td>$row[9]</td>";
                echo "</tr>";
            }
            $currentClassPointer = substr($row[3],0,1);

            $allISA += $row[4];
            $allISP += $row[5];
            $allDebet += $row[6];
            $allCredit += $row[7];
            $allOSA += $row[8];
            $allOSP += $row[9];
        }
        echo "<tr>";
        echo "<td class='boldFont'>$currentGroup</td>";
        echo "<td class='boldFont'>$groupISA</td>";
        echo "<td class='boldFont'>$groupISP</td>";
        echo "<td class='boldFont'>$groupDebet</td>";
        echo "<td class='boldFont'>$groupCredit</td>";
        echo "<td class='boldFont'>$groupOSA</td>";
        echo "<td class='boldFont'>$groupOSP</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td class='boldFont'>По классу</td>";
        echo "<td class='boldFont'>$classISA</td>";
        echo "<td class='boldFont'>$classISP</td>";
        echo "<td class='boldFont'>$classDebet</td>";
        echo "<td class='boldFont'>$classCredit</td>";
        echo "<td class='boldFont'>$classOSA</td>";
        echo "<td class='boldFont'>$classOSP</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td class='boldFont'>Всего</td>";
        echo "<td class='boldFont'>$allISA</td>";
        echo "<td class='boldFont'>$allISP</td>";
        echo "<td class='boldFont'>$allDebet</td>";
        echo "<td class='boldFont'>$allCredit</td>";
        echo "<td class='boldFont'>$allOSA</td>";
        echo "<td class='boldFont'>$allOSP</td>";
        echo "</tr>";

        ?>
        </tbody>
    </table>
</div>

</body>
</html>
