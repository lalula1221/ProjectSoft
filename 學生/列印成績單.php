<?php
session_start();
$host = 'localhost';
$user = $_SESSION['Account'];
$passwd = $_SESSION['Password'];
$database = 'midtest';
$connect = new mysqli($host, $user, $passwd, $database);
$Sem=$_POST['Sem'];
$Number=$_SESSION['Number'];
$Grades=$_SESSION['Number']."_學號";//找這位學生的學號column 放分數
$Elective=$_SESSION['Number']."_選修";//找這位學生的選修column 放是否選修
$select="SELECT Class,$Grades FROM $Sem WHERE $Elective='是'";
$memberdata=$connect->query($select);
$data=$memberdata->fetch_all();
echo json_encode($data);
?>