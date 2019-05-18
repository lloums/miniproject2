<!DOCTYPE html>
<html>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: lloum
 * Date: 05/18/2019
 * Time: 09:11 AM
 */
$rowNum = 1;
if (($myfile = fopen($_POST["file"], "r") or die("Exception Thrown: Unable to open file! Not a CSV!")) !== FALSE) {
    echo '<table>';
    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        $maxRowNum = count($data);
        if ($rowNum == 1) {
            echo '<thead><tr>';
        }else{
            echo '<tr>';
        }
        for ($i=0; $i < $maxRowNum; $i++) {
            if(empty($data[$i])) {
                $value = "&nbsp;";
            }else{
                $value = $data[$i];
            }
            if ($rowNum == 1) {
                echo '<th>'.$value.'</th>';
            }else{
                echo '<td>'.$value.'</td>';
            }
        }
        if ($rowNum == 1) {
            echo '</tr></thead><tbody>';
        }else{
            echo '</tr>';
        }
        $rowNum++;
    }
    echo '</tbody></table>';
    fclose($file);
}
?>
</body>
</html>