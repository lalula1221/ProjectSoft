<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midtest';
$connect = new mysqli($host, $user, $passwd, $database);
$Sem=$_POST['Sem'];
$Number=$_POST['Number'];
$Grades=$_POST['Number']."_學號";//找這位學生的學號column 放分數
$Elective=$_POST['Number']."_選修";//找這位學生的選修column 放是否選修
$stCheck="SELECT Number FROM user WHERE Number='$Number'";
$stChecked=$connect->query($stCheck);
if($stChecked->num_rows==0){
    echo('error');
}
else{
    $select="SELECT Class,$Grades FROM $Sem WHERE $Elective='是'";
    $memberdata=$connect->query($select);
    $data=$memberdata->fetch_all();
    echo json_encode($data);
}
?>